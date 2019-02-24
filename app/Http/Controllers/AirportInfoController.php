<?php

namespace App\Http\Controllers;

use Facades\App\Repository\Airports;
use Illuminate\Http\Request;

class AirportInfoController extends Controller
{
    public function index(Request $request) {
        $apt = $request->apt;
        if($apt != null) {
            $info = Airports::getAirportInfo($apt);
        } else {
            $info = null;
        }

        return view('site.info')->with('apt', $apt)->with('info', $info);
    }

    public function search(Request $request) {
        if($request->apt != null) {
            $apt = strtoupper($request->apt);
            
            return redirect('/airport-info?apt='.$apt);
        } else {
            return redirect()->back()->with('error', 'You must search for an airport.');
        }
    }
}
