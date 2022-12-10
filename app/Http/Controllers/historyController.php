<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\history;

class historyController extends Controller
{
    //
    function getReport()
    {
        $history = history::limit(14)->get();
        return view('report', ['data' => $history]);
    }
}
