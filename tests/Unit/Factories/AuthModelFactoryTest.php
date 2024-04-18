<?php

namespace SprintDigital\SprintPassport\Tests\Unit\Factories;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use SprintDigital\SprintPassport\Contracts\AuthModelFactory;
use SprintDigital\SprintPassport\Tests\TestCase;
use SprintDigital\SprintPassport\Tests\User;

class AuthModelFactoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var AuthModelFactory
     */
    private $factory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->factory = $this->app->make(AuthModelFactory::class);
    }

    /**
     * @test
     */
    public function canMakeAuthModel(): void
    {
        $email = 'sprint@digital.com';
        $model = $this->factory->make(['email' => $email]);

        self::assertInstanceOf(User::class, $model);
        self::assertEquals($email, $model->email);
    }

    /**
     * @test
     */
    public function canCreateAuthModel(): void
    {
        $model = $this->factory->create([
            'name'     => 'Sprint Digital',
            'email'    => 'sprint@digital.com',
            'password' => Hash::make('123456789qq'),
        ]);

        self::assertInstanceOf(User::class, $model);
        self::assertEquals($model->count(), 1);
    }

    /**
     * @test
     */
    public function canGetAuthModelClass(): void
    {
        self::assertEquals($this->factory->getClass(), User::class);
    }
}
