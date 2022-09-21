<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    @include('sweetalert::alert')
    <h1>Login</h1>
    <form action="/login" method="post">
        @csrf
        
        <input type="text" name="NIP">
        <input type="text" name="fullname">
        <button type="submit">Send</button>
    </form>
</body>
</html>