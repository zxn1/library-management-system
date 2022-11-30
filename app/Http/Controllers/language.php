<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\languages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class language extends Controller
{
    //
    function displaylanguages()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            $lang = languages::paginate(5);
            return view('language', ['data' => $lang]);
        }
    }

    function addLanguage(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'type_lang' => 'required',
        ]);

        if((!($validator->fails())))
        {
            if(!(languages::where('type_lang', '=', $request->type_lang)->exists()))
            {
                if(languages::create($request->all()))
                {
                    return redirect()->route('lang')->with('success', 'Berjaya mendaftar jenis bahasa bagi buku baru!');
                } else {
                    return redirect()->back()->with('status', 'Gagal mendaftar jenis bahasa baru.');
                }
            } else {
                return redirect()->back()->with('status', 'Jenis bahasa ' . $request->name . ' telahpun didaftarkan!');
            }
        } else {
            return redirect()->back()->with('status', 'Gagal mendaftar jenis bahasa baru.');
        }
    }

    function deleteLang(Request $request)
    {
        if(languages::find($request->id)->delete())
        {
            return redirect()->back()->with('status', 'Berjaya memadam Jenis bahasa!');
        } else {
            return redirect()->back()->with('fails', 'Gagal memadam jenis bahasa.');
        }
    }

    function passlang(Request $request)
    {
        $lang = languages::where('id', $request->id)->first();
        if($request->id)
        {
            return view('editlanguage', ['lang' => $lang]);
        } else {
            return redirect()->back()->with('fails', 'ia silap daripada kami, bukan dari anda &#128512;. Sila refresh webpage ini!');
        }
    }

    function editlang(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'id' => 'required',
            'type_lang' => 'required',
        ]);

        if((!($validator->fails())))
        {
            $lang = languages::find($request->id);
            $lang->type_lang = $request->type_lang;
            if($lang->save())
            {
                return redirect()->route('lang')->with('success', 'Berjaya memodifikasi maklumat Jenis Bahasa!');
            } else {
                return redirect()->back()->with('status', 'Gagal memodifikasi maklumat Jenis Bahasa.');
            }
        } else {
            return redirect()->back()->with('status', 'Gagal memodifikasi maklumat Jenis Bahasa.');
        }
    }
}
