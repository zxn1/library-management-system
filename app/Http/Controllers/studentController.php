<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;

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
}
