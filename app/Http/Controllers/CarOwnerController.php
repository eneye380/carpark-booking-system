<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkingLot;
use App\Space;
use Sentinel;

class CarOwnerController extends Controller
{
    public function index(){
        $parkingLots = ParkingLot::all();
        $bookings = Space::where('user_id', Sentinel::check()->id)->get();
        return view('carowner.index')->with(compact('parkingLots'))->with(compact('bookings'));
    }
}
