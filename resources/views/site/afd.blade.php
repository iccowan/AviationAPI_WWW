@extends('layouts.master')

@section('title')
    AFD
@endsection

@section('content')
    <div class="container">
        <br>
        <h1>Search for AFD</h1>
        <form action="/charts/afd/search" method="post">
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
            @if($afd != null)
                <hr>
                <h3>AFD for {{ $apt }}</h3>
                <br>
                <center>
                    <embed src="{{ $afd[0]->pdf_path }}" width="600px" height="910px" />
                </center>
            @else
                <hr>
                <h3>No AFD found for {{ $apt }}</h3>
            @endif
        @endif
    </div>
@endsection
