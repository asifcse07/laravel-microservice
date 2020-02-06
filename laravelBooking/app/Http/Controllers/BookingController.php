<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use App\Booking;

class BookingController extends Controller
{
    use ApiResponser;
    //

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //

    public function index(){
        $bookings = Booking::all();
        return $this->successResponse($bookings);
    }

    public function store(Request $request){
        $rules =[
            'customer_id' => 'required|min:1',
            'room_id' => 'required|min:1',
            'check_in' => 'required',
            'check_out' => 'required',
            'customer_address' => 'required',
        ];
        $this->validate($request, $rules);
        $booking = Booking::create($request->all());
        return $this->successResponse($booking, Response::HTTP_CREATED);
    }
}
