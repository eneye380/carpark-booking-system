<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pricing;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Pricing::all();
        return view('admin-pricing.index', compact('prices'));
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
        $pricing = Pricing::where('day', $request->day)
        ->where('start_time',$request->start_time)
        ->where('end_time',$request->end_time)->first();
        
        if($pricing){
             return redirect()->back()->with(['error'=>"Entry exist with same day, start and end time."]);
        }

        Pricing::create($request->all());
        //session(['property_id' => $request->managed_property_id]);
        return redirect()->back()->with(['success'=>"Entry added successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $price = Pricing::findOrFail($id);
        return view('admin-pricing.show', compact(['price']));
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
        $price = Pricing::findOrFail($id);
        $price->delete();
        return redirect()->back()->with(['success'=>'Deleted Succesfully']);
    }
}
