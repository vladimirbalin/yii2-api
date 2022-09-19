<?php

namespace app\resources;

use app\models\User;

class UserResource extends User
{
    public function fields()
    {
        return [
            'id',
            'email',
            'username',
            'phone',
            'password_hash',
            'access_token'
        ];
    }
}