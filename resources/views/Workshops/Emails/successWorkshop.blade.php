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
        Jangan lupa untuk menghadiri acara workshop {{ $workshop->title }} yang diadakan oleh {{ $creator->fullname }} besok
        berikut link zoom yang akan digunakan pada acara tersebut, 
        {{ $workshop->Link->link }}
    </h2>
</body>
</html>