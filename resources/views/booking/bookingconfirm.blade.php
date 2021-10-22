@extends('layouts.app')
    @section('content')
    {{-- @if(Session::has('carsAvailable'))
    {{print_r($carsAvailable)}}
    @endif --}}
    <div class="container">
        <div class="card">
            <div class="">
                your trip date:{{$values['date']}}
            </div>
            <div class="">
                your trip time:{{$values['time']}}
            </div>
            <div class="">
                your start location:{{$values['startLocationName']}}
            </div>
            <div class="">
                your distination:{{$values['endLocationName']}}
            </div>
            <div class="">
                your trip:
                    @if($values['trip']=='1') ONE WAY TRIP                  
                    @elseif($values['trip']=='2') ROUND TRIP                    
                    @endif
            </div>
            <div class="">
                your travel distance:{{$values['distance']}}KM
            </div>
            <button class='btn btn-success'>
                <a class="btn btn-success" href="/availablecars">select car</a>
            </button>
        </div>
    </div>
      
        
    @endsection