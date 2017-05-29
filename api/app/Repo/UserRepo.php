<?php

namespace App\Repo;

use App\Model\User;

class UserRepo extends Repo
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getByFacebookId($facebook_id)
    {
        return $this->model->where('facebook_id', $facebook_id)->first();
    }
}
