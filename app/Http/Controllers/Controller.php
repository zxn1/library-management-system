<?php

namespace App\Http\Controllers;

use App\Models\setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;

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
        /*$this->validate(request(), [
            'fname' => 'required',
            'lname' => 'required',
            'role' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'cpassword' => 'required'
        ]);

        //return Request()->password;
        if(!(Request()->password == Request()->cpassword))
        {
            //if not satisfied
            
        } */

        $validator =  Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'role' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'cpassword' => 'required'
        ]);

        if (($validator->fails()) || ($request->password != $request->cpassword)) {
            return redirect()->back()->with('status', 'Gagal untuk mendaftar akaun baru.');
        } else {
            $fname = $request->fname;
            $lname = $request->lname;
            //$user = User::create(request(['name', , 'email', 'password']));

            $user = new User;
            $user->name = $fname . ' ' . $lname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            auth()->login($user);

            return redirect()->route('dash');
        }
    }

    function logout()
    {
        if(Auth::logout())
        {
            return redirect()->route('login')->with('logout', 'Berjaya log keluar!');
        } else {
            return redirect()->back()->with('faillogout', 'Gagal untuk log keluar.');
        }
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
}
