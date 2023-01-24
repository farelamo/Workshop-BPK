@extends('index')

@section('body')
    <div class="main-create wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 ms-n3">
                            <div class="right-image wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                                <h4>Buat Workshop</h4>
                                <p>Mari membuat <span>wadah</span> yang dapat membahas topik tertentu dimana para peserta
                                    bebas mengutarakan <span>pendapat</span> atau <span>ilmu</span> yang kita miliki sebagai
                                    bahan diskusi.</p>
                                <p><span>Bertanggung jawab</span> serta <span>berbagi ilmu</span> merupakan hal yang sangat
                                    diperlukan untuk kehidupan kita dikemudian hari.</p>
                                <img src="{{ asset('assets/images/bannerCreate.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="left-content show-up header-text wow fadeInRight" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row">
                                    <div class="creates col-lg-12">
                                        <div class="section-heading  wow fadeInDown" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <h4>Buat Workshop</h4>
                                        </div>

                                        <form action="/workshop" method="POST" enctype="multipart/form-data">
                                            @csrf


                                            <div class="row" id="search">
                                                <div class="col-lg-6 col-sm-6">
                                                    <fieldset>
                                                        <p>Topik</p>
                                                        <select name="topic_id" autocomplete="on" style="color: #4D4076">
                                                            <option value="">-- Pilih Topik --</option>
                                                            @foreach ($topics as $topic)
                                                                @if (old('topic_id') == $topic->id)
                                                                    <option value="{{ $topic->id }}" selected>{{ $topic->name }}</option>
                                                                @else
                                                                    <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </fieldset>
                                                    @error('topic_id')
                                                        <div class="error">*{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <fieldset>
                                                        <p>Target Audience</p>
                                                        <select name="target_audience_id" autocomplete="on"
                                                            style="color: #4D4076">
                                                            <option value="">-- Pilih Target Audience --</option>
                                                            @foreach ($targets as $target)
                                                                @if (old('target_audience_id') == $target->id)
                                                                    <option value="{{ $target->id }}" selected>{{ $target->name }}</option>
                                                                @else
                                                                    <option value="{{ $target->id }}" selected>{{ $target->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </fieldset>
                                                    @error('target_audience_id')
                                                        <div class="error">*{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12 col-sm-12 mt-2">
                                                    <fieldset>
                                                        <p>Judul</p>
                                                        <input name="title" autocomplete="on" value="{{ old('title') }}"
                                                            style="color: #4D4076">
                                                        @error('title')
                                                            <div class="error">*{{ $message }}</div>
                                                        @enderror
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12 col-sm-12 mt-2">
                                                    <fieldset>
                                                        <p>Deskripsi Topik</p>
                                                        <textarea name="description" style="color: #4D4076" autocomplete="on">{{ old('description') }}</textarea>
                                                        @error('description')
                                                            <div class="error">*{{ $message }}</div>
                                                        @enderror
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <fieldset>
                                                        <p>Jadwal</p>
                                                        <input type="date" name="date" value="{{ old('date') }}"
                                                            style="color: #4D4076" min="{{ $checkDate['date_start'] }}"
                                                            max="{{ $checkDate['date_end'] }}">
                                                        @error('date')
                                                            <div class="error">*{{ $message }}</div>
                                                        @enderror
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <fieldset>
                                                        <p>Sesi</p>
                                                        <select name="link_id" style="color: #4D4076" autocomplete="on">
                                                            <option value="">-- Pilih Sesi --</option>
                                                            @foreach ($links as $link)
                                                                @if ($link->sesi == 1)
                                                                    @if (old('link_id') == $link->id)
                                                                        <option value="{{ $link->id }}" selected>09.00 - 12.00</option>
                                                                    @else
                                                                        <option value="{{ $link->id }}">09.00 - 12.00</option>
                                                                    @endif
                                                                @else
                                                                    @if (old('link_id') == $link->id)
                                                                        <option value="{{ $link->id }}" selected>13.00 - 15.00</option>
                                                                    @else
                                                                        <option value="{{ $link->id }}">13.00 - 15.00</option>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @error('link_id')
                                                            <div class="error">*{{ $message }}</div>
                                                        @enderror
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12 col-sm-12 mt-2">
                                                    <fieldset>
                                                        <p>Tujuan</p>
                                                        <textarea type="text" name="destination" style="color: #4D4076" autocomplete="on">{{ old('destination') }}</textarea>
                                                        @error('destination')
                                                            <div class="error">*{{ $message }}</div>
                                                        @enderror
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <fieldset>
                                                        <p>Materi</p>
                                                        <input type="file" name="document" style="color: #4D4076"
                                                            autocomplete="on">
                                                        @error('document')
                                                            <div class="error">*{{ $message }}</div>
                                                        @enderror
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <fieldset>
                                                        <p>Poster Kegiatan</p>
                                                        <input type="file" name="image" style="color: #4D4076"
                                                            autocomplete="on">
                                                        @error('image')
                                                            <div class="error">*{{ $message }}</div>
                                                        @enderror
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" required id="term1">
                                                <label class="form-check-label" for="term1">
                                                    <p1>Bersedia berbagi dan berdiskusi secara profesional.</p1>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" required id="term2">
                                                <label class="form-check-labelform-check-label" for="term2">
                                                    <p1>Bersedia menyelenggarakan kegiatan forum workshop.</p1>
                                                </label>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 mt-2 align-self-center">
                                                <fieldset>
                                                    <button type="submit">Daftar</button>
                                                </fieldset>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
