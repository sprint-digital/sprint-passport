<?php

namespace SprintDigital\SprintPassport\Tests;

use Laravel\Passport\Passport;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(realpath(__DIR__.'/../tests/migrations'));
        if (method_exists(Passport::class, 'routes')) {
            Passport::routes();
        }
        Passport::loadKeysFrom(__DIR__.'/storage/');
        config()->set('lighthouse.route.middleware', [
            \Nuwave\Lighthouse\Http\Middleware\AcceptJson::class,
            \SprintDigital\SprintPassport\Http\Middleware\AuthenticateWithApiGuard::class,
        ]);
    }
}
