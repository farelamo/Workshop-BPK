<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Workshop Information</title>
</head>
<body>
    <h2>
        Mohon maaf acara workshop {{ $workshop->title }} yang diadakan oleh {{ $creator->fullname }} pada tanggal {{ $workshop->date }}
        dibatalkan karena tidak memenuhi syarat yaitu kurang dari 15 peserta
    </h2>
</body>
</html>