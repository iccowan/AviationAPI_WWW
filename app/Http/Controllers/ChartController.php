<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facades\App\Repository\Charts;

class ChartController extends Controller
{
    public function index(Request $request) {
        $apt = $request->apt;
        if($apt != null) {
            $charts = Charts::getCharts($apt);
        } else {
            $charts = null;
        }

        return view('site.charts')->with('apt', $apt)->with('charts', $charts);
    }

    public function searchChart(Request $request) {
        if($request->apt != null) {
            $apt = $request->apt;
            if(strlen($apt) == 3) {
                $apt = 'K'.strtoupper($apt);
            }
            return redirect('/charts?apt='.$apt);
        } else {
            return redirect()->back()->with('error', 'You must search for an airport.');
        }
    }
}
