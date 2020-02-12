<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Room;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;

class RoomController extends Controller
{
    //
    use ApiResponser;

    public function __construct()
    {
        //
    }

    public function index(){
        $rooms = Room::all();
        return $this->successResponse($rooms);
    }

    public function store(Request $request){
        $rules = [
            'name' => 'Required',
            'zone' => 'Required',
        ];

        $this->validate($request, $rules);
        $room = Room::create($request->all());
        return $this->successResponse($room, Response::HTTP_CREATED);
    }
}
