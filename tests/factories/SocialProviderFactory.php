<?php

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Sprintdigital\SprintPassport\Tests\User;

app(Factory::class)->define(\Sprintdigital\SprintPassport\Models\SocialProvider::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'provider' => 'github',
        'provider_id' => 'fakeId',
    ];
});
