<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkingLot extends Model
{
    protected $fillable = [
        "name","address","capacity"
    ];
}
