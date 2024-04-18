<?php

namespace SprintDigital\SprintPassport\Events;

use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Class UserRefreshedToken.
 */
class UserRefreshedToken
{
    /**
     * @var Authenticatable
     */
    public $user;

    /**
     * UserRefreshedToken constructor.
     *
     * @param  Authenticatable  $user
     */
    public function __construct(Authenticatable $user)
    {
        $this->user = $user;
    }
}
