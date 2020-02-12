<?php

namespace App\Http\Controllers;

// use App\Author;
use App\Services\TransactionService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\AuthorService;



class TransactionController extends Controller
{

    use ApiResponser;

    public $transactionService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    //

    public function index(){
        return $this->successResponse($this->transactionService->obtainTransactions());
    }

    public function store(Request $request){
        $request->request->add(['customer_id' => \Auth::user()->id]);
        return $this->successResponse($this->transactionService->createTransaction($request->all(), Response::HTTP_CREATED));
    }

//    public function show($author){
//        return $this->successResponse($this->transactionService->obtainAuthor($author));
//    }
//
//    public function update(Request $request, $author){
//        return $this->successResponse($this->transactionService->updateAuthor($request->all(), $author));
//    }
//
//    public function destroy($author){
//        return $this->successResponse($this->transactionService->deleteAuthor($author));
//    }
}
