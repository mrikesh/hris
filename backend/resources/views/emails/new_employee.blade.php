<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Company!</title>
</head>
<body>
    <h1>Hello {{ $data['name'] }},</h1>
    <p>Welcome to our company! Your account has been created successfully.</p>
    <p>Your email: {{ $data['email'] }}</p>
    <p>Your temporary password is: <strong>{{ $data['password'] }}</strong></p>
    <p>Please log in and change your password as soon as possible.</p>
    <p>Best Regards,<br>Your Company Name</p>
</body>
</html>
