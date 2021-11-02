<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverDetailsModel extends Model
{
    use HasFactory;
    protected $table='driver_details';
    protected $fillable=[
      'driver_id',
      'driver_name',
      'driver_mobile',
      'driver_address',
      'driver_image',
      'driver_availablility',
      'created_by',
      'updated_by',
      'status',
      'created_at',
      'updated_at'
    ];

    public static function driverDetailsFunction()
    {
      return self::orderByDesc('updated_at')->get();
    }
    public static function driverUpdateFunction($id)
    {
      return self::where('driver_id',$id)->first();
    }
    public static function driverDeleteFunction($id)
    {
      return self::where('driver_id',$id)->update([
        'status'=>'D'
      ]);
    }
}
