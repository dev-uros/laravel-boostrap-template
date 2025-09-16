<?php

namespace App\Repositories;

use App\Models\PasswordReset;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordResetRepository implements PasswordResetRepositoryInterface
{
    public function findLatestByEmail($email)
    {
        return DB::table('password_reset_tokens')->where('email',$email)->orderBy('created_at','desc')->first();
    }

    public function deleteAllByEmail($email)
    {
        DB::table('password_reset_tokens')->where('email', $email)->delete();
    }

    public function store($email, $token)
    {
        $this->deleteAllByEmail($email);
        DB::table('password_reset_tokens')->insert([
            'email' => $email,
            'token' => Hash::make($token),
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
    }
}
