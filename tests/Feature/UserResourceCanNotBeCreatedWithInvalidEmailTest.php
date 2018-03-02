<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserResourceCanNotBeCreatedWithInvalidEmailTest extends TestCase
{
    
    use RefreshDatabase;

    /**
     * @test
    */
    public function user_resource_can_not_be_created_with_invalid_email()
    {
    	
    	$data = [
    		'name' => 'jhon doe',
    		'email' => 'jhondoeemail.com',
    		'password' => 'password',
    	];

    	$this->assertEquals( 0, \App\User::count() );
    	$res = $this->json('POST', 'users', $data);
    	$this->assertEquals( 0, \App\User::count() );

		$res->assertjson([
			'email' => [ 'The email field is very important, please fill it up' ],
		]);    	
    }

    /**
     * @test
    */
    public function user_resource_can_not_be_created_with_empty_email()
    {
    	
    	$data = [
    		'name' => 'jhon doe',
    		'email' => '',
    		'password' => 'password',
    	];

    	$this->assertEquals( 0, \App\User::count() );
    	$res = $this->json('POST', 'users', $data);
    	$this->assertEquals( 0, \App\User::count() );

		$res->assertjson([
			'email' => [ 'The email field is very important, please fill it up' ],
		]);    	
    }

}
