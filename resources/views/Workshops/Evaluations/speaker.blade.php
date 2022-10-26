@extends('index')

@section('head')
    <style>
        .error {
            color: rgba(139, 75, 196, 1)
        }
    </style>
@endsection

@section('body')
    @include('partials.preloader')

    <div class="main-banner" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="col-lg-12">
                <h2>Laporan sebagai Pembicara</h2>
                <form action="/workshop/evaluation/speaker/filter" method="get" style="background-color: transparent; border: 0">
                    
                    <div class="upper my-1 w-100 d-flex justify-content-between">
                        <div>
                            <button class="me-1" value="{{ old('sortTitle') == 'DESC' ? 'ASC' : 'DESC'}}" name="sortTitle">
                                Judul Workshop
                                @if ( old('sortTitle') == 'DESC') <i class="fa fa-arrow-up"></i> 
                                @else <i class="fa fa-arrow-down"></i>
                                @endif
                            </button>

                            <button class="me-1" value="{{ old('sortSchedule') == 'DESC' ? 'ASC' : 'DESC'}}" name="sortSchedule">
                                Jumlah Peserta
                                @if ( old('sortSchedule') == 'DESC') <i class="fa fa-arrow-up"></i> 
                                @else <i class="fa fa-arrow-down"></i>
                                @endif
                            </button>
                        </div>
                        <div class="search">
                            <input name="title" class="align-self-end" placeholder="Cari Judul" value="{{ old('title') }}">
                        </div>
                    </div>
                </form>
                <div class="tabel first-service">
                    <div class="row head">
                        <div class="col">
                            <p>Judul</p>
                        </div>
                        <div class="col">
                            <p>Jadwal Workshop</p>
                        </div>
                        <div class="col">
                            <p>Jumlah Peserta</p>
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
                            <div class="col jumlah">
                                <p>{{ $evaluation->total_audience }}</p>
                            </div>

                            @php
                                $dateNow    = date("Y-m-d");
                                $dateEval   = date('Y-m-d', strtotime("+1 day", strtotime($evaluation->date)));
                            @endphp

                            @if ($dateNow >= $dateEval)
                                @if (!$evaluation->pivot->comfortable || !$evaluation->pivot->event_suggestion || !$evaluation->pivot->file)
                                    <div class="col evaluasi">
                                        <a style="color:rgba(139, 75, 196, 1)" href="#" data-bs-toggle="modal"
                                            data-bs-target="#speaker" onclick='speaker("{{ $evaluation->id }}")'>
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
                            @else 
                                <div class="col evaluasi">
                                    <svg width="45" height="45" viewBox="0 0 45 45" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.875 28.1243L28.125 16.8743" stroke="#FF6359" stroke-width="2" />
                                            <path d="M28.125 28.125L16.875 16.875" stroke="#FF6359" stroke-width="2" />
                                        </svg>
                                </div>    
                                <div class="col sertif">
                                    <svg width="45" height="45" viewBox="0 0 45 45" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.875 28.1243L28.125 16.8743" stroke="#FF6359" stroke-width="2" />
                                            <path d="M28.125 28.125L16.875 16.875" stroke="#FF6359" stroke-width="2" />
                                        </svg>
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

    <div class="modal fade" id="speaker" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header popupHeader text-center">
                    <h5 class="modal-title header_title w-100" id="exampleModalLabel">FORM EVALUASI PEMBICARA</h5>
                </div>

                <div class="modal-body popupBody">
                    <form class="forms-sample" method="post" id="formSpeaker" enctype="multipart/form-data">
                        @csrf

                        <div class="mt-2">
                            <p>Kenyamanan sebagai pembicara</p>
                            <textarea type="text" name="comfortable">{{ old('comfortable') }}</textarea>
                            @error('comfortable')
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
                            <p>Usulan perbaikan penyelenggaraan</p>
                            <textarea type="text" name="event_suggestion">{{ old('event_suggestion') }}</textarea>
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
                            <p>Upload update materi anda (Dalam bentuk PDF)</p>
                            <input type="file" name="file">
                            @error('file')
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
            $(document).ready(function() {
                $('#speaker').modal('show');
            });
        </script>
    @endif

    <script>
        function speaker(id) {
            document.getElementById('formSpeaker').action = `/workshop/${id}/speaker`;
        }
    </script>
@endsection
