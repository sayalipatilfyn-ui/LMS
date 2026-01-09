<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>

<h2>Reset Password</h2>

<form method="POST" action="{{ url('/reset-password') }}">
    @csrf

    <!-- Email coming from OTP verification -->
    <input type="hidden" name="email" value="{{ session('email') }}">

    <input type="password" name="password" placeholder="New Password" required>

    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

    @error('password')
        <p style="color:red">{{ $message }}</p>
    @enderror

    <button type="submit">Update Password</button>
</form>

</body>
</html>
