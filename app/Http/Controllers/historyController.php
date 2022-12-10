<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\history;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class historyController extends Controller
{
    //
    function getReport()
    {
        $history = history::limit(14)->get();
        return view('report', ['data' => $history]);
    }

    function filterReport(Request $request)
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else {
            //whereBetween('reservation_from', [$from, $to])->get();

            $history = "";
            $validator =  Validator::make($request->all(), [
                'tapistarikh' => 'required',
                'start_year' => 'required',
                'end_year' => 'required'
            ]);

            //return $request->start_year . '   ' . $request->end_year . '  ' .  $request->tapistarikh;
    
            if ($validator->fails()) {
            } else {
                //part 1
                if($request->tapistarikh == 1)
                {
                    $history = history::whereBetween('date_borrow', [$request->start_year, $request->end_year]);
                } else {
                    //return 'sini';
                    $history = history::whereBetween('date_return', [$request->start_year, $request->end_year]);
                }

                //part 2
                //$history = $history->select('student_name', 'book_name', 'created_at');

                //part 2
                $arr = ['student_name', 'book_name', 'created_at']; //default thing to retrieve
                if($request->pinjam != null)
                {
                    //return 'sini';
                    array_push($arr, 'date_borrow');
                    //$history = $history->select('date_borrow');
                }
                if($request->pulang != null)
                {
                    array_push($arr, 'date_return');
                    //$history = $history->select('date_return');
                }
                if($request->denda != null)
                {
                    array_push($arr, 'penaltyCharge');
                    //$history = $history->select('penaltyCharge');
                }

                if($request->limit !=null)
                {
                    if($request->pulang == null)
                    {
                        if($request->denda != null)
                        {
                            $history = $history->where('date_return', '<>' ,null)->select($arr)->limit($request->limit)->get();
                            //$history = $history->select('penaltyCharge');
                        } else {
                            $history = $history->where('date_return', null)->select($arr)->limit($request->limit)->get();
                        }
                    } else {
                        $history = $history->select($arr)->limit($request->limit)->get();
                    }
                } else {
                    if($request->pulang == null)
                    {
                        if($request->denda != null)
                        {
                            $history = $history->where('date_return', '<>' ,null)->select($arr)->get();
                            //$history = $history->select('penaltyCharge');
                        } else {
                            $history = $history->where('date_return', null)->select($arr)->get();
                        }
                    } else {
                        $history = $history->select($arr)->get();
                    }   
                }
            }

            Session::flash('norow', 'Sebanyak ' . count($history) . ' rekod laporan dijumpai.');
            //$history = history::whereDate('return_date', '<', now())->get();
            return view('report', ['data' => $history]);
        }
    }
}
