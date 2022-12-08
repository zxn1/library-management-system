<?php

namespace App\Http\Controllers;

use App\Models\bookloan;
use App\Models\setting;
use App\Models\User;
use App\Models\books;
use App\Models\category;
use App\Models\students;
use App\Models\userInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function login (Request $request)
    {

        $validator =  Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Kriteria e-mail atau kata kunci tidak tepat.');
        } else 
        {
            $user = $request->except(['_token']);
            if(Auth::attempt($user))
            {
                return redirect()->route('dash');
            } else {
                return redirect()->back()->with('error', 'Gagal untuk membuat pengesahan.');
            }
        }
        /*
        $this->validate($request, ['email' => 'required|email', 'password' => 'required']);
        $user = $request->except(['_token']);
        if(Auth::attempt($user))
        {
            return redirect()->route('dash');
        } else {
            return redirect()->back()->with('error', 'Gagal untuk membuat pengesahan.');
        } */

        /*
        
        $user= User::where('email', $request->email)->first();
       
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
            $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return view('test', ['data'=>$response]);*/
    }
    
    function register(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'role' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'cpassword' => 'required',
            'radiogroup1' => 'required'
        ]);

        if (($validator->fails()) || ($request->password != $request->cpassword)) {
            return redirect()->back()->with('status', 'Mendaftar untuk mendaftar akaun baru tidak lengkap.');
        } else {
            $fname = $request->fname;
            $lname = $request->lname;
            //return $request->radiogroup1 . ' - ' . $request->radiogroup2;
            //$user = User::create(request(['name', , 'email', 'password']));

            $user = new User;
            $user->name = $fname . ' ' . $lname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            if($user->save())
            {
                $usrinf = new userInfo;
                $usrinf->user_id = $user->id;
                $usrinf->role = $request->role;
                $usrinf->gender = $request->radiogroup1;
                if($usrinf->save())
                {
                    auth()->login($user);
                    return redirect()->route('dash');
                } else {
                    return redirect()->back()->with('status', 'Gagal untuk mendaftar akaun baru.');    
                }
            } else {
                return redirect()->back()->with('status', 'Gagal untuk mendaftar akaun baru.');
            }
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('logout', 'Berjaya log keluar!');
        /*if(Auth::logout())
        {
            return redirect()->route('login')->with('logout', 'Berjaya log keluar!');
        } else {
            return redirect()->back()->with('faillogout', 'Gagal untuk log keluar.');
        }*/
    }

    function displaySetting()
    {
        $settings = setting::where('id', 1)->first();
        $charge1day = number_format((float)$settings->chargeperday, 2, '.', '');
        return view('settings', ['charge' => $charge1day]);
    }

    function setPenaltyCharge(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'charge' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Gagal menetapkan harga baru bayaran denda.');
        } else {
            $setting = setting::find(1);
            $setting->chargeperday = $request->charge;
            if($setting->save())
            {
                //Session::flash('status', "Rekod pembayaran denda berjaya disimpan.");
                return redirect()->back()->with('status', 'Harga baru bayaran denda telah ditetapkan.');
            } else {
                return redirect()->back()->with('error', 'Gagal menetapkan harga baru bayaran denda.');
            }
        }
    }

    function setNewKey(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'prevkey' => 'required',
            'key' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Sila pastikan Maklumat key lama dan key baru telah dimasukkan.');
        } else {
            if($request->prevkey != $request->key)
            {
                $setting = setting::find(1);
                if($setting->admin_key == $request->prevkey)
                {
                    $setting->admin_key = $request->key;
                    if($setting->save())
                    {
                        //Session::flash('status', "Rekod pembayaran denda berjaya disimpan.");
                        return redirect()->back()->with('status', 'Admin key yang baru telah ditetapkan.');
                    } else {
                        return redirect()->back()->with('error', 'Gagal menetapkan Admin key baru.');
                    }
                } else {
                    return redirect()->back()->with('error', 'Admin key sebelumnya tidak tepat!');
                }
            } else {
                return redirect()->back()->with('error', 'Anda menggunakan Admin key yang sama seperti sebelumnya! Sila guna Key yang lain.');
            }
        }
    }

    function displayDashboard()
    {
        if(!Auth::check())
        {
            return view('login');
        }
        //else

        //part 1
        //get total buku
        $booktot = books::count();
        //$booktot = $book->count();
        //return $booktot;

        //part 2
        //total kategori buku
        $category = category::all();
        $catetot = $category->count();
        //return $category;

        //part 3
        //total pelajar
        $studtot = students::count();
        //return $studtot;

        //part 4
        //jumlah buku bagi setiap kategori
        $arr_bookcateg = [];
        for($i = 0; $i < $catetot; $i++)
        {
            if($category[$i]->books)
            {
                array_push($arr_bookcateg, $category[$i]->books->count());
            } else {
                array_push($arr_bookcateg, 0);
            }
        }
        //return $arr_bookcateg;

        //part 5
        //jumlah buku dipinjam
        $bookloan = bookloan::count();

        //part 6
        //total pelajar bagi setiap tahun dalam graph
        $year1 = students::where('year', '1')->count();//tahun 1
        //return $year1;
        $year2 = students::where('year', '2')->count();//tahun 2
        //return $year2;
        $year3 = students::where('year', '3')->count();//tahun 3
        $year4 = students::where('year', '4')->count();//tahun 4
        $year5 = students::where('year', '5')->count();//tahun 5
        $year6 = students::where('year', '6')->count();//tahun 6

        return view('dash', ['booktot' => $booktot, 'categtot' => $catetot, 'studtot' => $studtot, 'categ' => $category, 'arr_bookcateg' => $arr_bookcateg, 'bookloan' => $bookloan, 'year1' => $year1, 'year2' => $year2, 'year3' => $year3, 'year4' => $year4, 'year5' => $year5, 'year6' => $year6]);
    }

    function displayDashboardWithFilter(Request $request)
    {
        if(!Auth::check())
        {
            return view('login');
        }
        //else

        //input
        $date1 = $request->datefirst;
        $date2 = $request->datesecond;

        //part 1
        //get total buku
        $booktot = books::whereBetween('year_acquisition', [$date1, $date2])->count();
        //$booktot = $book->count();
        //return $booktot;

        //part 2
        //total kategori buku
        //whereBetween('reservation_from', [$from, $to])->get();
        $category = category::all();
        $catetot = $category->count();
        //return $category;

        //part 3
        //total pelajar
        $studtot = students::count();
        //return $studtot;

        //part 4
        //jumlah buku bagi setiap kategori
        $arr_bookcateg = [];
        for($i = 0; $i < $catetot; $i++)
        {
            if($category[$i]->books)
            {
                array_push($arr_bookcateg, $category[$i]->books->whereBetween('year_acquisition', [$date1, $date2])->count());
            } else {
                array_push($arr_bookcateg, 0);
            }
        }
        //return $arr_bookcateg;

        /*
        whereHas('students', function ($query) use($studname) {
                $query->where('fullname', 'LIKE', '%'. $studname . '%');
            })
        */

        //part 5
        //jumlah buku dipinjam
        $bookloan = bookloan::whereHas('books', function ($query) use($date1, $date2) {
            $query->whereBetween('year_acquisition', [$date1, $date2]);
        })->count();

        //part 6
        //total pelajar bagi setiap tahun dalam graph
        $year1 = students::where('year', '1')->count();//tahun 1
        //return $year1;
        $year2 = students::where('year', '2')->count();//tahun 2
        //return $year2;
        $year3 = students::where('year', '3')->count();//tahun 3
        $year4 = students::where('year', '4')->count();//tahun 4
        $year5 = students::where('year', '5')->count();//tahun 5
        $year6 = students::where('year', '6')->count();//tahun 6

        Session::flash('dashstats', "Maklumat dashboard telah ditapis mengikut julat tarikk buku diperoleh dari (" . $date1 .") hingga (" . $date2 . ").");
        return view('dash', ['booktot' => $booktot, 'categtot' => $catetot, 'studtot' => $studtot, 'categ' => $category, 'arr_bookcateg' => $arr_bookcateg, 'bookloan' => $bookloan, 'year1' => $year1, 'year2' => $year2, 'year3' => $year3, 'year4' => $year4, 'year5' => $year5, 'year6' => $year6]);
    }

    function goRegisterAdmin(Request $request)
    {
        if(!Auth::check())
        {
            if($request->key == setting::where('id', 1)->first()->admin_key)
            {
                return view('register');   
            } else {
                return redirect()->back()->with('error', 'Admin key yang dimasukkan adalah tidak sah!');
            }
        } else {
            return redirect()->route('dash');
        }
    }
}
