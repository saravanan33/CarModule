@extends('layouts.app')
    @section('content')
    @if (Session::has('success'))
    <div class="container">
        <div class="card">
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>a
            HAPPY JOURENY
        </div>
    </div>
        
    @endif
    <div class="container">
        <div class="card">
            <div class="alert alert-success" role="alert">
                BOOKING SUCCESS... CHECK YOUR MAIL ID...
            </div>
            <center><br><a href="mainPage" class="btn btn-danger">HOME</a></center>
        </div>
    </div>
    @endsection