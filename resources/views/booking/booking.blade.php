@extends('layouts.app')
    @section('content')
    <div class="container">
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
    @endif
    
    <form action="bookingdata" method="get">
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        {{-- <input type="hidden" name="email" value="{{Auth::user()->email}}"> --}}
        <input type='text' id='start' name='start' placeholder="Starting point" autocomplete="off" required>
        @error('start')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input type="text" id="end" name="end" placeholder="End Point" autocomplete="off" required><br>
        @error('end')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input type="radio" id="oneway" name="rotation_trip" value='1'>One Way<br>
        <input type="radio" id="round" name="rotation_trip" value='2'>Round Trip<br>
        @error('end')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <label for="datetime"name="">Booking Date </label>
        <input type="date" id="date" name="date" required><br>
        @error('date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label for="datetime"name="">Booking Time </label>
        <input type="time" id="time" name="time" required><br>
        @error('time')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        <input type="submit" value="Search"><br>
    </form> 
</div>   

<div class="">hi</div>
    <script type="text/javascript" src="{{asset('../js/ajax.js')}}"></script>
@endsection