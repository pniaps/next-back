<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController
{
    public function __invoke()
    {
        return UserResource::collection(User::latest()->get());
    }
}
