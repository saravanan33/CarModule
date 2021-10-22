<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarDetailsModel;

class CarController extends Controller
{
    public function carDetails(){
        $cardetails=CarDetailsModel::orderByDesc('updated_at')->get();
        return view('car.cardetails',compact('cardetails'));
    }
    public function carCreate(){
        return view('car.carcreate');
    }
    public function carStore(Request $request){
        $requests=$request->all();
        // print_r($requests);exit;
        $request->validate([
            'car_name'=>'required|regex:/^[a-zA-Z]+$/u',
            'driver_id'=>'required|numeric',
            'car_number'=>'required',
            'car_gear'=>'required',
            'car_price_per_km'=>'required|numeric'
        ]);
        if ($request->hasFile('car_image'))
        {            
            $a=$request->file('car_image')->store('car');
            
            $object = new CarDetailsModel
            ([
                "car_name"         => $request->get('car_name'),
                "driver_id"        => $request->get('driver_id'),
                "car_number"       => $request->get('car_number'),
                "car_seats"        => $request->get('car_seats'),
                "car_baggage"      => $request->get('car_baggage'),
                "car_gear"         => $request->get('car_gear'),
                "car_price_per_km" => $request->get('car_price_per_km'),
                "car_image"        => $a,
                "status"           => 'A',
                "created_by"       => $request->get('created_by'),
                "updated_by"       => $request->get('updated_by'),
                "created_at"       => now(),
                "updated_at"       => now()
            ]);
            $object->save(); // Finally, save the record.
        }
        return back()->with('success','file uploaded successfully');

    }
    public function carDelete($id){
        $cardelete=CarDetailsModel::where('car_id',$id)->update([
            'status'=>'D'
        ]);
        // print_r($cardelete);exit;
        return back()->with('delete','file deleted successfully');
    }
    public function carUpdate($id){
        $carupdate=CarDetailsModel::where('car_id',$id)->first();
        // print_r($carupdate);exit;
        return view('car.carupdate',compact('carupdate'));
    }
    public function carUpdated(Request $request){
        $requests=$request->all();
        // print_r($requests);exit;
        $request->validate([
            'car_name'=>'required|regex:/^[a-zA-Z]+$/u',
            'driver_id'=>'required|numeric',
            'car_number'=>'required',
            'car_gear'=>'required',
            'car_price_per_km'=>'required|numeric'
        ]);
        if ($request->hasFile('car_image'))
        {            
            $a=$request->file('car_image')->store('car');
            
            $carupdated =CarDetailsModel::where('car_id',$request['car_id'])->update([
                "car_name"         => $request->get('car_name'),
                "driver_id"        => $request->get('driver_id'),
                "car_number"       => $request->get('car_number'),
                "car_seats"        => $request->get('car_seats'),
                "car_baggage"      => $request->get('car_baggage'),
                "car_gear"         => $request->get('car_gear'),
                "car_price_per_km" => $request->get('car_price_per_km'),
                "car_image"        => $a,
                "status"           => 'A',               
                "updated_by"       => $request->get('updated_by'),
                "created_at"       => now(),
                "updated_at"       => now()
            ]);
        }
        return back()->with('success','file uploaded successfully');
    }
}