<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationDetailsModel extends Model
{
    use HasFactory;
    protected $table='location_details';
    protected $fillable=[
      'location_id',
      'location_name',
      'location_X_coordinate',
      'location_Y_coordinate',
      'location_image',
      'created_by',
      'updated_by'
    ];
  public static function searchId($input)
  {
    return LocationDetailsModel::select('location_id','location_X_coordinate','location_Y_coordinate','location_name')->where('location_name',$input)->get()->toArray();
  }
  public static function locationDetailsFunction()
  {
    return self::orderByDesc('updated_at')->get();
  }
  public static function locationUpdateFunction($id)
  {
    return self::where('location_id','=',$id)->first();
  }
  public static function locationDeleteFunction($id)
  {
    return self::where('location_id',$id)->update([
      'status'=>'D'
    ]);
  }
  public static function bookingSearch($query)
  {
    return self::where('location_name', 'LIKE', "%".$query."%")->get();
  }

}
