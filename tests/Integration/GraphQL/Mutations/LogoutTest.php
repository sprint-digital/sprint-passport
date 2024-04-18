<?php

namespace SprintDigital\SprintPassport\Tests\Integration\GraphQL\Mutations;

use Illuminate\Support\Facades\Event;
use SprintDigital\SprintPassport\Events\UserLoggedOut;
use SprintDigital\SprintPassport\Tests\TestCase;
use SprintDigital\SprintPassport\Tests\User;

class LogoutTest extends TestCase
{
    public function test_it_invalidates_token_on_logout()
    {
        Event::fake([UserLoggedOut::class]);

        $user = factory(User::class)->create();
        $this->createClientPersonal($user);
        $token = $user->createToken('test Token');
        $token = $token->accessToken;
        $response = $this->postGraphQL([
            'query' => 'mutation {
                logout {
                    status
                    message
                }
            }',
        ], [
            'Authorization' => 'Bearer '.$token,
        ]);
        $responseBody = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('logout', $responseBody['data']);
        $this->assertArrayHasKey('status', $responseBody['data']['logout']);
        $this->assertArrayHasKey('message', $responseBody['data']['logout']);
        Event::assertDispatched(UserLoggedOut::class, function (UserLoggedOut $event) use ($user) {
            return $user->id === $event->user->id;
        });
    }
}
