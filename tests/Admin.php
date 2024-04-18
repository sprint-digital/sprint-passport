<?php

namespace SprintDigital\SprintPassport\Tests;

class Admin extends User
{
    protected $table = 'users';

    public function findForPassport($username)
    {
        return self::query()
            ->where('name', $username)
            ->first();
    }
}
