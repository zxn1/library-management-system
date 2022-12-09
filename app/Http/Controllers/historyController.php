<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\history;

class historyController extends Controller
{
    //
    function getReport()
    {
        $history = history::all();
        return view('report', ['data' => $history]);
    }
}
