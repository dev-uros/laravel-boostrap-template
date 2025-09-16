<?php

namespace App\Rules;

use App\Models\PasswordReset;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ValidateActivateAccountToken implements ValidationRule
{

    public function __construct(public $email)
    {
    }

    /**
     * Run the validation rule.
     *
     * @param \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $activateAccount = DB::table('password_reset_tokens')->where('email', $this->email)->orderBy('created_at', 'desc')->first();

        if ($activateAccount) {
            if (Hash::check($value, $activateAccount->token)) {

            } else {
                $fail('Request invalid');
            }
        } else {
            $fail('Request invalid');
        }
    }
}
