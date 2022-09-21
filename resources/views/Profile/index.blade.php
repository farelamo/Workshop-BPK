<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    @include('sweetalert::alert')
    <form action="/profile" method="post">
        @csrf
        @method('PUT')
        
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $user['email'] }}">
        </div>
        <div>
            <label for="unit">Unit Kerja</label>
            <input type="text" name="unit" value="{{ $user['unit'] }}">
        </div>
        <button type="submit" >Update</button>
    </form>
</body>
</html>