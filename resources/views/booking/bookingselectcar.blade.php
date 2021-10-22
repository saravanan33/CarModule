@extends('layouts.app')
    @section('content')
   {{-- {{print_r($car)}} --}}
   <div class="container">
       <div class="card"> 
           <center>          
            @foreach ($car as $cars)
                @if($cars->car_availability=='A')
                <a href="selectedcar/{{$cars->car_id}}/{{$cars->car_price_per_km}}"><img src="http://localhost/laravel/CarModule/storage/app/{{$cars->car_image}}" width="250px" height="150px"></a><br>
                CAR NAME:{{$cars->car_name}}<br>
                CAR SEATS:{{$cars->car_seats}}<br>
                CAR BAGGAGE:{{$cars->car_baggage}}<br>
                GEAR TYPE:  @if($cars->car_gear=='M')
                            Manual
                            @elseif($cars->car_gear=='A')
                            Automatic
                            @endif 
                        <br>
                    {{-- {{$cars->car_price_per_km}} --}}
                @endif                 
            @endforeach  </center>           
        </table>
       </div>
   </div>

      
        
    @endsection