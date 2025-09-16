<?php

namespace App\Services;

use App\Mail\ActivateAccountEmail;
use App\Mail\ResetPasswordEmail;
use App\Repositories\PasswordResetRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class GenerateResetPasswordEmailService
{
    public function __construct(private UserRepositoryInterface $userRepository,
    private PasswordResetRepositoryInterface $passwordResetRepository){}
    public function handle($data){
        DB::transaction(function () use ($data){
            $user = $this->userRepository->getByEmail($data['email']);

            $newUserToken = Str::random(64);

            $this->passwordResetRepository->store($data['email'], $newUserToken);

            Mail::to($data['email'])->send(new ResetPasswordEmail($user, $newUserToken));
        });
    }
}
