<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.booking');
    }
    public function bookingtable(Booking $booking)
    {
        $data=$booking->get();
        return view('layouts.bookingdata')->with(['bookingdata'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Booking $booking)
    {
        //dd($request);
        $request->validate([
            'username'=>'required',
            'booking_date'=>'required|date',
            'day_type'=>'required',
        ]);
        if($request->day_type=="half_day")
        {
            $request->validate([
                'slot'=>'required',
            ]);
            $booking->slot=$request->slot;
        }
        $existingdate = $booking->where('booking_date',"=", $request->booking_date)->value('id');
        if ($existingdate) {
            $existingdata=$booking->find($existingdate);
            //dd($existingdate);
            $data=$existingdata->day_type;
            
            if ($data == 'full_day') {
                //dd($request);
                return view('layouts.booking')->with('alertBox', true);
            }
            if ($data == 'half_day' && $existingdata->slot== $request->slot) {
            
                return view('layouts.booking')->with('alertBox2', true);
            }
        }
        
        $booking->username=$request->username;
        $booking->booking_date=$request->booking_date;
        $booking->day_type=$request->day_type;
         //dd($booking);
        $booking->save();
        return redirect('booking');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
