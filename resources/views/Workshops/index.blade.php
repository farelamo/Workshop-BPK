@extends('index')

@section('body')
    @include('partials.preloader')

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="col-lg-12">

                @include('partials.filter')

                <div class="listworkshop">
                    @foreach ($workshops as $workshop)
                        <div class="row m-4">
                            <div class="col-lg-3">
                                <img src="{{ Storage::url('public/images/' . $workshop->image) }}" class="rounded">
                            </div>
                            <div class="col-lg-9">
                                <h4>{{ $workshop->title }}</h4>
                                <p>Lorem ipsum dolor consectetur adipiscing elit sedder williamsburg photo booth quinoa and
                                    fashion axe.</p>
                                <p class="fw-bold text-dark text-opacity-75">
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="2.5" y="6.25" width="2.5" height="2.5" fill="#5D5D5D" />
                                        <rect x="2.5" y="10" width="2.5" height="2.5" fill="#5D5D5D" />
                                        <rect x="6.25" y="10" width="2.5" height="2.5" fill="#5D5D5D" />
                                        <rect x="10" y="10" width="2.5" height="2.5" fill="#5D5D5D" />
                                        <rect x="6.25" y="6.25" width="2.5" height="2.5" fill="#5D5D5D" />
                                        <rect x="10.625" y="6.875" width="1.25" height="1.25" stroke="#989696"
                                            stroke-width="1.25" />
                                        <rect x="0.5" y="1.75" width="14" height="12.75" rx="1.5"
                                            stroke="#5D5D5D" />
                                        <path d="M3.75 0V2.5" stroke="#989696" />
                                        <path d="M11.25 0V2.5" stroke="#989696" />
                                        <path
                                            d="M14.375 4.37492H0.625008C0.499837 1.50002 1.87501 2.49992 2.50001 1.87492C2.70834 1.87492 4.28475 2.43306 8.75001 1.87492C15.4998 1.03123 14.375 3.54159 14.375 4.37492Z"
                                            fill="#5D5D5D" />
                                    </svg>
                                    {{ $workshop->date }}
                                </p>
                                <p class="fw-bold text-dark text-opacity-75">
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.5 4V9.5L6.5 13.5" stroke="#5D5D5D" stroke-width="2" />
                                        <circle cx="8.5" cy="8.5" r="7.5" stroke="#5D5D5D"
                                            stroke-width="2" />
                                    </svg>
                                    @if ( $workshop->Link->sesi == 1)
                                        09.00 - 12.00
                                    @else
                                        13.00 - 15.00
                                    @endif
                                </p>
                                <p class="fw-bold text-dark text-opacity-75">
                                    <i class="fa fa-user"></i>
                                    {{ $workshop->users()->wherePivot('role', 'speaker')->first()->fullname }}
                                </p>
                                <div class="row mt-3">
                                    <div class="col-lg-8">
                                        <div class="item">
                                        @if(\Carbon\Carbon::now()->gt($workshop->date))
                                        <p class="fw-bold text-opacity-75" style="color: red">PENDAFTARAN TELAH DITUTUP</p>
                                        @else
                                            <p class="fw-bold text-dark text-opacity-75">Kegiatan ini telah terdaftar sebanyak {{ $workshop->total_audience }} audience</p>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="border-button scroll-to-section">
                                            <a href="/workshop/{{ $workshop->id }}">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    <div class="d-flex justify-content-center" style="background-color: white">
                        {!! $workshops->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
