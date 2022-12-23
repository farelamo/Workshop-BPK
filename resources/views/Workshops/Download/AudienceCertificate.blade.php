<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sertifikat - Preview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        p,
        h1,
        h3,
        h6 {
            top: 280px;
            position: absolute;
            color: red;
            /* text-rendering: geometricPrecision; */
        }
        p, h1 {
            left: 50%;
            transform: -translateX(-50%);
        }

        .center-screen {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 100vh;
        }

        .nip {
            top: 345px;
            /* left: 400px; */
            font-weight: bold;
            left: 50%;
            transform: -translateX(-50%);
        }

        .participate {
            top: 370px;
            left: 50%;
            transform: -translateX(-50%);
        }

        .pembicara {
            top: 390px;
            left: 50%;
            transform: -translateX(-50%);
        }

        .title {
            top: 440px;
            font-weight: bold;
            left: 50%;
            transform: -translateX(-50%);
        }

        .event {
            top: 480px;
            left: 50%;
            transform: -translateX(-50%);
        }

        .date {
            top: 500px;
            left: 50%;
            transform: -translateX(-50%);
        }

        .bpk {
            top: 520px;
            left: 50%;
            transform: -translateX(-50%);
        }

        .jabatan {
            top: 540px;
            left: 50%;
            transform: -translateX(-50%);
        }

        .name {
            top: 635px;
            font-weight: bold;
            left: 50%;
            transform: -translateX(-50%);
        }

        .kepala {
            top: 655px;
            font-weight: bold;
            left: 50%;
            transform: -translateX(-50%);
        }
    </style>
</head>

<body>
    <img class="w-100 h-100" src="{{ $background }}" alt="bg-sertif">
    <div class="center-screen">
        <p>Diberikan Kepada :</p>
        <h1 class="mt-4">{{ Auth::user()->fullname }}</h1>
        <p class="nip">NIP : {{ Auth::user()->NIP }}</p>
        <p class="participate">Yang telah berpatisipasi sebagai</p>
        <h1 class="pembicara">Peserta</h1>
        <h3 class="title">Workshop {{ $data->title }} dengan metode <i>Distance Learning</i></h3>
        <p class="event">yang diselenggarakan di Jakarta pada tanggal {{ $data->date }}</p>
        <h6 class="date">Jakarta, {{ \Carbon\Carbon::now()->format('d F Y') }}</h6>
        <p class="bpk">BADAN PEMERIKSA KEUANGAN</p>
        <p class="jabatan">Kepala Pusat Perencanaan dan Penyelenggaraan Diklat PKN</p>
        <p class="name">Dali Mulkana S.E., M.Sc., Ak., CSFA</p>
        <p class="kepala">NIP 196810101989031003</p>
    </div>
</body>

</html>
