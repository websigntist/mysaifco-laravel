<h1>Password Reset Link</h1>

<p>Now you can reset your password through below link.</p>

{{--<p><a href="{{ route('reset-password', ['token' => $token]) }}">Reset Password</a></p>--}}

<p>You requested a password reset. Click the link below to reset your password:</p>
<a href="{{ url('/reset-password?token=' . $token) }}">Reset Password</a>
<p>If you did not request this, please ignore this email.</p>
