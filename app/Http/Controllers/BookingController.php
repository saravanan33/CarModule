<?php
namespace App\Http\Controllers;

use App\Mail\BookingMail;
use App\Models\TravelModel;
use App\Models\BookingModel;
use Illuminate\Http\Request;
use App\Models\CarDetailsModel;
use App\Models\LocationDetailsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class BookingController extends Controller{
    public function bookingData(Request $request){
        $input=$request->all();
        // dd($input);
        $request->validate([
            'start'=>'required|regex:/^[a-zA-Z]+$/u',
            'end'=>'required|regex:/^[a-zA-Z]+$/u',
            'rotation_trip'=>'required',
            'date'=>'required',
            'time'=>'required',
        ]);
        // if($request->validate()){
        //     dd($request);
        // }
        $roundTrip=$input['rotation_trip'];
        $date=$input['date'];
        $time=$input['time'];
        $userId=$input['user_id'];
        $startLocation=$input['start'];
        $endLocation=$input['end'];
        if($startLocation==$endLocation){
            return back()->with('fail','start and end location is should not be same');
        }
        $start=LocationDetailsModel::searchId($input['start']); 
        if(count($start)==0){
            return back()->with('fail','start location is not on the list');
        }
        $end=LocationDetailsModel::searchId($input['end']);
        if(count($end)==0){
            return back()->with('fail','end location is not on the list');
        }
        $startArray=array();
        foreach($start as $starts){
            foreach($starts as $key=>$values){
                $startArray[$key]=$values;
            }
        }
        $endArray=array();
        foreach($end as $starts){
            foreach($starts as $key=>$values){   
                $endArray[$key]=$values;
            }
        }
        $distance=sqrt(pow(($endArray['location_X_coordinate']-$startArray['location_X_coordinate']),2)+pow(($endArray['location_Y_coordinate']-$startArray['location_Y_coordinate']),2));
        $totalDistance=intval($distance*$roundTrip);
        $values=array(  'trip'=>$roundTrip,
                        'date'=>$date,
                        'time'=>$time,
                        'distance'=>$totalDistance,
                        'startLocationName'=>$startArray['location_name'],                 
                        'endLocationName'=>$endArray['location_name']
                    );
        $travel=new TravelModel([
            'user_id'=>$userId,
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
        $carsAvailable=CarDetailsModel::availableCars();
        $car=$carsAvailable;    
        return view('booking.bookingselectcar',compact('car'));
    }
    public function selectedCar($id,$price){
        $carStatusChange=CarDetailsModel::carAvailability($id);
        $travelId=TravelModel::createdFunction();
        $traveledId=$travelId->travel_id;
        $travelPrice=$travelId->travel_distance*$price;
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
        $confirm=BookingModel::confirmBooking($id);
        $travelId=$confirm->booking_id;
        $tableJoin=BookingModel::joinData($travelId);
        return view('booking.bookingdetail',compact('tableJoin'));
    }
    public function bookingConfirm($id){
        $bookingConfirmed=BookingModel::bookingSuccess($id);
        if($bookingConfirmed){
            $tableJoin=BookingModel::joinData($id);
            $tableArr=$tableJoin->toArray();
        // print_r($tableJoin);exit;
            foreach ($tableArr as $table) {
           foreach ($table as $key=>$values) {
               $data[$key]=$values;  
           }
        }  
        Mail::to($data['email'])->send(new BookingMail($data));
        return view('booking.bookingsuccess')->with('success','mail send to your MailId');
        }
    }
    public function mainPage(){
        if(Auth::user()->is_admin=="1"){
            return view('admin.adminpage');
        }
        else{
            return view('user.userlogin');
        }
    }
}