<?php

namespace App\Repositories;

interface PasswordResetRepositoryInterface
{
    public function findLatestByEmail($email);

    public function deleteAllByEmail($email);

    public function store($email, $token);
}
