<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function newOfMe( $name, $email, $password )
    // public static function newOfMe( $userDto )
    {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);
        // $user->name = $userDto->getName();
        // $user->email = $userDto->getEmail();
        // $user->password = bcrypt( $userDto->getPassword() );
        $user->save();
        return $user;
    }
}
