<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use App\Transaction;

class TransactionController extends Controller
{
    //
    use ApiResponser;

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
        $transactions = Transaction::all();
        return $this->successResponse($transactions);
    }

    public function store(Request $request){
        $rules =[
            'customer_id' => 'required|min:1',
            'booking_id' => 'required|min:1',
            'transaction_no' => 'required',
            'price' => 'required',
        ];
        $this->validate($request, $rules);
        $transactions = Transaction::create($request->all());
        return $this->successResponse($transactions, Response::HTTP_CREATED);
    }
}
