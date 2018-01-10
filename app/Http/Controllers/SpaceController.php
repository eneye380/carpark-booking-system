<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Space;
use App\ParkingLot;
use DB;

class SpaceController extends Controller
{
    public function book(Request $request){
        $booking = Space::where('user_id', $request->user_id)
                    ->where('parking_lot_id',$request->parking_lot_id)->first();
        if($booking){
            return response()->json(['redirect'=>"You have already made a booking."]);
        }
        $booking = Space::where('plate_number', $request->plate_number)
                    ->where('parking_lot_id',$request->parking_lot_id)->first();
        if($booking){
            return response()->json(['redirect'=>"Booking exist for vehicle with Plate Number: $request->plate_number"]);
        }
        $booking = Space::where('space_number', $request->space_number)
                    ->where('parking_lot_id',$request->parking_lot_id)->first();
        if($booking){
            return response()->json(['redirect'=>"Space $request->space_number already taken."]);
        }

        $book = Space::create($request->all());
        return response()->json(['redirect'=>"true",'booking'=>$book]);
    }

    public function display($id)
    {
        $parking = ParkingLot::findOrFail($id);
        $spaces = range(1, $parking->capacity, 1);

        $booked = DB::table('spaces')
                ->where('parking_lot_id',$id)
                ->orderBy('space_number', 'asc')
                ->get();

        //$booked = range(10, 13);
        return view('carowner.parkings')->with(compact('parking'))->with(compact('spaces'))->with(compact('booked'));
    }

    public function ticket($id){
        $space = Space::find($id);
        $parking = ParkingLot::find($space->parking_lot_id);
        return view('carowner.booking')->with(compact('space'))->with(compact('parking'));
    }
}
