<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use Hash;

class UserController extends Controller 
{
	
	/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(Request $request) {
        $user = User::where('username', $request->username)->select('username', 'password as pass', 'id as uuid')->first();
		//return response($user, 200);
		
    	if ($user) {
	        if (Hash::check($request->password, $user->pass)) {
	            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
				
	            $response = array('token' => $token);
	            return response($response, 200);
	        } else {
	            $response = "Password missmatch";
	            return response($response, 422);
	        }
    	} else {
        	$response = 'User does not exist';
        	return response($response, 422);
    	}
    }
	
	public function logout (Request $request) {
    	$token = $request->user()->token();
    	$token->revoke();
    	$response = 'You have been succesfully logged out!';

    	return response($response, 200);
	}
}