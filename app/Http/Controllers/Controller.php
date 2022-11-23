<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    function test ()
    {
        return view('test', ['data'=>'testesatd']);
    }

    function login (Request $request)
    {
        /*if($request->user)
        {
            return view('test', ['data'=>'data ada '. $request->user]);
        } else {
            return view('test', ['data'=>'tiada data']);
        }*/
        
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
        
             return view('test', ['data'=>$response]);
    }
}
