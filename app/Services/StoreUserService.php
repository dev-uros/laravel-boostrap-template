<?php

namespace App\Services;

use App\Mail\ActivateAccountEmail;
use App\Repositories\PasswordResetRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreUserService
{
    public function __construct(private UserRepositoryInterface $userRepository,
    private PasswordResetRepositoryInterface $passwordResetRepository){}
    public function handle($data){

        DB::transaction(function () use ($data){

            $data['password'] = Hash::make(Str::random(64));
            $user = $this->userRepository->store($data);

            $newUserToken = Str::random(64);

            $this->passwordResetRepository->store($data['email'], $newUserToken);

            Mail::to($data['email'])->send(new ActivateAccountEmail($user, $newUserToken));
        });
    }
}
