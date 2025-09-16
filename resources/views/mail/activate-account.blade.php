<x-mail::message>
# Account created

Please follow link bellow to activate your account

<x-mail::button :url="$url">
Activate Account
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
