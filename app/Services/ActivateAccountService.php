<?php

namespace App\Services;

use App\Repositories\PasswordResetRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ActivateAccountService
{
    public function __construct(private  PasswordResetRepositoryInterface $passwordResetRepository,
    private UserRepositoryInterface $userRepository){}
    public function handle($data){
        return DB::transaction(function () use ($data){
            $this->passwordResetRepository->deleteAllByEmail($data['email']);
            $user = $this->userRepository->getByEmail($data['email']);
            $user->update([
                'password'=>Hash::make($data['password'])
            ]);
            if (Auth::attempt([
                'email'=>$user->email,
                'password'=>$data['password']
            ])) {

                return true;
            }else{
                return false;
            }
        });
    }
}
