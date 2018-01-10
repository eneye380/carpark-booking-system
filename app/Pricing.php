<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $fillable = [
        "day","start_time","end_time","pricePerUnit","minutesPerUnit","minutesMinimumStay"
    ];
}
