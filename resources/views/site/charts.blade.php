@extends('layouts.master')

@section('title')
    Charts
@endsection

@section('content')
    <div class="container">
        <br>
        <h1>Search for Charts</h1>
        <form action="/charts/search" method="post">
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
            @if($charts[$apt]->General != null || $charts[$apt]->DP != null || $charts[$apt]->STAR != null || $charts[$apt]->CAPP != null)
                <hr>
                <h3>Charts for {{ $apt }}</h3>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        @if(count($charts[$apt]->General) > 0)
                            <h5>General</h5>
                            <table class="table table-striped">
                                <thead>
                                    <th scope="col" style="width:80%">Chart Name</th>
                                    <th scope="col">View Chart</th>
                                </thead>
                                <tbody>
                                    @foreach($charts[$apt]->General as $c)
                                        <tr>
                                            <td>{{ $c->chart_name }}</td>
                                            <td><a class="btn btn-warning simple-tooltip" href="{{ $c->pdf_path }}" target="_blank"><i class="fas fa-eye"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                        @if(count($charts[$apt]->DP) > 0)
                            <h5>Departure Procedures</h5>
                            <table class="table table-striped">
                                <thead>
                                    <th scope="col" style="width:80%">Chart Name</th>
                                    <th scope="col">View Chart</th>
                                </thead>
                                <tbody>
                                    @foreach($charts[$apt]->DP as $c)
                                        <tr>
                                            <td>{{ $c->chart_name }}</td>
                                            <td><a class="btn btn-warning simple-tooltip" href="{{ $c->pdf_path }}" target="_blank"><i class="fas fa-eye"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        @if(count($charts[$apt]->STAR) > 0)
                            <h5>Arrivals</h5>
                            <table class="table table-striped">
                                <thead>
                                    <th scope="col" style="width:80%">Chart Name</th>
                                    <th scope="col">View Chart</th>
                                </thead>
                                <tbody>
                                    @foreach($charts[$apt]->STAR as $c)
                                        <tr>
                                            <td>{{ $c->chart_name }}</td>
                                            <td><a class="btn btn-warning simple-tooltip" href="{{ $c->pdf_path }}" target="_blank"><i class="fas fa-eye"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                        @if(count($charts[$apt]->CAPP) > 0)
                            <h5>Approaches</h5>
                            <table class="table table-striped">
                                <thead>
                                    <th scope="col" style="width:80%">Chart Name</th>
                                    <th scope="col">View Chart</th>
                                </thead>
                                <tbody>
                                    @foreach($charts[$apt]->CAPP as $c)
                                        <tr>
                                            <td>{{ $c->chart_name }}</td>
                                            <td><a class="btn btn-warning simple-tooltip" href="{{ $c->pdf_path }}" target="_blank"><i class="fas fa-eye"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            @else
                <hr>
                <h3>No charts found for {{ $apt }}</h3>
            @endif
        @endif
    </div>
@endsection
