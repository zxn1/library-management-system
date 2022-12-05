<?php

namespace App\Http\Controllers;

use App\Models\authors;
use App\Models\books;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\languages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;

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
            $arr = [];
            for($i = 0; $i < count($category); $i++)
            {
                $book = count(books::where('categ_id', $category[$i]->id)->get());
                array_push($arr, $book);
            }
            return view('category', ['data' => $category, 'count' => $arr]);
        }
    }

    function displaycategorybysearch(Request $request)
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            $category = category::where('category_name', 'LIKE', '%' . $request->search . '%')->paginate(5);
            $arr = [];
            for($i = 0; $i < count($category); $i++)
            {
                $book = count(books::where('categ_id', $category[$i]->id)->get());
                array_push($arr, $book);
            }
            Session::flash('status', "Buku yang dijumpai menerusi carian jenis kategori adalah " . count($category) . ' buah buku.');
            return view('category', ['data' => $category, 'count' => $arr]);
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

    function getCategoryName()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            $categ = category::select('category_name', 'id')->get();
            $lang = languages::select('id', 'type_lang')->get();
            $count = 0;
            if(books::count() >= 1)
            {
                $count = books::latest()->first()->id;
            }
            /*$categ = category::where('category_name', 'LIKE', '%' . $request->search . '%')->select('category_name')->limit('4')->get();
            $array = [];

            for($i = 0; $i < count($categ); $i++)
            {
                array_push($array, ''. $categ[$i]->category_name);
            }

            return $array;*/
            return view('bookregister', ['list_category' => $categ, 'list_language' => $lang, 'booklastid' => $count]);
        }
    }

    function getAuthorName(Request $request)
    {
        $author = authors::where('name', 'LIKE', '%' . $request->search . '%')->select('name')->limit('4')->get();
        $array = [];

        for($i = 0; $i < count($author); $i++)
        {
            array_push($array, ''. $author[$i]->name);
        }

        return $array;
    }

    /*
    function getLangName(Request $request)
    {
        $lang = languages::where('type_lang', 'LIKE', '%' . $request->search . '%')->select('type_lang')->limit('4')->get();
        $array = [];

        for($i = 0; $i < count($lang); $i++)
        {
            array_push($array, ''. $lang[$i]->type_lang);
        }

        return $array;
    }*/
}
