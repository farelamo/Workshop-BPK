@extends('index')

@section('head')
    <style>
        .error {
            color:rgba(139, 75, 196, 1)
        }
    </style>
@endsection

@section('body')
    @include('partials.preloader')

    <div class="main-banner" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="col-lg-12">
                <h2>Laporan sebagai Peserta</h2>
                <div class="upper my-3">
                    <button class="me-1">Judul Workshop</button>
                    <button class="me-1">Jadwal Workshop</button>
                    <div class="search">
                        <input type="address" name="address" class="align-self-end" placeholder="Search" autocomplete="on"
                            required>
                    </div>
                </div>
                <div class="tabel first-service">
                    <div class="row head">
                        <div class="col">
                            <p>Judul</p>
                        </div>
                        <div class="col">
                            <p>Jadwal Workshop</p>
                        </div>
                        <div class="col">
                            <p>Evaluasi</p>
                        </div>
                        <div class="col">
                            <p>Sertifikat</p>
                        </div>
                    </div>

                    @foreach ($evaluations as $evaluation)
                        <hr class="my-2">
                        <div class="row field">
                            <div class="col judul">
                                <p>{{ $evaluation->title }}</p>
                            </div>
                            <div class="col tanggal">
                                <p>{{ $evaluation->date }}</p>
                            </div>

                            @if (
                                    !$evaluation->pivot->received && !$evaluation->pivot->speaker_suggestion &&
                                    !$evaluation->pivot->event_suggestion && !$evaluation->pivot->note
                                )
                                <div class="col evaluasi">
                                    <a style="color:rgba(139, 75, 196, 1)" href="#" data-bs-toggle="modal"
                                        data-bs-target="#audience" onclick='audience("{{ $evaluation->id }}")'>
                                        <button>
                                            evaluasi disini
                                        </button>
                                    </a>
                                </div>
                                <div class="col sertif">
                                    <svg width="45" height="45" viewBox="0 0 45 45" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.875 28.1243L28.125 16.8743" stroke="#FF6359" stroke-width="2" />
                                        <path d="M28.125 28.125L16.875 16.875" stroke="#FF6359" stroke-width="2" />
                                    </svg>
                                </div>
                            @else
                                <div class="col evaluasi">
                                    <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 6.5L6.625 12.125L16 0.875" stroke="#8B4BC4" stroke-width="2" />
                                    </svg>
                                </div>
                                <div class="col sertif">
                                    <div class="green mb-1">
                                        <button>Download</button>
                                    </div>
                                    <div>
                                        <button>Lihat</button>
                                    </div>
                                </div>
                            @endif

                        </div>
                    @endforeach

                    <hr>
                    <div class="d-flex justify-content-center" style="background-color: white">
                        {!! $evaluations->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="audience" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header popupHeader text-center">
                    <h5 class="modal-title header_title w-100" id="exampleModalLabel">FORM EVALUASI PESERTA</h5>
                </div>

                <div class="modal-body popupBody">
                    <form class="forms-sample" method="post" id="formAudience" enctype="multipart/form-data">
                        @csrf

                        <div class="mt-2">
                            <p>Pembaharuan yang diperoleh</p>
                            <textarea type="text" name="received" required>{{ old('received') }}</textarea>
                            @error('received')
                                <div class="error">*{{ $message }}</div>
                            @enderror

                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                                <p>Penilaian</p>
                            </div>
                        </div>
                        <div class="">
                            <p>Saran perbaikan untuk pembicara</p>
                            <textarea type="text" name="speaker_suggestion" required>{{ old('speaker_suggestion') }}</textarea>
                            @error('speaker_suggestion')
                                <div class="error">*{{ $message }}</div>
                            @enderror

                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                                <p>Penilaian</p>
                            </div>
                        </div>
                        <div class="">
                            <p>Saran perbaikan untuk acara</p>
                            <textarea type="text" name="event_suggestion" required>{{ old('event_suggestion') }}</textarea>
                            @error('event_suggestion')
                                <div class="error">*{{ $message }}</div>
                            @enderror

                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                                <p>Penilaian</p>
                            </div>
                        </div>
                        <div>
                            <p>Upload catatan anda (Dalam bentuk PDF)</p>
                            <input type="file" name="note" required>
                            @error('note')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="modal-footer mt-3">
                            <button type="submit">Konfirmasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if (count($errors) > 0)
        <script type="text/javascript">
            $( document ).ready(function() {
                $('#audience').modal('show');
            });
        </script>
    @endif

    <script>
        function audience(id) {
            document.getElementById('formAudience').action = `/workshop/${id}/audience`;
        }
    </script>
@endsection