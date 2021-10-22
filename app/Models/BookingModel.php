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
}
