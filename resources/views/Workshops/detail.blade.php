@extends('index')

@section('head')
  <style>
    .error {
      color: red
    }
  </style>
@endsection

@section('body')
    @include('partials.preloader')

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="col-lg-12">

                @include('partials.filter')

                <div class="listworkshop p-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="{{ Storage::url('public/images/' . $workshop->image) }}" class="rounded">
                            <p class="mt-2">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.5 4V9.5L6.5 13.5" stroke="#5D5D5D" stroke-width="2" />
                                    <circle cx="8.5" cy="8.5" r="7.5" stroke="#5D5D5D"
                                        stroke-width="2" />
                                </svg>
                                @if ($workshop->Link->sesi == 1)
                                    <span>09.00 - 12.00</span>
                                @else
                                    <span>13.00 - 15.00</span>
                                @endif
                            </p>
                            <p>
                                <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="1" y="1" width="15" height="13" stroke="#5D5D5D"
                                        stroke-width="2" />
                                    <path d="M7.25 11V4.82L8.26 5.78H6.05V4H9.61V11H7.25Z" fill="#5D5D5D" />
                                </svg>
                                <span>{{ $workshop->date }}</span>
                            </p>

                            @if (Auth::user())
                                @if ($creator->email == Auth::user()->email)
                                <div class="d-flex">
                                    <p class="py-2">Kelola workshop</p>
                                    <div class="p-2" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#editWorkshop">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.5 7.5L5.92819 14.0718C5.71566 14.2843 5.60939 14.3906 5.53953 14.5212C5.46966 14.6517 5.44019 14.7991 5.38124 15.0938L4.64709 18.7646C4.58057 19.0972 4.5473 19.2635 4.64191 19.3581C4.73652 19.4527 4.90283 19.4194 5.23544 19.3529L8.90621 18.6188C9.20093 18.5598 9.3483 18.5303 9.47885 18.4605C9.60939 18.3906 9.71566 18.2843 9.92819 18.0718L16.5 11.5L12.5 7.5Z"
                                                fill="#2A4157" fill-opacity="0.24" />
                                            <path
                                                d="M5.95396 19.38L5.95397 19.38L5.9801 19.3734L5.98012 19.3734L8.60809 18.7164C8.62428 18.7124 8.64043 18.7084 8.65654 18.7044C8.87531 18.65 9.08562 18.5978 9.27707 18.4894C9.46852 18.381 9.62153 18.2275 9.7807 18.0679C9.79242 18.0561 9.80418 18.0444 9.81598 18.0325L17.0101 10.8385L17.0101 10.8385L17.0369 10.8117C17.3472 10.5014 17.6215 10.2272 17.8128 9.97638C18.0202 9.70457 18.1858 9.39104 18.1858 9C18.1858 8.60896 18.0202 8.29543 17.8128 8.02361C17.6215 7.77285 17.3472 7.49863 17.0369 7.18835L17.01 7.16152L16.8385 6.98995L16.8117 6.96314C16.5014 6.6528 16.2272 6.37853 15.9764 6.1872C15.7046 5.97981 15.391 5.81421 15 5.81421C14.609 5.81421 14.2954 5.97981 14.0236 6.1872C13.7729 6.37853 13.4986 6.65278 13.1884 6.96311L13.1615 6.98995L5.96745 14.184C5.95565 14.1958 5.94386 14.2076 5.93211 14.2193C5.77249 14.3785 5.61904 14.5315 5.51064 14.7229C5.40225 14.9144 5.34999 15.1247 5.29562 15.3435C5.29162 15.3596 5.28761 15.3757 5.28356 15.3919L4.62003 18.046C4.61762 18.0557 4.61518 18.0654 4.61272 18.0752C4.57411 18.2293 4.53044 18.4035 4.51593 18.5518C4.49978 18.7169 4.50127 19.0162 4.74255 19.2574C4.98383 19.4987 5.28307 19.5002 5.44819 19.4841C5.59646 19.4696 5.77072 19.4259 5.92479 19.3873C5.9346 19.3848 5.94433 19.3824 5.95396 19.38Z"
                                                stroke="#33363F" stroke-width="1.2" />
                                            <path d="M12.5 7.5L16.5 11.5" stroke="#33363F" stroke-width="1.2" />
                                        </svg>
                                    </div>
                                </div>
                                @endif
                            @endif

                            <p><span>Kreator Workshop</span></p>
                            <p>{{ $creator->fullname }}</p>
                            <p><span>Topik</span></p>
                            <p>{{ $workshop->topic_id }}</p>
                            <p><span>Jumlah Peserta</span></p>
                            <p>{{ $workshop->total_audience }} Peserta</p>
                            <div class="upper mt-1">
                                <button>
                                  <a id="modal_trigger" style="color:rgba(139, 75, 196, 1)" href="#audience" onclick="document.getElementById('audience').style.display='none'">
                                    Lihat List Peserta
                                  </a>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-8 ps-4 pe-5">
                            <h4>{{ $workshop->title }}</h4>
                            <p><span>Deskripsi Workshop</span></p>
                            <p>{{ $workshop->description }}</p>
                            <hr>
                            <p><span>Tujuan Workshop</span></p>
                            <p>{{ $workshop->destination }}</p>
                            <div class="d-flex flex-row-reverse mt-3">
                                <form action="/workshop/{{ $workshop->id }}/join" method="post" style="background-color: transparent; border: 0">
                                    @csrf @method('put')
                                    <button class="btn-primary" id="modal_trigger" style="width:300px;">Daftar</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

  <div class="popupContainerLarge" id="audience" style="display:none;">
      <div class="row popupHeaderlarge">
        <div class="col">
          <h5>Nama Peserta Terdaftar</h5>
        </div>
        <div class="col">
          <h5>NIP</h5>
        </div>
        <div class="col">
          <h5>Satuan Kerja</h5>
        </div>
      </div>
      <section class="popupBodyLarge">
        @foreach ($audiences as $audience)
          <div class="row">
            <div class="col">
              <p class="fw-normal">{{ $audience->fullname }}</p>
            </div>
            <div class="col">
              <p class="fw-normal">{{ $audience->new_NIP }}</p>
            </div>
            <div class="col">
              <p class="fw-normal">{{ $audience->unit }}</p>
            </div>
            <hr class="my-1">
          </div>
        @endforeach
        <div class="d-flex justify-content-center" style="background-color: white">
          {!! $audiences->links() !!}
        </div>
      </section>
  </div>

  <div class="modal fade" id="editWorkshop" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content p-4">
            <div class="popupHeaderReg">
              <span class="header_title">EDIT WORKSHOP</span>
              <hr>
            </div>
            <form method="post" id="formEditWorkshop">
              @csrf
              @method('PUT')

              <div class="modal-body popupBody" style="color: black">
                Judul
                <input class="mb-2" type="text" value="{{ old('title') ?? $workshop->title }}" name="title">
                @error('title')
                    <div class="error">*{{ $message }}</div>
                @enderror
                Deskripsi
                <textarea class="mb-2" id="" cols="30" rows="10" style="resize: none; height: 5%" name="description">{{ old('description') ?? $workshop->description }}</textarea>
                @error('description')
                    <div class="error">*{{ $message }}</div>
                @enderror
                Tujuan
                <textarea class="mb-2" id="" cols="30" rows="10" style="resize: none; height: 5%" name="destination">{{ old('destination') ?? $workshop->destination }}</textarea>
                @error('destination')
                    <div class="error">*{{ $message }}</div>
                @enderror
                <hr>
                <button class="btn-primary" type="submit">Selesaikan Aksi</button>
                <p class="pt-2" style="text-align: center; color: rgb(153, 151, 151); font-weight: 300;">*pastikan aksi yang anda lakukan baik dan benar</p>
              </div>
            </form>
          </div>
      </div>
  </div>

  <div id="modal" class="popupContainerReg p-3" style="display:none;">
      <div class="popupHeaderReg">
        <span class="header_title">Form Registrasi</span>
        <br>
        <span class="header_title">Kegiatan Workshop</span>
      </div>

      <section class="popupBodyReg">
        <hr>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            <p>Mengikuti workshop secara penuh, profesional, taat aturan, dan beretika.</p>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            <p>Berkontribusi dengan baik tanpa ada hambatan sedikitpun.</p>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            <p>Memberikan feedback yang baik terhadap penyelenggara maupun pembicara.</p>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            <p>Tidak meninggalkan kegiatan workshop selama kegiatan berlangsung.</p>
          </label>
        </div>
        <hr>
        <button class="btn-primary" type="submit">Konfirmasi</button>
        <p class="pt-2" style="text-align: center; color: rgb(153, 151, 151); font-weight: 300;">*pastikan aksi yang anda lakukan baik dan benar</p>
      </section>
    </div>

@endsection

@section('scripts')
@if (count($errors) > 0)
  <script type="text/javascript">
      $( document ).ready(function() {
          $('#editWorkshop').modal('show');
          document.getElementById('formEditWorkshop').action = `/workshop/${<?= $workshop->id ?>}`;
       });
  </script>
@endif
@endsection
