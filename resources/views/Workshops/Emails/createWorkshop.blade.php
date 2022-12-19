<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BPK Join Workshop</title>
    <style>
        body {
          font-family: 'Montserrat';
        }
        .card {
          padding: 10px;
          background-color: #EFEFEF;
        }
        .card .row {
          display: flex;
        }
        .card .col {
          flex: 50%;
          padding: 10px;
        }
        h4 {
          text-align: center;
          font-size: 14px;
          font-weight: bold;
        }
        p, li {
          font-size: 7px;
          font-weight: normal;
        }
        .title {
          margin: 0;
        }
        .card img {
          padding-top: 20px;
        }
        .card-body {
          padding: 10px;
          margin: 20px 15px;
          border-radius: 8px;
          color: #492075;
        }
        .card-body h4 {
          text-align: left;
          margin: 0;
          font-size: 8px;
        }
        .card-body .judul {
          margin: 0 0 10px 0;
        }
        .card-body .infos {
          margin: 10px 20px;
        }
        .card-body .icon {
          margin-right: 20px;
        }
        .icon img {
          padding-top: 0;
        }
        .attention p {
          padding-top: 6px;
          padding-bottom: 6px;
          text-align: center;
          font-weight: bold;
        }
        .card-body .info {
          line-height: 0.6;
          margin-top: 2px;
        }
        .card-body ul {
          padding-left: 14px;
          margin-top: 0;
        }
        .card-body img {
          height: 35px;
          width: auto;
        }
        .quote {
          display: block;
          margin-left: auto;
          margin-right: auto;
        }
        @media only screen and (min-width: 600px) {
          .card {
          padding: 10px;
          background-color: #EFEFEF;
          }
          .card .row {
            display: flex;
          }
          .card .col {
            flex: 50%;
            padding: 10px;
          }
          h4 {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
          }
          p, li {
            font-size: 10px;
            font-weight: normal;
          }
          .card-body h4 {
            text-align: left;
            margin: 0;
            font-size: 14px;
          }
          .card-body img {
            height: 40px;
            width: auto;
          }
          .icon img {
            padding-top: 10px;
          }
          .attention p {
            font-size: 14px;
          }
        }
    </style>
</head>
<body>
    <body>
        <div class="card">
          <h4 class="title" style="color: #492075;">FORUM WORKSHOP</h4>
          <img src="{{ asset('assets/emails/pemberitahuan.png') }}" style="max-width:100%; height: auto" />
          <div class="card-body" style="background-color: #FFFFFF">
            <div class="judul">
              <div class="row">
                <div class="col">
                  <h4>JUDUL WORKSHOP</h4>
                  <p>{{ $workshop->title }}</p>
                </div>
                <div class="col">
                  <h4>JADWAL WORKSHOP</h4>
                  <div class="info">
                    <p>Tanggal : {{ $workshop->date }}</p>
                    <p>Sesi    : {{ $workshop->Link->sesi == 1 ? '09.00 - 12.00' : '15.00 - 17.00'}}</p>
                    <p>Kreator : {{ $user['fullname'] }}</p>
                  </div>
                </div>
              </div>
            </div>
            <hr style="color: #515151; height: 0.2rem">
            <div class="infos">
              <div class="row">
                <div class="icon">
                  <img src="{{ asset('assets/emails/tickets.png') }}" alt="">
                </div>
                <div class="">
                  <h4>TIKET WORKSHOP</h4>
                  <div class="info">
                    <p>Jumlah Tiket : 1 (Satu)</p>
                    <p>Peranan      : Speaker / Pembicara</p>
                  </div>
                </div>
              </div>
            </div>
            <hr style="color: #515151; height: 0.2rem">
            <div class="infos">
              <div class="row">
                <div class="icon">
                  <img src="{{ asset('assets/emails/game.png') }}" alt="">
                </div>
                <div class="">
                  <h4>PERATURAN PEMBICARA</h4>
                  <div class="info" style="line-height: 1.2;">
                    <ul>
                      <li>Pembicara wajib bertanggung jawab atas workshop yang didaftarkan.</li>
                      <li>Pembicara wajib hadir 30 menit sebelum acara dimulai untuk persiapan.</li>
                      <li>Pembicara wajib memberikan materi secara baik dan benar.</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <hr style="color: #515151; height: 0.2rem">
            <div class="infos">
              <div class="attention" style="background-color: #c5c2c2;">
                <p style="color:#515151;">LINK ZOOM AKAN DIBAGIKAN H-1 ACARA</p>
              </div>
            </div>
            <div class="quote">
              <img src="{{ asset('assets/emails/TEXT NOTIF REGIST.jpg') }}" class="quote" alt="">
            </div>
          </div>
          <p style="text-align: center; color: gray;">@2022 BPK Corpo. All Right Reseved</p>
        </div>
    </body>

</body>
</html>