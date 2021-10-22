@extends('layouts.app')
    @section('content')
{{-- {{print_r($data)}} --}}
<div class="container">
    <div class="card">
        <h2>your total distance:{{$data['distance']}}KM</h2>
        <div class="">
            <h2>your payable amount will be:{{$data['fare']}}Rs<h2>
        </div>
        <a class="btn btn-success" href="{{url('checkoutpage/'.Auth::user()->id)}}">next>></a>
    </div>
</div>
    @endsection