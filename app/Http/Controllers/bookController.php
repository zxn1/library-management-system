<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;
use App\Models\authors;
use App\Models\category;
use App\Models\languages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class bookController extends Controller
{
    //
    function displaybooks()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            $book = books::paginate(4);
            return view('booklist', ['data' => $book]);
        }
    }

    function getRegister(Request $request)
    {
        //return authors::where('name', $request->pengarang)->select('id')->first();
        $validator =  Validator::make($request->all(), [
            'identiti' => 'required',
            'booktitle' => 'required',
            'rack' => 'required',
            'penerbit' => 'required',
            'categoryval' => 'required',
            'languageval' => 'required',
            'pengarang' => 'required',
            'year_publish' => 'required',
            'year_acquisition' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'maklumat tidak dilengkapkan.');
        } else 
        {
            $book = new books;
            if($request->file('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('Image'), $filename);
                $book->cover_image = $filename;
            }
            /*if($request->image != null){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $book->cover_image = $imageName;
            }*/
            $book->acquisition = $request->identiti;
            $book->title = $request->booktitle;
            $book->rack_number = $request->rack;
            $book->publisher = $request->penerbit;
            $book->year_acquisition = $request->year_acquisition;
            $book->year_publish = $request->year_publish;
            $book->lang_id = $request->languageval;
            $book->categ_id = $request->categoryval;
            if(authors::where('name', $request->pengarang)->select('id')->exists())
            {
                $book->author_id = authors::where('name', $request->pengarang)->select('id')->first()->id;
            } else {
                $auth = new authors;
                $auth->name = $request->pengarang;
                $auth->save();
                $book->author_id = $auth->id;
            }
            if($book->save())
            {
                return redirect()->route('bklst')->with('success', 'buku berjaya didaftarkan.');
            } else {
                return redirect()->back()->with('error', 'buku gagal didaftarkan.');
            }
        }
    }

    function removeBook(Request $request)
    {
        if(books::find($request->id)->delete())
        {
            return redirect()->back()->with('status', 'rekod buku berjaya dipadamkan.');
        } else {
            return redirect()->back()->with('fails', 'rekod buku gagal dipadamkan.');
        }
    }

    function modifyBookdisplay(Request $request)
    {
        $book = books::where('id', $request->id)->first();
        $categ = category::select('category_name', 'id')->get();
        $lang = languages::select('id', 'type_lang')->get();

        return view('modifybook', ['data'=> $book, 'list_category' => $categ, 'list_language' => $lang]);
    }

    function modifyBooks(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'id' => 'required',
            'identiti' => 'required',
            'booktitle' => 'required',
            'rack' => 'required',
            'penerbit' => 'required',
            'categoryval' => 'required',
            'languageval' => 'required',
            'pengarang' => 'required',
            'year_publish' => 'required',
            'year_acquisition' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'maklumat tidak dilengkapkan.');
        } else 
        {
            $book = books::find($request->id);
            if($request->file('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('Image'), $filename);
                $book->cover_image = $filename;
            }
            /*if($request->image != null){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $book->cover_image = $imageName;
            }*/
            $book->acquisition = $request->identiti;
            $book->title = $request->booktitle;
            $book->rack_number = $request->rack;
            $book->publisher = $request->penerbit;
            $book->year_acquisition = $request->year_acquisition;
            $book->year_publish = $request->year_publish;
            $book->lang_id = $request->languageval;
            $book->categ_id = $request->categoryval;
            if(authors::where('name', $request->pengarang)->select('id')->exists())
            {
                $book->author_id = authors::where('name', $request->pengarang)->select('id')->first()->id;
            } else {
                $auth = new authors;
                $auth->name = $request->pengarang;
                $auth->save();
                $book->author_id = $auth->id;
            }
            if($book->save())
            {
                return redirect()->route('bklst')->with('success', 'buku berjaya didaftarkan.');
            } else {
                return redirect()->back()->with('error', 'buku gagal didaftarkan.');
            }
        }
    }
}
