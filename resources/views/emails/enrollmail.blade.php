<!DOCTYPE html>
<html>
<head>
    <title>Mailtrap Test</title>
</head>
<body>
    <h2>Hello {{ $data['name'] }}</h2>
    <p>{{ $data['message'] }}</p>

    <p>Regards,<br>{{ config('app.name') }}</p>
</body>
</html>
