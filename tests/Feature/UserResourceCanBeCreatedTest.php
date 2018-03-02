<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserResourceCanBeCreatedTest extends TestCase
{
    
    use RefreshDatabase;

    /**
   	 * @test
   	*/
    function user_resource_can_be_created()
    {
    	
        $data = [
            'name' => 'John Doe',
            'email' => 'johndoe@email.com',
            'password' => 'password',
        ];

        $this->assertDatabaseMissing( 'users', [
            'name' => 'John Doe',
            'email' => 'johndoe@email.com',
            'password' => 'password',
        ]);

        // $this->assertEquals( 0, \App\User::count() );

        $res = $this->json('POST', 'users', $data );

        $res->assertStatus( Response::HTTP_CREATED )
            ->assertJson([
                'name' => 'John Doe',
                'email' => 'johndoe@email.com',
            ]);

        // $this->assertEquals( 1, \App\User::count() );
        $this->assertDatabaseHas( 'users', [
            'name' => 'John Doe',
            'email' => 'johndoe@email.com',
        ]);

        $user = \App\User::find(1);
        $this->assertNotEquals( 'password', $user->password );

    }

}