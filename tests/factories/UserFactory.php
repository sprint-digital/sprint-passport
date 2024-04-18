<?php

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Hash;
use SprintDigital\SprintPassport\Tests\User;

app(Factory::class)->define(User::class, function (Faker $faker) {
    static $password;

    if (! $password) {
        $password = Hash::make('123456789qq');
    }

    return [
        'name'     => 'Sprint Digital',
        'email'    => 'sprint@digital.com',
        'password' => $password,
    ];
});
