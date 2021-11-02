<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocationDetailsModel;
// use Symfony\Component\Console\Input\Input;

class LocationController extends Controller
{
    public function locationDetails()
    {
        $locationdetails=LocationDetailsModel::locationDetailsFunction();
        return view('location.locationdetails',compact('locationdetails')); 
    }

    public function locationCreate()
    {
        return view('location.locationcreate');  
    }
     
    public function locationStore(Request $request)
    {
        $requests=$request->all();   

        $request->validate([
            'location_name'=>'required|regex:/^[a-zA-Z]+$/u',
            'location_X_coordinate'=>'required|numeric',
            'location_Y_coordinate'=>'required|numeric'
        ]);
        if ($request->hasFile('location_image'))
        {            
            $a=$request->file('location_image')->store('location');

            $object = new LocationDetailsModel
            ([
                "location_name"         => $request->get('location_name'),
                "location_X_coordinate" => $request->get('location_X_coordinate'),
                "location_Y_coordinate" => $request->get('location_Y_coordinate'),
                "location_image"        => $a,
                'created_by'             =>  $request->get('created_by'),
                'updated_by'             =>  $request->get('updated_by'),
                "created_at" => now(),
                "updated_at" => now()
            ]);
            $object->save();
        }
        return back()->with('success','file uploaded successfully');
    }
    public function locationUpdate($id)
    {
    
        $locationupdate=LocationDetailsModel::locationUpdateFunction($id);
        return view('location.locationupdate',compact('locationupdate'));
        
    }
    public function locationUpdated(Request $request)
    { 
        $requests=$request->all();
    
        $request->validate([
            'location_name'=>'required|regex:/^[a-zA-Z]+$/u',
            'location_X_coordinate'=>'required|numeric',
            'location_Y_coordinate'=>'required|numeric'
        ]);
        if ($request->hasFile('location_image'))
        {  
            $a=$request->file('location_image')->store('location');
            $locationupdated=LocationDetailsModel::where('location_id',$request['location_id'])->update([
                'location_name'          =>  $request->get('location_name'),
                'location_X_coordinate'  =>  $request->get('location_X_coordinate'),
                'location_Y_coordinate'  =>  $request->get('location_Y_coordinate'),
                'location_image'         =>  $a,
                'updated_by'             =>  $request->get('updated_by'),
                'created_at'             =>  now(),
                'updated_at'             =>  now()
            ]);
        
            return back()->with('success','file updateded successfully');        
        }
    }
    public function locationDelete($id)
    {
        
        $delete=LocationDetailsModel::locationDeleteFunction($id);
        return back()->with('delete','file deleted successfully');
    }
    public function bookingStart(Request $request)
    {
        $query = $request->get('query');
        $filter = LocationDetailsModel::bookingSearch($query);
        $filterResult=array();
        foreach($filter as $fill)
        {
            $filterResult[]=$fill->location_name;
        }
        return response()->json($filterResult);
    }
}