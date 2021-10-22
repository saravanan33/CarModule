{{-- {{print_r(session('status'))}}
{{exit}} --}}
@extends('layouts.app')
   
@section('content')
@if (Session::has('error'))
<div class="alert alert-danger" role="alert">
    {{Session::get('error')}}
  </div>                        
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    You are user.
                    <a href="/bookingpage">bookingpage</a>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection