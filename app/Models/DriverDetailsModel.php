<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverDetailsModel extends Model
{
    use HasFactory;
    protected $table='driver_details';
    protected $fillable=['driver_id',
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
}
