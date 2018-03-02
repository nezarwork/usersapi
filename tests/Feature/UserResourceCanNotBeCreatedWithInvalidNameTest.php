<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserResourceCanNotBeCreatedWithInvalidNameTest extends TestCase
{
    
    use RefreshDatabase;

    /**
     * @test
    */
    public function user_resource_can_not_be_created_with_invalid_name()
    {
    	
    	$data = [
    		'name' => '',
    		'email' => 'jhondoe@email.com',
    		'password' => 'password',
    	];

    	$this->assertEquals( 0, \App\User::count() );
    	$res = $this->json('POST', 'users', $data);
    	$this->assertEquals( 0, \App\User::count() );

		$res->assertjson([
			'name' => [ 'This is very important field, please fill it up' ],
		]);    	
    	

    }

}
