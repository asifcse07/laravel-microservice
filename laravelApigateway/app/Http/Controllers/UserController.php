<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class UserController extends Controller
{
    //
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


    function create(Request $request)
    {
        /**
         * Get a validator for an incoming registration request.
         *
         * @param  array  $request
         * @return \Illuminate\Contracts\Validation\Validator
         */
        $valid = validator($request->only('email', 'name', 'password','user_type', 'auth_token'), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'user_type' => 'required',
            'auth_token' => 'required'
        ]);

        if ($valid->fails()) {
            $jsonError=response()->json($valid->errors()->all(), 400);
            return \Response::json($jsonError);
        }

//        $user = User::create($request->all());
        $data = request()->only('email','name','password','user_type', 'auth_token');
//print_r($data); die();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'user_type' => $data['user_type'],
            'auth_token' => $data['auth_token'],
        ]);
        $access_token = $user->createToken('authToken')->accessToken;
        $dataR['user'] = $user;
        $dataR['access_token'] = $access_token;
        return $this->successResponse($dataR, Response::HTTP_CREATED);
    }


    public function login(Request $request){
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($loginData)){
            return $this->errorResponse('invalid Credentials', 422);
        }
        $access_token = auth()->user()->createToken('authToken')->accessToken;
        $dataR['user'] = auth()->user();
        $dataR['access_token'] = $access_token;
        return $this->successResponse($dataR, Response::HTTP_CREATED);
    }
}
