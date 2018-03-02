<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use App\UserDto;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreUserRequest;

class UsersController extends Controller
{
    
    public function create(StoreUserRequest $req)
    {


	    	// $user = User::create( $req->all() );

    	try {
    		
	    	
    		$name = $req->get('name');
    		$email = $req->get('email');
    		$password = $req->get('password');

	    	$user = User::newOfMe( $name, $email, $password );
	    	// $user = User::newOfMe( new UserDto( $req ) );
	    	return new JsonResponse( $user->toArray(), Response::HTTP_CREATED);

    	} catch (Exception $e) {
    		
    	}

    }

}
