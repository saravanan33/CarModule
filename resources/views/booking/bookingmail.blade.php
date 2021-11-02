<h2>hi user your booking details</h2>
<h3>your start point:{{$emails['start']}}</h3>
<h3>your destination point:{{$emails['end']}}</h3>
<h3>your trip type:@if($emails['rotation_trip']=='1')
                          one way
                          @elseif($emails['rotation_trip']=='2')
                            
                            Round trip
                        @endif
                    </h3>
<h3>your date:{{$emails['date']}}</h3>
<h3>your time{{$emails['time']}}</h3>
