<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\authors;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;

class author extends Controller
{
    //
    function displayauthors()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            $auth = authors::paginate(5);
            return view('authors', ['data' => $auth]);
        }
    }

    function displayauthorsbysearch(Request $request)
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            $auth = authors::where('name', 'LIKE', '%'. $request->search . '%')->paginate(5);
            Session::flash('status', "Buku yang dijumpai menerusi carian pengarang adalah " . count($auth) . ' buah buku.');
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

    function passauthor(Request $request)
    {
        $author = authors::where('id', $request->id)->first();
        if($request->id)
        {
            return view('editauthor', ['author' => $author]);
        } else {
            return redirect()->back()->with('fails', 'ia silap daripada kami, bukan dari anda &#128512;. Sila refresh webpage ini!');
        }
    }

    function editauthor(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
        ]);

        if((!($validator->fails())))
        {
            $author = authors::find($request->id);
            $author->name = $request->name;
            if($author->save())
            {
                return redirect()->route('authors')->with('success', 'Berjaya memodifikasi maklumat pengarang!');
            } else {
                return redirect()->back()->with('status', 'Gagal memodifikasi maklumat pengarang.');
            }
        } else {
            return redirect()->back()->with('status', 'Gagal memodifikasi maklumat pengarang.');
        }
    }
}
