<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to HearthKeeper</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Welcome to HearthKeeper</h1>
        <p>A family centered app for life.</p>
        <div class="button-container">
            <a href="{{ route('login') }}" class="btn">Login</a>
            <a href="{{ route('register') }}" class="btn">Register</a>
        </div>
    </div>
</body>
</html>
