<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\authors;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class author extends Controller
{
    //
    function displayauthors()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            $auth = authors::paginate(8);
            return view('authors', ['data' => $auth]);
        }
    }

    function addauthor(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if((!($validator->fails())))
        {
            if(!(authors::where('name', '=', $request->name)->exists()))
            {
                if(authors::create($request->all()))
                {
                    return redirect()->route('authors')->with('success', 'Berjaya mendaftar pengarang baru!');
                } else {
                    return redirect()->back()->with('status', 'Gagal mendaftar pengarang baru.');
                }
            } else {
                return redirect()->back()->with('status', 'Pengarang bernama ' . $request->name . ' telahpun didaftarkan!');
            }
        } else {
            return redirect()->back()->with('status', 'Gagal mendaftar pengarang baru.');
        }
    }

    function deleteauthor(Request $request)
    {
        if(authors::find($request->id)->delete())
        {
            return redirect()->back()->with('status', 'Berjaya memadam pengarang!');
        } else {
            return redirect()->back()->with('fails', 'Gagal memadam pengarang.');
        }
    }
}
