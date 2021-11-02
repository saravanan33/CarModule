<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DriverDetailsModel;

class DriverController extends Controller
{
    public function driverDetails(){
        $driverdetails=DriverDetailsModel::driverDetailsFunction();
        return view('driver.driverdetails',compact('driverdetails'));
    }
    public function driverCreate(){
        return view('driver.drivercreate');
    }
    public function driverStore(Request $request){
        $requests=$request->all();
        $request->validate([
            'driver_name'=>'required|regex:/^[a-zA-Z]+$/u',
            'driver_mobile'=>'required|numeric',
            'driver_address'=>'required'
        ]);
        if ($request->hasFile('driver_image'))
        {            
            $a=$request->file('driver_image')->store('driver');
            
            $object = new DriverDetailsModel
            ([
                "driver_name"         => $request->get('driver_name'),
                "driver_mobile"       => $request->get('driver_mobile'),
                "driver_address"      => $request->get('driver_address'),
                "driver_image"        => $a,
                "status"              => 'A',
                'created_by'             =>  $request->get('created_by'),
                'updated_by'             =>  $request->get('updated_by'),
                "created_at"          => now(),
                "updated_at"          => now()
            ]);
            $object->save(); 
        }
        return back()->with('success','file uploaded successfully');
    }
    public function driverUpdate($id){
        $driverupdate=DriverDetailsModel::driverUpdateFunction($id);
        return view('driver.driverupdate',compact('driverupdate'));
    }
    public function driverDelete($id){
        $deriverdelete=DriverDetailsModel::driverDeleteFunction($id);
        return back()->with('delete','file deleted successfully');
    }
    public function driverUpdated(Request $request){
        $requests=$request->all();
        $request->validate([
            'driver_name'=>'required|regex:/^[a-zA-Z]+$/u',
            'driver_mobile'=>'required|numeric',
            'driver_address'=>'required'
        ]);
        if ($request->hasFile('driver_image')){  
            $a=$request->file('driver_image')->store('driver');
            $driverupdated=DriverDetailsModel::where('driver_id',$request['driver_id'])->update([
                'driver_name'            =>  $request->get('driver_name'),
                'driver_mobile'          =>  $request->get('driver_mobile'),
                'driver_address'         =>  $request->get('driver_address'),
                'driver_image'           =>  $a,
                'updated_by'             =>  $request->get('updated_by'),
                'created_at'             =>  now(),
                'updated_at'             =>  now()
            ]);
            return back()->with('success','file updateded successfully');        
        }
    }
    
}
