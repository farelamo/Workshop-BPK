<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sertifikat - Preview</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        p,
        h1,
        h2,
        h3,
        h4,
        h5 {
            top: 320px;
            position: absolute;
            color: red;

        }
        h1 {
            font-size: 30px;
            margin-top: 20px;
        }

        .center-screen {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 100vh;
        }

        .nip {
            top: 395px;
            font-weight: bold
        }

        .participate {
            top: 420px;
        }

        .pembicara {
            top: 440px;
        }

        .title {
            top: 475px;
            font-weight: bold
        }

        .event {
            top: 510px;
        }

        .date {
            top: 535px;
        }

        .bpk {
            top: 565px;
        }

        .jabatan {
            top: 585px;
        }

        .name {
            top: 680px;
            font-weight: bold
        }

        .kepala {
            top: 700px;
            font-weight: bold
        }

        @media (min-width: 1440px) {

            p,
            h1,
            h2,
            h3,
            h4,
            h5,
            .nip {
                top: 350px;
                position: absolute;
                color: red;

            }

            h1 {
                font-size: 26px;
                margin-top: 20px;
            }

            .center-screen {
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                min-height: 100vh;
            }

            .nip {
                top: 425px;
                font-weight: bold
            }

            .participate {
                top: 450px;
            }

            .pembicara {
                top: 470px;
            }

            .title {
                top: 505px;
                font-weight: bold
            }

            .event {
                top: 540px;
            }

            .date {
                top: 570px;
            }

            .bpk {
                top: 600px;
            }

            .jabatan {
                top: 620px;
            }

            .name {
                top: 730px;
                font-weight: bold
            }

            .kepala {
                top: 750px;
                font-weight: bold
            }
        }

        @media (max-width: 1024px) {

            p,
            h1,
            h2,
            h3,
            h4,
            h5,
            .nip {
                top: 250px;
                position: absolute;
                color: red;
            }

            p {
                font-size: 12px
            }

            h1 {
                font-size: 23px;
                margin-top: 15px;
            }

            h3 {
                font-size: 22px;
            }

            h4 {
                font-size: 18px;
            }

            h5 {
                font-size: 15px;
            }

            .center-screen {
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                min-height: 100vh;
            }

            .nip {
                top: 305px;
                font-weight: bold
            }

            .participate {
                top: 325px;
            }

            .pembicara {
                top: 345px;
            }

            .title {
                top: 375px;
                font-weight: bold
            }

            .event {
                top: 400px;
            }

            .date {
                top: 420px;
            }

            .bpk {
                top: 445px;
            }

            .jabatan {
                top: 465px;
            }

            .name {
                top: 550px;
                font-weight: bold
            }

            .kepala {
                top: 570px;
                font-weight: bold
            }
        }

        @media (max-width: 768px) {

            p,
            h1,
            h2,
            h3,
            h4,
            h5 {
                top: 190px;
                position: absolute;
                color: red;
            }

            p {
                font-size: 10px
            }

            h1 {
                font-size: 17px;
                margin-top: 15px;
            }

            h3 {
                font-size: 14px;
            }

            h4 {
                font-size: 12px;
            }

            h5 {
                font-size: 11px;
            }

            .center-screen {
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                min-height: 100vh;
            }

            .nip {
                top: 235px;
                font-weight: bold
            }

            .participate {
                top: 250px;
            }

            .pembicara {
                top: 265px;
            }

            .title {
                top: 285px;
                font-weight: bold
            }

            .event {
                top: 305px;
            }

            .date {
                top: 320px;
            }

            .bpk {
                top: 335px;
            }

            .jabatan {
                top: 350px;
            }

            .name {
                top: 425px;
                font-weight: bold
            }

            .kepala {
                top: 440px;
                font-weight: bold
            }
        }

        @media (max-width: 425px) {

            p,
            h1,
            h2,
            h3,
            h4,
            h5 {
                top: 115px;
                position: absolute;
                color: red;
            }

            p {
                font-size: 5px
            }

            h1 {
                font-size: 7px;
                margin-top: 7px;
            }

            h3 {
                font-size: 7px;
            }

            h4 {
                font-size: 8px;
            }

            h5 {
                font-size: 6px;
            }

            .center-screen {
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                min-height: 100vh;
            }

            .nip {
                top: 140px;
                font-weight: bold
            }

            .participate {
                top: 150px;
            }

            .pembicara {
                top: 157px;
            }

            .title {
                top: 165px;
                font-weight: bold
            }

            .event {
                top: 175px;
            }

            .date {
                top: 185px;
            }

            .bpk {
                top: 195px;
            }

            .jabatan {
                top: 200px;
            }

            .name {
                top: 240px;
                font-weight: bold
            }

            .kepala {
                top: 245px;
                font-weight: bold
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <img class="w-100 h-100" src="{{ asset('assets/certificate/background-sertif.png') }}" alt="bg-sertif">
                <div class="center-screen">
                    <p>Diberikan Kepada :</p>
                    <h1>{{ Auth::user()->fullname }}</h1>
                    <p class="nip">NIP : {{ Auth::user()->NIP }}</p>
                    <p class="participate">Yang telah berpatisipasi sebagai</p>
                    <h3 class="pembicara">Pembicara</h3>
                    <h4 class="title">Workshop {{ $data->title }} dengan metode <i>Distance Learning</i></h4>
                    <p class="event">yang diselenggarakan di Jakarta pada tanggal {{ $data->date }}</p>
                    <h5 class="date">Jakarta, {{ \Carbon\Carbon::now()->format('d F Y') }}</h5>
                    <p class="bpk">BADAN PEMERIKSA KEUANGAN</p>
                    <p class="jabatan">Kepala Pusat Perencanaan dan Penyelenggaraan Diklat PKN</p>
                    <p class="name">Dali Mulkana S.E., M.Sc., Ak., CSFA</p>
                    <p class="kepala">NIP 196810101989031003</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
