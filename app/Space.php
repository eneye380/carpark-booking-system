<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    protected $fillable = [
        "parking_lot_id","pricing_id","user_id","space_number","plate_number","status","effective_date", "expiry_date",
    ];
}
