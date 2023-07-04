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
                <form action="/workshop/evaluation/audience/filter" method="get" style="background-color: transparent; border: 0">

                    <div class="upper my-1 w-100 d-flex justify-content-between">
                        <div>
                            <button class="me-1" value="{{ $fsearch ? !is_null($fsearch['sortTitle']) ? $fsearch['sortTitle'] == 'DESC' ? 'ASC' : 'DESC' : 'ASC' : 'ASC'}}" name="sortTitle">
                                Judul Workshop
                                @if ($fsearch ? !is_null($fsearch['sortTitle']) ? $fsearch['sortTitle'] == 'DESC' : 'DESC' : 'DESC') <i class="fa fa-arrow-up"></i>
                                @else <i class="fa fa-arrow-down"></i>
                                @endif
                            </button>

                            <button class="me-1" value="{{ $fsearch ? !is_null( $fsearch['sortSchedule']) ? $fsearch['sortSchedule'] == 'DESC' ? 'ASC' : 'DESC' : 'ASC' : 'ASC'}}" name="sortSchedule">
                                Jumlah Peserta
                                @if ($fsearch ? !is_null($fsearch['sortSchedule']) ? $fsearch['sortSchedule'] == 'DESC' : 'DESC' : '') <i class="fa fa-arrow-up"></i>
                                @else <i class="fa fa-arrow-down"></i>
                                @endif
                            </button>
                        </div>
                        <div class="search">
                            <input name="title" class="align-self-end" placeholder="Cari Judul" value="{{  $fsearch ? !is_null($fsearch['title']) ? $fsearch['title'] : '' : '' }}">
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
                            <p>Status</p>
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

                            @php
                               $dateNow    = date('Y-m-d', strtotime("+1 day", strtotime(date('Y-m-d'))));
                               $dateEval   = date('Y-m-d', strtotime($evaluation->date));
                            //    dd(old());
                            @endphp

                            @if ($evaluation->cancelled === 'yes')
                                <div class="col judul">
                                    <p class="text-danger fw-bold">Dibatalkan</p>
                                </div>
                                <div class="col judul">
                                    <p>-</p>
                                </div>
                                <div class="col judul">
                                    <p>-</p>
                                </div>
                            @else
                                @if ($dateNow >= $dateEval)
                                    {{-- Belum Isi Eval + Terlaksana --}}
                                    @if (
                                            !$evaluation->pivot->received || !$evaluation->pivot->speaker_suggestion ||
                                            !$evaluation->pivot->event_suggestion || !$evaluation->pivot->note
                                        )
                                        <div class="col judul">
                                            <p class="text-success fw-bold">Terlaksana</p>
                                        </div>
                                        <div class="col evaluasi">
                                            <a style="color:rgba(139, 75, 196, 1)" href="#" data-bs-toggle="modal"
                                                data-bs-target="#audience" onclick='audience("{{ $evaluation->id }}")'>
                                                <button>
                                                    evaluasi disini
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col judul">
                                            <p>-</p>
                                        </div>
                                    {{-- Sudah Isi Eval + Terlaksana --}}
                                    @else
                                        <div class="col judul">
                                            <p class="text-success fw-bold">Terlaksana</p>
                                        </div>
                                        <div class="col judul">
                                            <p>Sudah Evaluasi</p>
                                        </div>
                                        <div class="col sertif">
                                            <div class="green mb-1">
                                                <a href="/workshop/{{ $evaluation->id }}/audience/download">
                                                    <button>Download</button>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="/workshop/{{ $evaluation->id }}/audience/view" target="_blank">
                                                    <button>Lihat</button>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                {{-- Belum Isi Eval + Nunggu Hari H --}}
                                @else
                                    <div class="col judul">
                                        <p class="fw-bold">Menunggu</p>
                                    </div>
                                    <div class="col judul">
                                        <p>-</p>
                                    </div>
                                    <div class="col judul">
                                        <p>-</p>
                                    </div>
                                @endif
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
                            <textarea name="received">{{ old('received') }}</textarea>
                            @error('received')
                                <div class="error">*{{ $message }}</div>
                            @enderror

                            <div class="rate">
                                <input type="radio" id="star5" name="receivedRate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="receivedRate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="receivedRate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="receivedRate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="receivedRate" value="1" />
                                <label for="star1" title="text">1 star</label>
                                <p>Penilaian</p>
                            </div>
                        </div>
                        <div>
                            <input type="text" id="fdata" name="fId" value="{{ old('fId') }}" hidden>
                        </div>
                        <div class="">
                            <p>Saran perbaikan untuk pembicara</p>
                            <textarea name="speaker_suggestion">{{ old('speaker_suggestion') }}</textarea>
                            @error('speaker_suggestion')
                                <div class="error">*{{ $message }}</div>
                            @enderror

                            <div class="rate">
                                <input type="radio" id="star5" name="speakerRate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="speakerRate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="speakerRate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="speakerRate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="speakerRate" value="1" />
                                <label for="star1" title="text">1 star</label>
                                <p>Penilaian</p>
                            </div>
                        </div>
                        <div class="">
                            <p>Saran perbaikan untuk acara</p>
                            <textarea name="event_suggestion">{{ old('event_suggestion') }}</textarea>
                            @error('event_suggestion')
                                <div class="error">*{{ $message }}</div>
                            @enderror

                            <div class="rate">
                                <input type="radio" id="star5" name="eventRate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="eventRate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="eventRate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="eventRate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="eventRate" value="1" />
                                <label for="star1" title="text">1 star</label>
                                <p>Penilaian</p>
                            </div>
                        </div>
                        <div>
                            <p>Upload catatan anda (Dalam bentuk PDF)</p>
                            <input type="file" name="note">
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
                document.getElementById('formAudience').action = `/workshop/${document.getElementById('fdata').value}/audience`;
            });
        </script>
    @endif

    <script>
        function audience(id) {
            document.getElementById('formAudience').action = `/workshop/${id}/audience/`;
            document.getElementById('fdata').value         = id
        }
    </script>
@endsection
