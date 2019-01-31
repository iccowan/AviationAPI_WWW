@extends('layouts.master')

@section('title')
    Chart Changes
@endsection

@section('content')
    <div class="container">
        <br>
        <h1>Search for Chart Change Comparisons</h1>
        <form action="/charts/changes/search" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <input type="text" name="apt" placeholder="Airport ID (KATL/ATL) (Optional)" class="form-control">
                </div>
                <div class="col-sm-4">
                    <input type="text" name="c_name" placeholder="Chart Name (Optional)" class="form-control">
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
            </div>
        </form>
        @if($apt != null)
            @if(count($charts) > 0)
                <hr>
                <h3>Chart Change Comparisons for {{ $apt }}</h3>
                <br>
                <h5>General</h5>
                <table class="table table-striped">
                    <thead>
                        <th scope="col" style="width:80%">Chart Name</th>
                        <th scope="col">View Comparison</th>
                    </thead>
                    <tbody>
                        @foreach($charts as $c)
                            <tr>
                                <td>{{ $c->chart_name }}</td>
                                <td><a class="btn btn-warning simple-tooltip" href="{{ $c->pdf_path }}" target="_blank"><i class="fas fa-eye"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <hr>
                <h3>No chart changes found for {{ $apt }} from the last cycle</h3>
            @endif
        @endif
    </div>
@endsection