<?php

namespace Sprintdigital\SprintPassport\Models;

use Illuminate\Database\Eloquent\Model;
use Sprintdigital\SprintPassport\Contracts\AuthModelFactory;

class SocialProvider extends Model
{
    protected $fillable = [
        'user_id',
        'provider',
        'provider_id',
    ];

    public function user()
    {
        return $this->belongsTo($this->getAuthModelFactory()->getClass());
    }

    protected function getAuthModelFactory(): AuthModelFactory
    {
        return app(AuthModelFactory::class);
    }
}
