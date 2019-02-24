@extends('layouts.master')

@section('title')
    Airport Information
@endsection

@section('content')
    <div class="container">
        <br>
        <h1>Airport Information</h1>
        <br>
        <form action="/airport-info/search" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <input type="text" name="apt" placeholder="Airport ID (ATL, KATL)" class="form-control">
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
            </div>
        </form>
        @if($apt != null)
            @if($info[$apt])
                <hr>
                <h3>Airport Information for {{ $apt }}</h3>
                <br>
                <p><b>Facility Type:</b> {{ $info[$apt][0]->type }}</p>
                <p><b>Facility Name:</b> {{ $info[$apt][0]->facility_name }}</p>
                <p><b>FAA/ICAO Identifier:</b> {{ $info[$apt][0]->faa_ident }} / {{ $info[$apt][0]->icao_ident }}</p>
                <p><b>City:</b> {{ $info[$apt][0]->city }}</p>
                <p><b>County:</b> {{ $info[$apt][0]->county }}</p>
                <p><b>State:</b> {{ $info[$apt][0]->state_full }} ({{ $info[$apt][0]->state }})</p>
                <p><b>Use:</b>@if($info[$apt][0]->use == 'PU') Public Use @else Private Use @endif </p>
                <p><b>Ownership:</b> @if($info[$apt][0]->ownership == 'PU') Publicly Owned @else Privately Owned @endif </p>
                <p><b>Manager:</b> {{ $info[$apt][0]->manager }}</p>
                <p><b>Manager Phone Number:</b> {{ $info[$apt][0]->manager_phone }}</p>
                <p><b>Airport Elevation:</b> {{ $info[$apt][0]->elevation }} MSL</p>
                <p><b>Traffic Pattern Altitude:</b>@if($info[$apt][0]->tpa != '') {{ $info[$apt][0]->tpa }} @else {{ (int)$info[$apt][0]->elevation + 1000 }} @endif MSL</p>
                <p><b>Magnetic Variation:</b> {{ $info[$apt][0]->magnetic_variation }}</p>
                <p><b>VFR Sectional:</b> {{ $info[$apt][0]->vfr_sectional }}</p>
                <p><b>Boundary ARTCC:</b> {{ $info[$apt][0]->boundary_artcc_name }} ({{ $info[$apt][0]->boundary_artcc }})</p>
                <p><b>Responsible ARTCC:</b>@if($info[$apt][0]->responsible_artcc != '') {{ $info[$apt][0]->responsible_artcc_name }} ({{ $info[$apt][0]->responsible_artcc }}) @else {{ $info[$apt][0]->boundary_artcc_name }} ({{ $info[$apt][0]->boundary_artcc }}) @endif</p>
                <p><b>Customs Airport of Entry?:</b>@if($info[$apt][0]->customs_airport_of_entry == 'Y') Yes @else No @endif </p>
                <p><b>Control Tower?:</b> @if($info[$apt][0]->control_tower == 'Y') Yes @else No @endif </p>
                <p><b>UNICOM:</b>@if($info[$apt][0]->unicom != '') {{ $info[$apt][0]->unicom }} @else {{ $info[$apt][0]->ctaf }} @endif</p>
                <p><b>CTAF:</b>@if($info[$apt][0]->ctaf != '') {{ $info[$apt][0]->ctaf }} @else {{ $info[$apt][0]->unicom }} @endif</p>
                <p><a href="/charts?apt={{ $info[$apt][0]->icao_ident }}">VIEW CHARTS FOR {{ $info[$apt][0]->icao_ident }}</a></p>
            @else
                <hr>
                <h3>No airport information found for {{ $apt }}</h3>
            @endif
        @endif
    </div>
@endsection
