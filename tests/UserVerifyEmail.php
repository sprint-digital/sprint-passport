<?php

namespace SprintDigital\SprintPassport\Tests;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use SprintDigital\SprintPassport\HasLoggedInTokens;
use SprintDigital\SprintPassport\MustVerifyEmailGraphQL;
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
