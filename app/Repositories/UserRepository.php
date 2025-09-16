<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{

    public function index()
    {
        return User::query()
            ->orderBy('id')
            ->get();
    }

    public function store($data)
    {
        return User::create($data);
    }

    public function update(User $user, $data)
    {
        $user->update($data);
    }


    public function getByEmail($email)
    {
        return User::query()->where('email', $email)->first();
    }
}
