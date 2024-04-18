<?php

namespace Sprintdigital\SprintPassport\Tests;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Sprintdigital\SprintPassport\HasLoggedInTokens;
use Sprintdigital\SprintPassport\MustVerifyEmailGraphQL;
use Laravel\Passport\HasApiTokens;

class UserVerifyEmail extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use Notifiable;
    use MustVerifyEmailGraphQL;
    use HasLoggedInTokens;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
