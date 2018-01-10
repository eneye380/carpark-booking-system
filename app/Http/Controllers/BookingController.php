<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Space;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Space::all();
        return view('booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booking = Space::where('user_id', $request->user_id)
                    ->where('parking_lot_id',$request->parking_lot_id)->first();
        if($booking){
            //return response()->json(['redirect'=>"You have already made a booking."]);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $space = Space::find($id);
        Space::destroy($id);
        return redirect()->back()->with(['success'=>"Space $space->space_number unbooked successfully"]);
    }
}
