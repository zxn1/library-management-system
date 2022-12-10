<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\history;
use Carbon\Carbon;
use Session;

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
        //bookloan::whereDate('return_date', '<', now())->paginate(4);
        $history = history::whereDate('return_date', '<', now())->get();
        return view('report', ['data' => $history]);
    }
}
