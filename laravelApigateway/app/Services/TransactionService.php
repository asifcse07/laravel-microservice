<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

Class TransactionService{

	use ConsumesExternalService;

	public $baseUri;
	public $secret;

	public function __construct(){
		$this->baseUri = config('services.transaction.base_uri');
		$this->secret = config('services.transaction.secret');
	}




	public function obtainTransactions(){
		return $this->performRequest('GET', '/api/v1/transactions');
	}

	public function createTransaction($data){
		return $this->performRequest('POST', '/api/v1/store', $data);
	}

//	public function obtainBook($book){
//		return $this->performRequest('GET', "/books/{$book}");
//	}
//
//
//	public function updateBook($data, $book){
//		return $this->performRequest('PUT', "/books/{$book}", $data);
//	}
//
//	public function deleteBook($book){
//		return $this->performRequest('DELETE', "/books/{$book}");
//	}
//
//	public function searchBookbyAuthor($data){
//		return $this->performRequest('POST', '/books', $data);
//	}
}
