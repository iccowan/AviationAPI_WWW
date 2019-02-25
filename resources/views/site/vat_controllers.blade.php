@extends('layouts.master')

@section('title')
    VATSIM Controllers
@endsection

@section('content')
    <div class="container">
        <br>
        <h1>VATSIM Controllers</h1>
        <br>
        <form action="/vatsim/controllers/search" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <input type="text" name="fac" placeholder="Facility ID (ATL, DC, DCA)" class="form-control">
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
            </div>
        </form>
        @if($fac != null)
            @if($controllers[$fac.'_'])
                <hr>
                <h3>Controllers for facility {{ $fac }}</h3>
                <br>
                    @if(count($controllers[$fac.'_']) > 0)
                        @foreach($controllers[$fac.'_'] as $c)
                            <br>
                            <div class="card">
                                <div class="collapsible">
                                    <div class="card-header">
                                        <h5>{{ $c->callsign }} <i>({{ $c->frequency }})</i></h5>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="card-body">
                                        <p><b>Controller CID:</b> {{ $c->cid }}</p>
                                        <p><b>Controller Name:</b> {{ $c->name }}</p>
                                        <p><b>Time Online:</b> {{ $c->time_online }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
            @else
                <hr>
                <h3>No controllers found for {{ $fac }}</h3>
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
