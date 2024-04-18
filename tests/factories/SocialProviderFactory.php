<?php

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use SprintDigital\SprintPassport\Tests\User;

app(Factory::class)->define(\SprintDigital\SprintPassport\Models\SocialProvider::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'provider' => 'github',
        'provider_id' => 'fakeId',
    ];
});
