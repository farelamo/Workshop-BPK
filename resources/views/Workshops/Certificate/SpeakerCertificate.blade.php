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
        p, h1, h2, h3, h4, h5{
            top: 320px;
            position: absolute;
            color: red;

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
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <img class="w-100 h-100" src="{{ asset('assets/certificate/background-sertif.png')}}" alt="bg-sertif">
                <div class="center-screen">
                    <p>Diberikan Kepada :</p>
                    <h1 class="mt-4">{{ Auth::user()->fullname }}</h1>
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
