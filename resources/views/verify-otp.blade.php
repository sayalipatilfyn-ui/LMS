<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
</head>
<body>

<h2>Verify OTP</h2>

<form method="POST" action="{{ url('/verify-otp') }}">
    @csrf

    <input type="hidden" name="email" value="{{ session('email') }}">

    <input type="text" name="otp" placeholder="Enter OTP" required>

    @error('otp')
        <p style="color:red">{{ $message }}</p>
    @enderror

    <button type="submit">Verify OTP</button>
</form>

</body>
</html>
