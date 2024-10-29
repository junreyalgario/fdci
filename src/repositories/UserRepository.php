<?php

namespace Fdci\Repositories;

use Fdci\Models\UserModel;

class UserRepository
{
    protected $userModel;

    public function __construct(UserModel $user)
    {
        $this->userModel = $user;
    }
}