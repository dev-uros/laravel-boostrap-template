<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;

class UpdateUserService
{
    public function __construct(private UserRepositoryInterface $userRepository){}
    public function handle($user, $data){
        $this->userRepository->update($user, $data);
    }
}
