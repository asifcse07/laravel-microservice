<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use App\Services\BookingService;
use App\Services\TransactionService;

class BookingController extends Controller
{
    use ApiResponser;

    public $bookingService;
    public $transactionService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookingService $bookingService, TransactionService $transactionService)
    {
        $this->bookingService = $bookingService;
        $this->transactionService = $transactionService;
    }

    //

    public function index(){
        return $this->successResponse($this->bookingService->obtainBookings());
    }

    public function store(Request $request){
        $request->request->add(['customer_id' => \Auth::user()->id]);
        return $this->successResponse($this->bookingService->createBooking($request->all(), Response::HTTP_CREATED));
    }

//    public function show($book){
//        return $this->successResponse($this->bookService->obtainBook($book));
//    }
//
//    public function update(Request $request, $book){
//        return $this->successResponse($this->bookService->updateBook($request->all(), $book));
//    }
//
//    public function destroy($book){
//        return $this->successResponse($this->bookService->deleteBook($book));
//    }
//
//
//    public function searchByAuthor(Request $request){
//        return $this->successResponse($this->bookService->searchBookbyAuthor($request->all(), Response::HTTP_CREATED));
//    }
}
