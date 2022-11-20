<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BPK Join Workshop</title>
</head>
<body>
    <h1>Hello, {{ $user['fullname'] }}</h1>
    <h2>Terima kasih telah mendaftar workshop {{ $workshop->title }}</h2><br>
    <h2>Jangan lupa untuk mengecek email ini kembali pada H-1 sebelum workshop dimulai pada tanggal {{ $workshop->date }}</h2>
</body>
</html>
