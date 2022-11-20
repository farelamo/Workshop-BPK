<html lang="en">
  <head>
    @include('Workshops.Emails.partials.head')
    
    <style>
        .card {
          padding: 50px;
          background-color: #EFEFEF;
        }
        .card h4 {
          font-weight: 700;
          text-align: center;
        }
        .card img {
          padding-top: 20px;
        }
        .card-body {
          padding: 50px;
          margin: 40px;
          border-radius: 8px;
          color: #492075;
        }
        .card-body h4 {
          font-weight: 700;
          text-align: left;
        }
        .card-body .icon {
          margin-top: 20px;
          margin-right: 15px;
        }
        .card-body .info {
          line-height: 0.6;
          margin-top: 20px;
        }
        .card-body img {
          height: 60px;
          width: auto;
        }
        @media (max-width: 425px) {
          .card {
            padding: 15px;
          }
          .card h4 {
            font-size: 14px;
          }
          .card img {
            padding-top: 5px;
          }
          .card-body {
            padding: 25px;
            margin: 10px;
          }
          .card-body h4 {
            font-size: 14px;
          }
          .card-body .icon {
            margin-top: 0px;
            margin-right: 7px;
          }
          .card-body .info {
            line-height: 0.2;
          }
          .card-body p, li {
            font-size: 11px;
          }
          .card-body img {
            margin-top: 10px;
            height: 45px;
            width: auto;
          }
          .card p {
            font-size: 10px;
          }

        }
      </style>
  </head>
  <body>
    <div class="card">
      <h4 class="title" style="color: #492075">FORUM WORKSHOP</h4>
      <img src="{{ asset('assets/emails/gambar.png') }}" style="max-width:100%; height: auto" />
      <div class="card-body" style="background-color: #FFFFFF">
        <div class="row">
          <div class="col">
            <h4>JUDUL WORKSHOP</h4>
            <p>Kmoe nanyaaaE</p>
          </div>
          <div class="col">
            <h4>JADWAL WORKSHOP</h4>
            <div class="info">
              <p>Tanggal :</p>
              <p>Sesi    :</p>
              <p>Kreator :</p>
            </div>
          </div>
        </div>
        <hr style="color: #515151; height: 0.2rem">
        <div class="m-4 d-flex flex-row">
          <div class="icon">
            <img src="{{ asset('assets/emails/tickets.png') }}" alt="">
          </div>
          <div class="ms-3">
            <h4>TIKET WORKSHOP</h4>
            <div class="info">
              <p>Jumlah Tiket :</p>
              <p>Peranan      :</p>
            </div>
          </div>
        </div>
        <hr style="color: #515151; height: 0.2rem">
        <div class="m-4 d-flex flex-row">
          <div class="icon">
            <img src="{{ asset('assets/emails/game.png') }}" alt="">
          </div>
          <div class="ms-3">
            <h4>PERATURAN PEMBICARA</h4>
            <div class="info" style="line-height: 1.2;">
              <ul>
                <li>lorem ipsum</li>
                <li>lorem ipsum</li>
                <li>lorem ipsum</li>
              </ul>
            </div>
          </div>
        </div>
        <hr style="color: #515151; height: 0.2rem">
        <div class="m-4 d-flex flex-row">
          <div class="icon">
            <img src="{{ asset('assets/emails/link.png') }}" alt="">
          </div>
          <div class="ms-3">
            <h4>LINK ZOOM WORKSHOP (PEMBICARA)</h4>
            <div class="info">
              <p>https://woe-join-sini-anjngg.zoom.com</p>
            </div>
          </div>
        </div>
      </div>
      <p style="text-align: center; color: gray;">@2022 BPK Corpo. All Right Reseved</p>
    </div>
  </body>
</html>
