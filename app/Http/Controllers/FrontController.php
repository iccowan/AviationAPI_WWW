<?php

namespace App\Http\Controllers;

use Cache;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home() {
        $chart_url = Cache::get('CHART.OFTHEDAY')->pdf_url;
        return view('site.home')->with('chart_url', $chart_url);
    }
}
