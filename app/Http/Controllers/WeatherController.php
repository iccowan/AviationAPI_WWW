<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facades\App\Repository\Weathers;

class WeatherController extends Controller
{
    public function index(Request $request) {
        $apt = $request->apt;
        if($apt != null) {
            $metar = Weathers::getMetar($apt);
            $taf = Weathers::getTaf($apt);
        } else {
            $metar = null;
            $taf = null;
        }
        
        return view('site.weather')->with('metar', $metar)->with('taf', $taf)->with('apt', $apt);
    }

    public function searchAirport(Request $request) {
        if($request->apt != null) {
            $apt = $request->apt;
            if(strlen($apt) == 3) {
                $apt = 'K'.strtoupper($apt);
            }
            return redirect('/weather?apt='.$apt);
        } else {
            return redirect()->back()->with('error', 'You must search for an airport.');
        }
    }
}
