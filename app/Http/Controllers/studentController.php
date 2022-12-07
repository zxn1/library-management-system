<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;
use App\Models\bookloan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use Carbon\Carbon;

class studentController extends Controller
{
    //
    function displaystudents()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            $stud = students::paginate(4);
            return view('student', ['data' => $stud]);
        }
    }

    function displaystudentsbysearch(Request $request)
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            $stud = students::where('fullname', 'LIKE', '%'. $request->studname . '%')->paginate(4);
            Session::flash('status', "Rekod pelajar yang dijumpai menerusi carian nama adalah " . count($stud) . ' orang pelajar.');
            return view('student', ['data' => $stud]);
        }
    }

    function studentsbysearchunique(Request $request)
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            $stud = students::where('unique_id', 'LIKE', '%'. $request->unique_id . '%')->paginate(4);
            Session::flash('status', "Rekod pelajar yang dijumpai menerusi carian unique id adalah " . count($stud) . ' orang pelajar.');
            return view('student', ['data' => $stud]);
        }
    }

    function registerStudent(Request $request)
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            $validator =  Validator::make($request->all(), [
                'studname' => 'required',
                'year' => 'required',
                'streetname' => 'required',
                'poscode' => 'required',
                'cityname' => 'required',
                'statename' => 'required',
                'dobdate' => 'required'
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->with('error', 'Kriteria input dimasukkan tidak lengkap atau tidak tepat.');
            } else {
                $stud = new students;
                if($request->file('image')){
                    $file= $request->file('image');
                    $filename= date('YmdHi').$file->getClientOriginalName();
                    $file-> move(public_path('Image'), $filename);
                    $stud->profile_image = $filename;
                }
                $stud->fullname = $request->studname;
                $stud->dob = $request->dobdate;
                $stud->year = $request->year;
                $stud->street = $request->streetname;
                $stud->poscode = $request->poscode;
                $stud->city = $request->cityname;
                $stud->state = $request->statename;

                //get first name for identification purpose
                //explode(' ', trim($sentence ))[0];
                //$firstname = $request->studname;
                $firstname = explode(' ', trim($request->studname))[0];
                
                if (students::where('unique_id', '=', $firstname)->exists()) {
                    $count = 1;
                    while(students::where('unique_id', '=', $firstname . '' . $count)->exists())
                    {
                        $count++;
                    }

                    $stud->unique_id = $firstname . '' . $count;
                } else {
                    $stud->unique_id = $firstname;
                }
                //$stud->save();
                if($stud->save())
                {
                    Session::flash('success', "pelajar berjaya didaftarkan.");
                    return redirect()->back();
                } else {
                    return redirect()->back()->with('error', 'pelajar gagal didaftarkan.');
                }
            }
        }
    }

    function deleteStudent(Request $request)
    {
        if(students::where('unique_id', $request->unique_id)->delete())
        {
            return redirect()->back()->with('status', 'Berjaya memadam rekod pelajar!');
        } else {
            return redirect()->back()->with('fails', 'Gagal memadam rekod pelajar.');
        }
    }

    function modifyStudent(Request $request)
    {
        $stud = students::where('unique_id', $request->unique_id)->first();
        return view('modifystudent', ['data' => $stud]);
    }

    function getModifyStudent(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'id' => 'required',
            'studname' => 'required',
            'year' => 'required',
            'streetname' => 'required',
            'poscode' => 'required',
            'cityname' => 'required',
            'statename' => 'required',
            'dobdate' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'maklumat tidak dilengkapkan.');
        } else 
        {
            //return $request->id;
            $stud = students::find($request->id);
            if($request->file('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('Image'), $filename);
                $stud->profile_image = $filename;
            }
            $stud->fullname = $request->studname;
            $stud->year = $request->year;
            $stud->street = $request->streetname;
            $stud->poscode = $request->poscode;
            $stud->city = $request->cityname;
            $stud->state = $request->statename;
            $stud->dob = $request->dobdate;
            
            if($stud->save())
            {
                return redirect()->back();
            } else {
                return redirect()->back()->with('error', 'buku gagal didaftarkan.');
            }
        }
    }

    function viewStudent(Request $request)
    {
        $stud = students::where('unique_id', $request->id)->first();
        return view('viewstudent', ['data' => $stud]);
    }

    function viewBooksBorrowed(Request $request)
    {
        /*
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            //'name', 'LIKE', '%' . $request->search . '%'
            $stud_id = $request->search;
            $bkloan = bookloan::whereHas('students', function ($query) use($stud_id) {
                $query->where('unique_id', $stud_id);
            })->paginate(4);

            $arr = [];
            //return (Carbon::now()->format("Y-m-d"));
            //return $bkloan->perPage();
            //return $bkloan->count();
            for($i = 0; $i < $bkloan->count(); $i++)
            {
                if(Carbon::parse(Carbon::now()->format("Y-m-d"))->gt($bkloan[$i]->return_date)) //date is greater
                {
                    //return true;
                    array_push($arr, 1); //true
                } else {
                    array_push($arr, 0); //false
                }
                //array_push($arr, )
            }
            Session::flash('status', "Buku yang dijumpai menerusi carian buku berkait unique ID pelajar sebanyak " . count($bkloan) . ' buah buku.');
            return view('bookloan', ['data' => $bkloan, 'denda' => $arr]);
        }
        */
        //return view('viewSpecificLoan');

        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            //'name', 'LIKE', '%' . $request->search . '%'
            $stud_id = $request->id;
            $bkloan = bookloan::whereHas('students', function ($query) use($stud_id) {
                $query->where('unique_id', $stud_id);
            })->paginate(4);

            $arr = [];
            //return (Carbon::now()->format("Y-m-d"));
            //return $bkloan->perPage();
            //return $bkloan->count();
            for($i = 0; $i < $bkloan->count(); $i++)
            {
                if(Carbon::parse(Carbon::now()->format("Y-m-d"))->gt($bkloan[$i]->return_date)) //date is greater
                {
                    //return true;
                    array_push($arr, 1); //true
                } else {
                    array_push($arr, 0); //false
                }
                //array_push($arr, )
            }
            Session::flash('status', "Buku yang dijumpai menerusi carian buku berkait unique ID pelajar sebanyak " . count($bkloan) . ' buah buku.');
            return view('viewSpecificLoan', ['data' => $bkloan, 'denda' => $arr, 'nama' => students::where('unique_id', $stud_id)->first()]);
        }
    }
}
