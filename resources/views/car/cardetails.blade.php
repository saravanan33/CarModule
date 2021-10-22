{{-- 
{{dd($cardetails)}}
{{exit}} --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>car details</title>
    <link rel="stylesheet" href='{{asset("../css/crudtable.css")}}'>
</head><center>
    <body class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (Session::has('delete'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('delete')}}
                      </div>                        
                    @endif
                    <div class="card-header">{{ __('Car Details') }}</div>  
                        <div class="card-body"><a href="/carcreate" class="btn btn-success">+ add new car</a>
                            <a href="/back" id="logbtn" class="btn btn-info btn-lg">back</a>
                            <table>
                                <tr>
                                    <th>car id</th>
                                    <th>car name</th>
                                    <th>car number</th>
                                    <th>car seats</th>
                                    <th>car baggage</th>
                                    <th>car gear</th>
                                    <th>car image</th>
                                    <th>car price pre km</th>
                                    <th>car availability</th>
                                    <th>Action</th>                                   
                                </tr>                                                    
                               @foreach ($cardetails as $details)
                               @if ($details->status=='A') 
                               <tr>
                                   <td>{{$details->car_id}}</td>
                                   <td>{{$details->car_name}}</td>
                                   <td>{{$details->car_number}}</td>
                                   <td>{{$details->car_seats}}</td>
                                   <td>{{$details->car_baggage}}</td>
                                   <td>{{$details->car_gear}}</td>
                                   <td><img src="http://localhost/laravel/CarModule/storage/app/{{$details->car_image}}" alt="{{$details->car_name}}" width="100px"/></td>
                                   <td>{{$details->car_price_per_km}}</td>
                                   <td>
                                       @if ($details->car_availability=='A')
                                       <div class="active">available</div>                                           
                                       @elseif($details->car_availability=='B')
                                       <div class="active">booked</div>                                             
                                       @endif
                                   </td>
                                   <td><center><a href="carupdate/{{$details->car_id}}" class="btn btn-info">edit</a>
                                   <a onclick="return myFunction()" href="cardelete/{{$details->car_id}}" class="btn btn-danger">delete</a></center></td>
                                </tr> 
                               @endif
                               @endforeach                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body></center>
</html>
<script type="text/javascript" src="{{asset('../js/alert.js')}}"></script>