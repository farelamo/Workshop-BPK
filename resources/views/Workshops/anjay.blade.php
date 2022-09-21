<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Workshop</title>
</head>
<body>
    Total Visited =====> {{ $workshop->total_visited }}<br>
    Topic         =====> {{ $workshop->topic->name }}<br>
    Link          =====> {{ $workshop->link->link }}<br>

    <form action="/workshop/{{$workshop->id}}/join" method="POST">
        @csrf
        @method('PUT')

        <button>Join Workshop</button>
    </form>
    @include('sweetalert::alert')
</body>
</html>