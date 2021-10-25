<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;
    protected $table='booking_details';
    protected $fillable=[   'booking_id',
                            'user_id',
                            'travel_id',
                            'car_id',
                            'fare',
                            'status',
                            'created_at',
                            'updated_at'];
    public static function joinData($id){
       $join= BookingModel::select('*')
        ->where('booking_id',$id)
        ->join('users','booking_details.user_id','=','users.id')
        ->join('car_details','booking_details.car_id','=','car_details.car_id')
        ->join('travel_details','booking_details.travel_id','=','travel_details.travel_id')
        ->get(); 
        return $join;
    }
    public static function confirmBooking($id)
    {
        return self::where('user_id',$id)->orderByDesc('created_at')->first();
    }
    public static function bookingSuccess($id)
    {
        return self::where('booking_id',$id)->update(['status'=>'A']);
    }                           
}
