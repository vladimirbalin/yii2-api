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
            'access_token'
        ];
    }
}