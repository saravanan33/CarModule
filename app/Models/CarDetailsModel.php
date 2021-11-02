<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarDetailsModel extends Model
{
    use HasFactory;
    protected $table='car_details';
    protected $fillable=[
                            'car_id',
                            'driver_id',
                            'car_name',
                            'car_number',
                            'car_seats',
                            'car_baggage',
                            'car_gear',
                            'car_image',
                            'car_price_per_km',
                            'car_availability',
                            'created_by',
                            'updated_by',
                            'status',
                            'created_at',
                            'updated_at'
    ];
    public static function  availableCars()
    {
        $availableCars=CarDetailsModel::where('car_availability','=','A')->get();
        return $availableCars;

    }
    public static function carAvailability($id)
    {
        return CarDetailsModel::where('car_id',$id)->update(['car_availability'=>'B']);
    }
    public static function carDetailsFunction()
    {
        return self::orderByDesc('updated_at')->get();
    }
    public static function carDeleteFunction($id)
    {
        return self::where('car_id',$id)->update([
            'status'=>'D'
        ]);
    }
    public static function carUpdateFunction($id)
    {
        return self::where('car_id',$id)->first();
    }
    
}
