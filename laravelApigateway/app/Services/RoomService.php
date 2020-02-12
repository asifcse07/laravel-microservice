<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

Class RoomService{

	use ConsumesExternalService;

	public $baseUri;
	public $secret;

	public function __construct(){
		$this->baseUri = config('services.room.base_uri');
		$this->secret = config('services.room.secret');
	}

	public function obtainRooms(){
		return $this->performRequest('GET', '/api/v1/rooms');
	}

	public function createRoom($data){
		return $this->performRequest('POST', '/api/v1/store', $data);
	}

//	public function obtainBookings($author){
//		return $this->performRequest('GET', "/authors/{$author}");
//	}
//
//
//	public function updateBookings($data, $author){
//		return $this->performRequest('PUT', "/authors/{$author}", $data);
//	}
//
//	public function deleteBookings($author){
//		return $this->performRequest('DELETE', "/authors/{$author}");
//	}
}
