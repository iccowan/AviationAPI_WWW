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

    public function AFDindex(Request $request) {
        $apt = $request->apt;
        if($apt != null) {
            $afd = Charts::getAFD($apt);
        } else {
            $afd = null;
        }

        return view('site.afd')->with('apt', $apt)->with('afd', $afd);
    }

    public function searchAFD(Request $request) {
        if($request->apt != null) {
            $apt = $request->apt;
            if(strlen($apt) == 3) {
                $apt = 'K'.strtoupper($apt);
            }
            return redirect('/charts/afd?apt='.$apt);
        } else {
            return redirect()->back()->with('error', 'You must search for an airport.');
        }
    }

    public function ChartChangeindex(Request $request) {
        $apt = $request->apt;
        $c_name = $request->chart;
        if($apt != null) {
            $charts = Charts::getChartChanges($apt, $c_name);
        } else {
            $charts = null;
        }

        return view('site.chart_changes')->with('apt', $apt)->with('charts', $charts);
    }

    public function searchChartChange(Request $request) {
        if($request->apt != null && $request->c_name != null) {
            $apt = $request->apt;
            if($apt != null) {
                if(strlen($apt) == 3) {
                    $apt = 'K'.strtoupper($apt);
                }
            }
            $c_name = $request->c_name;
            return redirect('/charts/changes?apt='.$apt.'&chart='.$c_name);
        } else {
            return redirect()->back()->with('error', 'You must search for an airport or a chart name.');
        }
    }
}
