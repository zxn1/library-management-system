<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;
use App\Models\authors;
use App\Models\bookloan;
use App\Models\category;
use App\Models\languages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;

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

    function searchbookbytitle(Request $request)
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            //'name', 'LIKE', '%' . $request->search . '%'
            $book = books::where('title', 'LIKE', '%'. $request->booktitle .'%')->paginate(4);
            Session::flash('status', "Buku yang dijumpai menerusi carian tajuk buku adalah " . count($book) . ' buah buku.');
            return view('booklist', ['data' => $book]);
        }
    }

    function searchbookbypublisher(Request $request)
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            //'name', 'LIKE', '%' . $request->search . '%'
            $book = books::where('publisher', 'LIKE', '%'. $request->publisher .'%')->paginate(4);
            Session::flash('status', "Buku yang dijumpai menerusi carian penerbit buku adalah " . count($book) . ' buah buku.');
            return view('booklist', ['data' => $book]);
        }
    }

    function searchbookbyyearpublished(Request $request)
    {
        /*
        $dates = DatePrice::where('tour_id','=',$request->product_id)
         ->whereBetween('date', array($request->from_date, $request->to_date))
         ->get();
        */
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            //'name', 'LIKE', '%' . $request->search . '%'
            $book = books::whereBetween('year_publish', array($request->start_year_publish, $request->end_year_publish))->paginate(4);
            Session::flash('status', "Buku yang dijumpai menerusi carian tahun buku diterbitkan adalah " . count($book) . ' buah buku.');
            return view('booklist', ['data' => $book]);
        }
    }

    function searchbookbyyearacquisition(Request $request)
    {
        /*
        $dates = DatePrice::where('tour_id','=',$request->product_id)
         ->whereBetween('date', array($request->from_date, $request->to_date))
         ->get();
        */
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            //'name', 'LIKE', '%' . $request->search . '%'
            $book = books::whereBetween('year_acquisition', array($request->start_year_acquisition, $request->end_year_acquisition))->paginate(4);
            Session::flash('status', "Buku yang dijumpai menerusi carian tahun perolehan buku adalah " . count($book) . ' buah buku.');
            return view('booklist', ['data' => $book]);
        }
    }

    function searchbookbyauthor(Request $request)
    {
        /*
        $posts = ModelA::whereHas('modelb', function ($query) {
         $query->where('title', 'like', 'foo%');
        })->get();
        */
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            $authorname = $request->author;
            //'name', 'LIKE', '%' . $request->search . '%'
            /*$book = books::where('author_id', '%'. $request->publisher .'%')->paginate(4);
            return view('booklist', ['data' => $book]);*/
            $book = books::whereHas('authors', function ($query) use($authorname) {
                $query->where('name', 'LIKE', '%'. $authorname . '%');
            })->paginate(4);
            Session::flash('status', "Buku yang dijumpai menerusi carian pengarang buku adalah " . count($book) . ' buah buku.');
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
                Session::flash('success', "buku berjaya didaftarkan.");
                return redirect()->route('viewbks', $book->id)->with(['success' => 'buku berjaya didaftarkan.']);
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

    function viewBook(Request $request)
    {
        $book = books::where('id', $request->id)->first();
        return view('viewbook', ['data' => $book]);
    }

    function displayBookLoan()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            $bkloan = bookloan::paginate(4);
            return view('bookloan', ['data' => $bkloan]);
        }
    }

    function bookQuery(Request $request)
    {
        $book = books::where('title', 'LIKE', '%' . $request->search . '%')->select('title')->limit('4')->get();
        $array = [];

        for($i = 0; $i < count($book); $i++)
        {
            array_push($array, ''. $book[$i]->title);
        }

        return $array;
    }
    
    function getRegBookLoan(Request $request)
    {
        //return authors::where('name', $request->pengarang)->select('id')->first();
        $validator =  Validator::make($request->all(), [
            'idpss' => 'required',
            'bookname' => 'required',
            'dateloan' => 'required',
            'datereturn' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'maklumat tidak dilengkapkan.');
        } else 
        {
            $book = books::where('title', $request->bookname)->first();
            if($book->id == null)
            {
                return redirect()->back()->with('error', 'Peminjaman gagal direkodkan.');
            }
            $bkloan = new bookloan;
            $bkloan->book_id = $book->id;
            $bkloan->unique_stud_id = $request->idpss;
            $bkloan->loan_date = $request->dateloan;
            $bkloan->return_date = $request->datereturn;

            if($bkloan->save())
            {
                Session::flash('success', "Peminjaman buku berjaya direkodkan.");
                return redirect()->route('bkloan')->with(['success' => 'Peminjaman buku berjaya direkodkan.']);
            } else {
                return redirect()->back()->with('error', 'Peminjaman gagal direkodkan.');
            }
        }
    }
}
