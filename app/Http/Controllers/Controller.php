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

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /*function test ()
    {
        return view('test', ['data'=>'testesatd']);
    }*/

    function login (Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return view('test', ['data'=>'ok']);
        } else {
            return view('test', ['data'=>'ko']);
        }

        /*if($request->user)
        {
            return view('test', ['data'=>'data ada '. $request->user]);
        } else {
            return view('test', ['data'=>'tiada data']);
        }*/

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
        return view('register');
    }
}
