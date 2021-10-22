<?php

namespace App\Http\Controllers;

use App\Mail\BookingMail;
use App\Models\TravelModel;
use App\Models\BookingModel;
use Illuminate\Http\Request;
use App\Models\CarDetailsModel;
use Illuminate\Support\Facades\DB;
use App\Models\LocationDetailsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function bookingData(Request $request)
    {
        $input=$request->all();
        // print_r($input);exit;
        $request->validate([
            // 'rotation_trip'=>'required',
            'start'=>'required|regex:/^[a-zA-Z]+$/u',
            'end'=>'required|regex:/^[a-zA-Z]+$/u',
            'date'=>'required',
            'time'=>'required',
        ]);
        $roundTrip=$input['rotation_trip'];
        $date=$input['date'];
        $time=$input['time'];
        $userId=$input['user_id'];
        $startLocation=$input['start'];
        $endLocation=$input['end'];
        $start=LocationDetailsModel:: select('location_id','location_X_coordinate','location_Y_coordinate','location_name')->where('location_name',$input['start'])->first(); 
        $end=LocationDetailsModel::select('location_id','location_X_coordinate','location_Y_coordinate','location_name')->where('location_name',$input['end'])->first();
        $distance=sqrt(pow(($end['location_X_coordinate']-$start['location_X_coordinate']),2)+pow(($end['location_Y_coordinate']-$start['location_Y_coordinate']),2));
        $totalDistance=intval($distance*$roundTrip);
        $values=array('trip'=>$roundTrip,
                        'date'=>$date,
                        'time'=>$time,
                        'distance'=>$totalDistance,
                        // 'startLocationId'=>$start['location_id'],
                        'startLocationName'=>$start['location_name'],
                        // 'endLocationId'=>$end['location_id'],
                        'endLocationName'=>$end['location_name']
                    );
        $travel=new TravelModel(['user_id'=>$userId,
                                 'start_location'=>$startLocation,
                                 'end_location'=>$endLocation,
                                 'trip'=>$roundTrip,
                                 'travel_date'=> $date,
                                 'travel_time'=>$time,
                                 'travel_distance'=>$totalDistance
                                ]);
                                $travel->save();        
        return view('booking.bookingconfirm',compact('values'));

    }
    public function availableCars(){
        $carsAvailable=CarDetailsModel::where('car_availability','=','A')->get();
        $car=$carsAvailable;

        // print_r($car);
        // exit;
        return view('booking.bookingselectcar',compact('car'));
    }
    public function selectedCar($id,$price){
        $carStatusChange=CarDetailsModel::where('car_id',$id)->update(['car_availability'=>'B']);
        $travelId=TravelModel::where('user_id','=',Auth::user()->id)->orderByDesc('created_at')->first();
        $traveledId=$travelId->travel_id;
        $travelPrice=$travelId->travel_distance*$price;
        // print_r($travelDistance);exit;
        $bookingStore=new BookingModel([
                                        'user_id'=>Auth::user()->id,
                                        'travel_id'=>$traveledId,
                                        'car_id'=>$id,
                                        'fare'=>$travelPrice,
        ]);
        $bookingStore->save(); 
        $data=array('distance'=>$travelId->travel_distance,'fare'=>$travelPrice);
        return view('booking.bookingsummary',compact('data'));
    }
    public function checkOutPage($id){
        // print_r('hi');exit;
        $confirm=BookingModel::where('user_id',$id)->orderByDesc('created_at')->first();
        $travelId=$confirm->booking_id;
        // print_r($travelId);exit;
        $tableJoin=BookingModel::select('*')
        ->where('booking_id',$travelId)
        ->join('users','booking_details.user_id','=','users.id')
        ->join('car_details','booking_details.car_id','=','car_details.car_id')
        ->join('travel_details','booking_details.travel_id','=','travel_details.travel_id')
        ->get();
        return view('booking.bookingdetail',compact('tableJoin'));
    }
    public function bookingConfirm($id){
        // print_r($id);exit;
        $bookingConfirmed=BookingModel::where('booking_id',$id)->update(['status'=>'A']);
        if($bookingConfirmed){
            $tableJoin=BookingModel::select('*')
        ->where('booking_id',$id)
        ->join('users','booking_details.user_id','=','users.id')
        ->join('car_details','booking_details.car_id','=','car_details.car_id')
        ->join('travel_details','booking_details.travel_id','=','travel_details.travel_id')
        ->get()
        ->toArray(); 
        $data=array(); 
        foreach ($tableJoin as $table) {
           foreach ($table as $key=>$values) {
               $data[$key]=$values;

              
           }
        }  
        // print_r($data);exit;
        // $data=array(
        //                 'name'=>$tableJoin['0']['name'],
        //                 'email'=>$tableJoin['0']['email'],
        //                 'car_name'=>$tableJoin['0']['car_name'],
        //                 'car_number'=>$tableJoin['0']['car_number'],
        //                 'fare'=>$tableJoin['0']['fare'],
        //                 'start_location'=>$tableJoin['0']['start_location'],
        //                 'start_location'=>$tableJoin['0']['end_location'],
        //                 'distance'=>$tableJoin['0']['travel_distance'],
        //                 'date'=>$tableJoin['0']['travel_date'],
        //                 'time'=>$tableJoin['0']['travel_time'],
        // );
        // print_r($data);exit;
        Mail::to($data['email'])->send(new BookingMail($data));
        return view('booking.bookingsuccess')->with('success','mail send to your MailId');
        }
      
    }
}