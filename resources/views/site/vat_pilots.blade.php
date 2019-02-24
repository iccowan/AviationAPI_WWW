@extends('layouts.master')

@section('title')
    VATSIM Pilots
@endsection

@section('content')
    <div class="container">
        <br>
        <h1>VATSIM Pilots</h1>
        <br>
        <form action="/vatsim/pilots/search" method="post">
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
            @if($pilots[$apt]->Departures || $pilots[$apt]->Arrivals != null)
                <hr>
                <h3>Arriving or Departing Pilots for {{ $apt }}</h3>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        @if(count($pilots[$apt]->Departures) > 0)
                            <h5>Departures ({!! count($pilots[$apt]->Departures) !!})</h5>
                            @foreach($pilots[$apt]->Departures as $p)
                                <br>
                                <div class="card">
                                    <div class="collapsible">
                                        <div class="card-header">
                                            <h5>{{ $p->callsign }} <i>({{ $p->stage_of_flight }})</i></h5>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="card-body">
                                            <p><b>Pilot CID:</b> {{ $p->cid }}</p>
                                            <p><b>Pilot Name:</b> {{ $p->name }}</p>
                                            <p><b>GPS Altitude:</b> {{ $p->altitude }}</p>
                                            <p><b>Ground Speed:</b> {{ $p->ground_speed }} KTS</p>
                                            <p><b>Heading:</b> {{ $p->heading }}</p>
                                            <p><b>Transponder Code:</b> {{ $p->transponder }}</p>
                                            <p><b>Departure Airport:</b> {{ $p->departure }}</p>
                                            <p><b>Arrival Airport:</b> {{ $p->arrival }}</p>
                                            <p><b>Route:</b> {{ $p->route }}</p>
                                            <p><b>Distance from Departure:</b> {{ $p->nm_from_dep }} NM</p>
                                            <p><b>Distance from Arrival:</b> {{ $p->nm_from_arr }} NM</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-sm-6">
                        @if(count($pilots[$apt]->Arrivals) > 0)
                            <h5>Arrivals ({!! count($pilots[$apt]->Arrivals) !!})</h5>
                            @foreach($pilots[$apt]->Arrivals as $p)
                                <br>
                                <div class="card">
                                    <div class="collapsible">
                                        <div class="card-header">
                                            <h5>{{ $p->callsign }} <i>({{ $p->stage_of_flight }})</i></h5>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="card-body">
                                            <p><b>Pilot CID:</b> {{ $p->cid }}</p>
                                            <p><b>Pilot Name:</b> {{ $p->name }}</p>
                                            <p><b>GPS Altitude:</b> {{ $p->altitude }}</p>
                                            <p><b>Ground Speed:</b> {{ $p->ground_speed }} KTS</p>
                                            <p><b>Heading:</b> {{ $p->heading }}</p>
                                            <p><b>Transponder Code:</b> {{ $p->transponder }}</p>
                                            <p><b>Departure Airport:</b> {{ $p->departure }}</p>
                                            <p><b>Arrival Airport:</b> {{ $p->arrival }}</p>
                                            <p><b>Route:</b> {{ $p->route }}</p>
                                            <p><b>Distance from Departure:</b> {{ $p->nm_from_dep }} NM</p>
                                            <p><b>Distance from Arrival:</b> {{ $p->nm_from_arr }} NM</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @else
                <hr>
                <h3>No departures or arrivals found for {{ $apt }}</h3>
            @endif
        @endif
    </div>

<style>
.collapsible {
cursor: pointer;
}
.content {
    overflow: hidden;
    min-height: 0;
    max-height: 0;
    transition: max-height 0.5s ease-out;
}
</style>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}
</script>
@endsection
