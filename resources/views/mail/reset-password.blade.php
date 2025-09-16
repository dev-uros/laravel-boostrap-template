<x-mail::message>
# Password reset request

Please follow link bellow to reset your password

<x-mail::button :url="$url">
Reset Password
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
