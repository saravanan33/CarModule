<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationDetailsModel extends Model
{
    use HasFactory;
    protected $table='location_details';
    protected $fillable=['location_id',
                          'location_name',
                          'location_X_coordinate',
                          'location_Y_coordinate',
                          'location_image',
                          'created_by',
                          'updated_by'
                        ];
  public static function startId($input)
  {
    $start=LocationDetailsModel::select('location_id','location_X_coordinate','location_Y_coordinate')->where('location_name',$input)->get();
  //  print_r($start);exit;
    return $start;
  }
  public static function endId($input)
  {
    $end=LocationDetailsModel::select('location_id','location_X_coordinate','location_Y_coordinate')->where('location_name',$input)->get();
   return $end;
  }
}
