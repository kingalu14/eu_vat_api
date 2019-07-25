<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
   //create new user
	public function add(Request $request){
 
        $request['api_token'] = str_random(60);
        $request['password'] =  app('hash')->make($request['password']);
    	$user = User::create($request->all());
    	return response()->json($user);
 
	}
}
