<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class categoryController extends Controller
{
    //
    function displaycategory()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            $category = category::paginate(5);
            return view('category', ['data' => $category]);
        }
    }

    function addCategory(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'category_name' => 'required',
        ]);

        if((!($validator->fails())))
        {
            if(!(category::where('category_name', '=', $request->category_name)->exists()))
            {
                if(category::create($request->all()))
                {
                    return redirect()->route('category')->with('success', 'Berjaya mendaftar Kategori buku baru!');
                } else {
                    return redirect()->back()->with('status', 'Gagal mendaftar kategori buku baru.');
                }
            } else {
                return redirect()->back()->with('status', 'Kategori bagi ' . $request->category_name . ' telahpun didaftarkan!');
            }
        } else {
            return redirect()->back()->with('status', 'Gagal mendaftar kategori buku baru.');
        }
    }

    function deleteCategory(Request $request)
    {
        if(category::find($request->id)->delete())
        {
            return redirect()->back()->with('status', 'Berjaya memadam Kategori buku!');
        } else {
            return redirect()->back()->with('fails', 'Gagal memadam Kategori buku.');
        }
    }

    function passcategory(Request $request)
    {
        $category = category::where('id', $request->id)->first();
        if($request->id)
        {
            return view('editcategory', ['cate' => $category]);
        } else {
            return redirect()->back()->with('fails', 'ia silap daripada kami, bukan dari anda &#128512;. Sila refresh webpage ini!');
        }
    }

    function editcategory(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'id' => 'required',
            'category_name' => 'required',
        ]);

        if((!($validator->fails())))
        {
            $cate = category::find($request->id);
            $cate->category_name = $request->category_name;
            if($cate->save())
            {
                return redirect()->route('category')->with('success', 'Berjaya memodifikasi maklumat Kategori!');
            } else {
                return redirect()->back()->with('status', 'Gagal memodifikasi maklumat Kategori Buku.');
            }
        } else {
            return redirect()->back()->with('status', 'Gagal memodifikasi maklumat Kategori Buku.');
        }
    }
}
