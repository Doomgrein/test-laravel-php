<?php

namespace App\Services;

use App\User;

class UserService
{
    public function create(array $fields)
    {
        $user = new User;
        $user->fill($fields);
        $user->save();
        return $user;
    }
}