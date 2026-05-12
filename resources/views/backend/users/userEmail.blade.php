<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<body>
    <h2>Password Reset Request</h2>
    <p>Hello,</p>
    <p>You requested to reset your password. Click the link below to reset it:</p>

    <p>
        <a href="{{ route('reset-password', ['token' => $token]) }}">
            Reset Password
        </a>
    </p>

    <p>If you did not request a password reset, no further action is required.</p>

    <p>Thanks,<br>Your Application Team</p>
</body>
</html>
