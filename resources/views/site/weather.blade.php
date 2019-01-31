@extends('layouts.master')

@section('title')
    Weather
@endsection

@section('content')
    <div class="container">
        <br>
        <h1>Search for Airport Weather (METAR/TAF)</h1>
        <br>
        <form action="/weather/search" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <input type="text" name="apt" placeholder="Airport ID (KATL/ATL)" class="form-control">
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
            </div>
        </form>
        @if($apt != null)
            @if(count($metar) > 0)
                <hr>
                <h3>METAR for {{ $apt }}</h3>
                <br>
                <h5><b>Raw METAR:</b> {{ $metar[$apt]->raw }}</h5>
                <br>
                <p><b>Report Time:</b> {{ \Carbon\Carbon::parse($metar[$apt]->time_of_obs)->format('m/d/Y h:m') }}z
                <p><b>Flight Category:</b> {{ $metar[$apt]->category }}</p>
                <p><b>Temperature/Dewpoint:</b> {{ $metar[$apt]->temp }}&deg;C / {{ $metar[$apt]->dewpoint }}&deg;C</p>
                @if($metar[$apt]->wind_vel == 0)
                    <p><b>Wind:</b> CALM</p>
                @elseif($metar[$apt]->wind_vel < 3)
                    <p><b>Wind:</b> VARIABLE @ {{ $metar[$apt]->wind_vel }} knots</p>
                @else
                    <p><b>Wind:</b> {{ $metar[$apt]->wind }} degrees @ {{ $metar[$apt]->wind_vel }} knots</p>
                @endif
                <p><b>Visibility:</b> {{ $metar[$apt]->visibility }} statue miles</p>
                <p><b>Altimeter:</b> {{ $metar[$apt]->alt_hg }}</p>
                <p><b>Sky Conditions:</b>
                    <ul>
                        @foreach($metar[$apt]->sky_conditions as $s)
                            @if($s->base_agl != null)
                                <li>{{ $s->coverage }} at {{ $s->base_agl }}' AGL</li>
                            @else
                                <li>Skies Clear</li>
                            @endif
                        @endforeach
                    </ul>
                </p>
            @else
                <hr>
                <h3>No METAR found for {{ $apt }}</h3>
            @endif

            @if(count($taf) > 0)
                <hr>
                <h3>TAF for {{ $apt }}</h3>
                <br>
                <h5><b>Raw TAF:</b><br>
                    <?php $i = 0; ?>
                    @foreach($taf[$apt]->line_by_line as $t)
                        <br>
                        @if($i == 0)
                            {{ $t }}
                        @else
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $t }}
                        @endif
                        <?php $i++; ?>
                    @endforeach
                </h5>
                <br>
                <p><b>Issue Time:</b> {{ \Carbon\Carbon::parse($taf[$apt]->issue_time)->format('m/d/Y h:m') }}z
                <p><b>Valid Time:</b> {{ \Carbon\Carbon::parse(substr($taf[$apt]->valid_time, 0, 20))->format('m/d/Y h:m') }}z - {{ \Carbon\Carbon::parse(substr($taf[$apt]->valid_time, -20))->format('m/d/Y h:m') }}z</p>
            @else
                <hr>
                <h3>No TAF found for {{ $apt }}</h3>
            @endif
        @endif
    </div>
@endsection
