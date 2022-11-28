<?php

namespace App\Http\Controllers;

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

            return redirect()->to('/dash');
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
}
