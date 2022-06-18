@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
           
            @foreach ($tableJoin as $tableJoins)
            <div class="container">
                <h3>Hi Mr/Mrs.{{$tableJoins->name}}</h3>
            </div>
           
            <div class="card" id="travel">
                <div class="title">TRAVEL DETAILS</div>
                    <h3>Your Starting Point:&nbsp;{{$tableJoins->start_location}}</h3>
            
                    <h3>Your Distination Point:&nbsp;{{$tableJoins->end_location}}</h3>
                
                    <h3>Distance Is:&nbsp;{{$tableJoins->travel_distance}}&nbsp;KM</h3>
                
                    <h3>Total Fare Will Be:&nbsp;{{$tableJoins->fare}}&nbsp;Rs</h3>
                    <h3 class="note">*EXTRA FOR WAITING CHARGE*</h3>
                    <h3>Travel Date:&nbsp;{{$tableJoins->travel_date}}</h3>
                    <h3>travel Time:&nbsp;{{$tableJoins->travel_time}}</h3>
                </div>
            </div>                            
            <div class="card" id="car">
                <div class="title">CAR DETAILS</div>
                <div class="container">
                    <h3>Car Name:&nbsp;{{$tableJoins->car_name}}</h3>
                
                    <h3>Car number:&nbsp;{{$tableJoins->car_number}}</h3>
                
                    <h3>Car Seats:&nbsp;{{$tableJoins->car_seats}}</h3>
                
                    <h3>Car Baggage:&nbsp;{{$tableJoins->car_baggage}}</h3>  
                
                    <h3>Car Image:&nbsp;<img src="http://localhost/laravel/CarModule/storage/app/{{$tableJoins->car_image}}" width="400px" height="250px"></h3>  
                
                    <h3></h3>  
                </div>
            </div>           
            @endforeach<br>
            {{-- <center><a class="btn btn-success" href="{{url('bookingconfirm/'.$tableJoins->booking_id)}}">confirm</a></center> --}}
        </div>
    </div>   
@endsection