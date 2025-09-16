<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{

    public function index();
    public function store($data);

    public function update(User $user, $data);

    public function getByEmail($email);
}
