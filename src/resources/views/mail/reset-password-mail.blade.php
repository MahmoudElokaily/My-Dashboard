<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>
<body>
<h1>Password Reset Request</h1>
<p>Hello,</p>
<p>We received a request to reset your password. You can reset your password by clicking the link below:</p>
<a href="{{ route('dashboard.reset-password', $token) }}">Reset Your Password</a>

<p><strong>Note:</strong> This password reset link will expire in 10 minutes. If you did not request a password reset, please ignore this email.</p>

<p>If you did not request a password reset, please ignore this email.</p>
<p>Thank you!</p>
</body>
</html>
