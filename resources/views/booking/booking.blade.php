@extends('layouts.app')
    @section('content')
    <script src="{{ asset('/js/jquery.js') }}" defer></script>
    <script src="{{ asset('/js/cdn.js') }}" defer></script>  
    <div class="container">
        {{-- <div class="col-lg-1 col-offset-6 centered"> --}}
        @if(Session::has('fail'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('fail')}}
        </div>
        @endif
        <div class="form">
        <form action="bookingdata" method="get">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

            <input type='text' id='start' name='start' placeholder="Starting point" autocomplete="off" value={{old('start')}}>
            @error('start')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input type="text" id="end" name="end" placeholder="End Point" autocomplete="off" value={{old('end')}}><br>
            @error('end')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input type="radio" id="oneway" name="rotation_trip" value='1'>One Way<br>
            <input type="radio" id="round" name="rotation_trip" value='2'>Round Trip<br>
            @error('travel type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <label for="datetime"name="">Booking Date </label>
            <input type="date" id="date" name="date" value={{old('date')}}><br>
            @error('date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="datetime"name="">Booking Time </label>
            <input type="time" id="time" name="time" value={{old('time')}}><br>
            @error('time')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input type="submit" value="Search"><br>
        </form> <center><br><a href="{{ url()->previous() }}" class="btn btn-danger">back</a></center>
    {{-- </div>  --}}
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
            {{-- {{dd($error)}} --}}
                {{$error}}<br>
            @endforeach
        </div>
        @endif
    </div>   
    
    <script type="text/javascript" src="{{asset('/js/ajax.js')}}"></script>

@endsection