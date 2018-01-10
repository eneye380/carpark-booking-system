<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkingLot;
use DB;

class ParkingLotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parkingLots = ParkingLot::all();
        return view('admin-parking.index', compact(['parkingLots']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-parking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parkingLot = ParkingLot::where('name', $request->name)->first();
        
        if($parkingLot){
             return redirect()->back()->with(['error'=>"Parking Lot with name $request->name already exist."]);
        }

        ParkingLot::create($request->all());
        //session(['property_id' => $request->managed_property_id]);
        return redirect()->back()->with(['success'=>"$request->name added successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parking = ParkingLot::findOrFail($id);
        $spaces = range(1, $parking->capacity, 1);

        $booked = DB::table('spaces')
                ->where('parking_lot_id',$id)
                ->orderBy('space_number', 'asc')
                ->get();

        //$booked = range(10, 13);
        return view('admin-parking.show')->with(compact('parking'))->with(compact('spaces'))->with(compact('booked'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parking = ParkingLot::findOrFail($id);
        return view('admin-parking.edit', compact(['parking']));
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
        
        $parking = ParkingLot::findOrFail($id);
        $parking->update($request->all());
        return redirect()->back()->with(['update'=>'Updated Succesfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parking = ParkingLot::findOrFail($id);
        $parking->delete();
        return redirect()->back()->with(['success'=>'Deleted Succesfully']);
    }
}
