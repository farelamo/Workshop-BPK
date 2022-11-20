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
        p, h1, h3, h5{
            top: 39vh;
            position: absolute;
            color: red;
        }

        h1 {
            top: 42vh;
            right: 40%;
        }

        p {
            right: 45%;
        }

        .nip {
            top: 48vh;
            font-weight: bold
        }

        .participate {
            top: 52.5vh;
            right: 42%
        }

        .peserta {
            top: 50vh;
            right: 45%
        }

        .title {
            top: 58vh;
            right: 15%;
            font-weight: bold
        }

        .event {
            top: 62.5vh;
            right: 35%;
        }

        .date {
            top: 66vh;
            right: 40%;
        }

        .bpk {
            top: 71vh;
            right: 41%;
        }

        .jabatan {
            top: 73vh;
            right: 34%;
        }

        .name {
            top: 80vh;
            right: 41%;
            font-weight: bold
        }

        .kepala {
            top: 82vh;
            right: 43%;
            font-weight: bold
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <img class="position-relative justify-content-center w-100 h-100" src="{{ asset('assets/certificate/background-sertif.png')}}" alt="bg-sertif">
                <p class="pb-2">Diberikan Kepada :</p>
                <h1>{{ Auth::user()->fullname }}</h1>
                <p class="pt-3 nip">NIP : {{ Auth::user()->NIP }}</p>
                <p class="participate">Yang telah berpatisipasi sebagai</p>
                <h1 class="pt-5 peserta">Peserta</h1>
                <h3 class="title pt-4">Workshop {{ $data->title }} dengan metode <i>Distance Learning</i></h3>
                <p class="event pt-3">yang diselenggarakan di Jakarta pada tanggal {{ $data->date }}</p>
                <h5 class="date pt-3">Jakarta, {{ \Carbon\Carbon::now()->format('d F Y') }}</h5>
                <p class="bpk">BADAN PEMERIKSA KEUANGAN</p>
                <p class="jabatan">Kepala Pusat Perencanaan dan Penyelenggaraan Diklat PKN</p>
                <p class="name">Dali Mulkana S.E., M.Sc., Ak., CSFA</p>
                <p class="kepala">NIP 196810101989031003</p>
            </div>
        </div>        
    </div>
</body>
</html>