<?php

namespace App\Http\Controllers;

use App\Mail\SendingEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function bookingMail(Request $request){
        $input=$request->all();
       
        $data=array(
            'start'=>$input['start'],
            'end'=>$input['end'],
            'rotation_trip'=>$input['rotation_trip'],
            'date'=>$input['date'],
            'time'=>$input['time'],
        ); 
        // print_r($input['email']);exit;
        Mail::to($input['email'])->send(new SendingEmail($data));
        return back()->with('success','Mail Send Successfully');
        
    }
}
