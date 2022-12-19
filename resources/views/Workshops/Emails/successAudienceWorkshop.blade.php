<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Workshop Information</title>
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
        }
      </style>
  </head>

  <body>
    <div class="card">
      <h4 class="title" style="color: #492075;">FORUM WORKSHOP</h4>
      <img src="{{ asset('assets/emails/peringatan.png') }}" style="max-width:100%; height: auto" />
      <div class="card-body" style="background-color: #FFFFFF">
        <div class="judl">
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
                  <p>Kreator : {{ $creator->fullname }}</p>
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
                <p>Jumlah Tiket : 1 (satu)</p>
                <p>Peranan      : Audience / Peserta</p>
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
              <h4>PERATURAN PESERTA</h4>
              <div class="info" style="line-height: 1.2;">
                <ul>
                  <li>Peserta wajib bertanggung jawab atas workshop yang didaftarkan.</li>
                  <li>Peserta wajib hadir 15 menit sebelum acara dimulai.</li>
                  <li>Peserta wajib mengikuti kegiatan hingga selesai.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <hr style="color: #515151; height: 0.2rem">
        <div class="infos">
          <div class="row">
            <div class="icon">
              <img src="{{ asset('assets/emails/link.png') }}" alt="">
            </div>
            <div class="">
              <h4>LINK ZOOM WORKSHOP (PESERTA)</h4>
              <div class="info">
                <a href="{{$workshop->Link->link}}">{{ $workshop->Link->link }}</a>
              </div>
            </div>
          </div>
        </div>
        <div class="quote">
          <img src="{{ asset('assets/emails/TEXT NOTIF H-1.jpg') }}" class="quote" alt="">
        </div>
      </div>
      <p style="text-align: center; color: gray;">@2022 BPK Corpo. All Right Reseved</p>
    </div>
  </body>
</html>
