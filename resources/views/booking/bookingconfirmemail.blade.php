{{-- <h1>hi</h1> --}}
{{-- @foreach ($emails as $email) --}}
<div class="container">
    <div class="card">
        {{-- {{print_r($emails)}}{{exit}} --}}
        {{-- @foreach ($emails as $tableJoins) --}}
        <div class="container">
            <h3>Hi Mr/Mrs.{{$emails['name']}}&nbsp;YOUR BOOKING CONFIRM</h3>
        </div>
       
        <div class="card" id="travel">
            <div class="title">TRAVEL DETAILS</div>
                <h3>Your Starting Point:&nbsp;{{$emails['start_location']}}</h3>
        
                <h3>Your Distination Point:&nbsp;{{$emails['end_location']}}</h3>
            
                <h3>Distance Is:&nbsp;{{$emails['travel_distance']}}&nbsp;KM</h3>
            
                <h3>Total Fare Will Be:&nbsp;{{$emails['fare']}}&nbsp;Rs</h3>
                <h3 class="note">*EXTRA FOR WAITING CHARGE*</h3>
                <h3>Travel Date:&nbsp;{{$emails['travel_date']}}</h3>
                <h3>travel Time:&nbsp;{{$emails['travel_time']}}</h3>
            </div>
        </div>                            
        <div class="card" id="car">
            <div class="title">CAR DETAILS</div>
            <div class="container">
                <h3>Car Name:&nbsp;{{$emails['car_name']}}</h3>
            
                <h3>Car number:&nbsp;{{$emails['car_number']}}</h3>
            
                {{-- <h3>Car Seats:&nbsp;{{$tableJoins['']car_seats}}</h3>
            
                <h3>Car Baggage:&nbsp;{{$tableJoins['']car_baggage}}</h3>   --}}
            
                {{-- <h3>Car Image:&nbsp;<img src="http://localhost/laravel/CarModule/storage/app/{{$tableJoins->car_image}}" width="400px" height="250px"></h3>   --}}
            
                <h3></h3>  
            </div>
        </div>    
{{-- @endforeach --}}