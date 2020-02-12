<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use App\Services\RoomService;

class RoomController extends Controller
{
    use ApiResponser;

    public $roomService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    //

    public function index(){
        return $this->successResponse($this->roomService->obtainRooms());
    }

    public function store(Request $request){
        return $this->successResponse($this->roomService->createRoom($request->all(), Response::HTTP_CREATED));
    }

}
