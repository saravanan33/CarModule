<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelModel extends Model
{
    use HasFactory;
    protected $table="travel_details";
    protected $fillable=[ 'travel_id',
                          'user_id',
                          'start_location',
                          'end_location',
                          'trip',
                          'travel_date',
                          'travel_time',
                          'travel_distance',
];
}
