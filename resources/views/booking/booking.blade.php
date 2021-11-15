@extends('layouts.app')
    @section('content')
    <script src="{{ asset('/js/jquery.js') }}" defer></script>
    <script src="{{ asset('/js/cdn.js') }}" defer></script> 
    <style>
    div.form
    {
        display: block;
        text-align: center;
    }
    form
    {
        display: inline-block;
        margin-left: auto;
        margin-right: auto;
        text-align: left;
    }
    .title{
        text-align: center;
        align-self: auto;
        color: rgb(10, 9, 10);
        background: 1em;
        background-color: rgb(156, 156, 204);
        font-family: 'Courier New', Courier, monospace
    }
    .roundbar{
        display:inline-block;
        color: black;
        background-color: rgb(216, 226, 226);
        margin-left: 1ch;
        margin-right: 1ch;
        margin-top: 1ch;
        margin-bottom: 1ch;
        border-radius: 25px;
    border: 2px solid #609;
    padding: 20px; 
    width: 200px;
    height: 15px;
        
    }
    .forms{
        display: block;
    }
    </style>
    <div class="container">
        {{-- <div class="col-lg-1 col-offset-6 centered"> --}}
        @if(Session::has('fail'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('fail')}}
        </div>
        @endif
        <body>
            <div class="title">BOOKING FORM</div>
            <div class="form"><div class="forms">
                <form action="bookingdata" method="get">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                    <input type='text' id='start' class="roundbar" name='start' placeholder="Starting point" autocomplete="off" value={{old('start')}}>
                    
                    <input type="text" id="end" class="roundbar" name="end" placeholder="End Point" autocomplete="off" value={{old('end')}}><br>

                    {{-- <label for="trip">triptype</label> --}}
                    <input type="radio" id="trip" name="rotation_trip" value='1'>One Way
                    <input type="radio" id="trip" name="rotation_trip" value='2'>Round Trip<br>
                    
                    <label for="datetime"name="">Booking Date </label>
                    <input type="date" id="date" name="date" value={{old('date')}}><br>
                    
                    <label for="datetime"name="">Booking Time </label>
                    <input type="time" id="time" name="time" value={{old('time')}}><br>
                    
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
            </div>  </div> 
        </body>
    <script type="text/javascript" src="{{asset('/js/ajax.js')}}"></script>
@endsection