<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TravelModel extends Model
{
    use HasFactory;
    protected $table="travel_details";
    protected $fillable=[
        'travel_id',
        'user_id',
        'start_location',
        'end_location',
        'trip',
        'travel_date',
        'travel_time',
        'travel_distance',
    ];
    public static function createdFunction()
    {
        return TravelModel::where('user_id','=',Auth::user()->id)->orderByDesc('created_at')->first();
    }
}
