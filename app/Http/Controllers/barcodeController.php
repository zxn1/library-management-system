<?php

namespace App\Http\Controllers;

use App\Models\bookloan;
use Illuminate\Http\Request;
use App\Models\books;
use App\Models\students;
use App\Models\history;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class barcodeController extends Controller
{
    //
    function barcodeToIssue(Request $request)
    {
        //$request->barcode;
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            if(books::where('acquisition', $request->barcode)->exists())
            {
                $book = books::where('acquisition', $request->barcode)->first();
                if(bookloan::where('book_id', $book->id)->exists())
                {
                    return redirect()->back()->with('failsx', 'Status pinjaman buku (' . $book->title .') ini adalah \'sedang dipinjam\' didalam sistem!');
                }
                return view('barcode2book', ['data' => $book, 'now' => Carbon::now()->format('Y-m-d')]);
            } else {
                return redirect()->back()->with('failsx', 'Barkod yang digunakan gagal mendapatkan sebarang maklumat berkaitan buku.');
            }
        }
    }

    function registerLoanDetails(Request $request)
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            $validator =  Validator::make($request->all(), [
                'days' => 'required',
                'bookid' => 'required',
                'date' => 'required'
            ]);
    
            if ($validator->fails()) {
                return redirect()->route('barcode')->with('failsx', 'maklumat tidak dilengkapkan.');
            } else 
            {
                $flag = false;
                if($request->pssid != null)
                {
                    //return $request->pssid;
                    $flag = true;
                    $studdend = students::where('unique_id', $request->pssid);
                    if($studdend->exists())
                    {
                        $return_date = Carbon::parse($request->date)->addDays((int)$request->days)->format("Y-m-d");
                        //return ['test' => $return_date, 'sdfad' => $request->date];
                        $bkloan = new bookloan;
                        $bkloan->book_id = $request->bookid;
                        $bkloan->unique_stud_id = $request->pssid;
                        $bkloan->loan_date = $request->date;
                        $bkloan->return_date = $return_date;
                        if($bkloan->save())
                        {
                            $histo = new history;
                            $histo->student_name = $bkloan->students->fullname;
                            $histo->book_name = $bkloan->books->title;
                            $histo->student_years = $studdend->first()->year;
                            $histo->date_borrow = $request->date;
                            $histo->save();
                            return redirect()->route('barcode')->with('success', 'Buku telah berjaya dipinjamkan!');
                        } else {
                            return redirect()->route('barcode')->with('failsx', 'Maklumat tidak berjaya didaftarkan.');
                        }
                    } else {
                        return redirect()->route('barcode')->with('failsx', 'PSS ID pelajar yang dimasukkan tidak ditemui!');
                    }
                }

                if($flag == false)
                {
                    if($request->studname != null)
                    {
                        $studd = students::where('fullname', $request->studname);
                        if($studd->exists())
                        {
                            $return_date = Carbon::parse($request->date)->addDays((int)$request->days)->format("Y-m-d");
                            //return ['test' => $return_date, 'sdfad' => $request->date];
                            $bkloan = new bookloan;
                            $bkloan->book_id = $request->bookid;
                            $bkloan->unique_stud_id = $studd->first()->unique_id;
                            $bkloan->loan_date = $request->date;
                            $bkloan->return_date = $return_date;
                            if($bkloan->save())
                            {
                                $histo = new history;
                                $histo->student_name = $bkloan->students->fullname;
                                $histo->student_years = $studd->first()->year;
                                $histo->book_name = $bkloan->books->title;
                                $histo->date_borrow = $request->date;
                                $histo->save();
                                return redirect()->route('barcode')->with('success', 'Buku telah berjaya dipinjamkan!');
                            } else {
                                return redirect()->route('barcode')->with('failsx', 'Maklumat tidak berjaya didaftarkan.');
                            }
                        } else {
                            return redirect()->route('barcode')->with('failsx', 'PSS ID pelajar yang dimasukkan tidak ditemui!');
                        }
                    } else {
                        return redirect()->route('barcode')->with('failsx', 'Sila masukkan PSS ID atau nama pelajar!');
                    }
                }
            }
        }
    }

    function procReturnWithBarcode(Request $request)
    {
        $stud = '';
        if($request->pssid != null)
        {
            $stud = students::where('unique_id', $request->pssid)->first();
        } else if($request->studname != null)
        {
            $stud = students::where('fullname', $request->studname)->first();
        }

        if($request->pssid == null && $request->studname == null)
        {
            return redirect()->back()->with('failsx', 'Sila pastikan semua maklumat diperlukan dimasukkan!');
        }

        if($stud != null)
        {
            return view('returnBookScan', ['data' => $stud]);
        } else {
            return redirect()->back()->with('failsx', 'Pelajar yang dicari tidak dijumpai!');
        }
    }

    function checkAvailability(Request $request)
    {
        $stud = students::where('unique_id', $request->id);
        if($stud->exists())
        {
            return $stud->first()->fullname;
        } else {
            return 'no data';
        }
    }
}
