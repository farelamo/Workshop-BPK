<div class="filter mb-3">
    <div class="row">
        <div class="col-lg-5">
            <p>Judul Kegiatan</p>
        </div>
        <div class="col">
            <p>Kategori</p>
        </div>
        <div class="col">
            <p>Jadwal</p>
        </div>
        <div class="col">
            <p> </p>
        </div>
    </div>
    <div class="row">
        <form action="/workshops/filter" method="get" class="border-0">
            <div class="col-lg-5">
                <fieldset>
                    <input name="title" placeholder="Cari Berdasarkan Judul Workshop" autocomplete="on" value="{{ old('title') }}">
                </fieldset>
            </div>
            <div class="col ps-2">
                <fieldset>
                    <select name="topic_id" autocomplete="on">
                        <option value="">Pilih Kategori</option>
                        @foreach ($topics as $topic)
                            @if (old('topic_id') == $topic->name)
                                <option value="{{ $topic->name }}" selected>{{ $topic->name }}</option>
                            @else
                                <option value="{{ $topic->name }}">{{ $topic->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </fieldset>
            </div>
            <div class="col ps-2">
                <fieldset>
                    <select name="link_id" autocomplete="on">
                        <option value="">Pilih Jadwal</option>
                        @foreach ($links as $link)
                            @if($link->id == 1)
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
                </fieldset>
            </div>
            <div class="col ps-2">
                <button type="submit">Cari Kegiatan</button>
            </div>
        </form>
    </div>
</div>
