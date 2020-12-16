<h3>Reset Your Password</h3>

<p>Hi,{{ $user->name }}</p>
<p>Forgot your password? No problem. <a href="{{ $link }}">Click here</a> to reset your password.</p>
<p>If you did not request a password reset, you can safely ignore this email and your current password will not change.To log back into your account <a href="{{ route('front.login') }}"> click here.</a></p>
<p>If you have any questions, please contact our customer service team at
    123-456-7897 or email us at customerservice@cvgig.com.
</p>
<p>Thanks,<br>
    The {{ config('app.name') }} team
</p>
