<?php

namespace App\Http\Controllers;

use Facades\App\Repository\Vatsim;
use Illuminate\Http\Request;

class VatsimController extends Controller
{
    public function pilotsIndex(Request $request) {
        $apt = $request->apt;
        if($apt != null) {
            $pilots = Vatsim::getPilots($apt);
        } else {
            $pilots = null;
        }

        return view('site.vat_pilots')->with('apt', $apt)->with('pilots', $pilots);
    }

    public function searchPilots(Request $request) {
        if($request->apt != null) {
            $apt = strtoupper($request->apt);
            if(strlen($apt) == 3) {
                $apt = 'K'.$apt;
            }
            return redirect('/vatsim/pilots?apt='.$apt);
        } else {
            return redirect()->back()->with('error', 'You must search for an airport.');
        }
    }

    public function controllersIndex(Request $request) {
        $fac = $request->fac;
        if($fac != null) {
            $controllers = Vatsim::getControllers($fac);
        } else {
            $controllers = null;
        }

        return view('site.vat_controllers')->with('fac', $fac)->with('controllers', $controllers);
    }

    public function searchControllers(Request $request) {
        if($request->fac != null) {
            $fac = strtoupper($request->fac);
            return redirect('/vatsim/controllers?fac='.$fac);
        } else {
            return redirect()->back()->with('error', 'You must search for a facility.');
        }
    }
}
