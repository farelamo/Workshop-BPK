<div class="filter mb-3">
    <div class="row">
        <div class="col-lg-5">
            <p>What are you looking for?</p>
        </div>
        <div class="col">
            <p>Category</p>
        </div>
        <div class="col">
            <p>Schedule</p>
        </div>
        <div class="col">
            <p> </p>
        </div>
    </div>
    <div class="row">
        <form action="/workshops/filter" method="get" class="border-0">
            
            <div class="col-lg-5">
                <fieldset>
                    <input name="title" placeholder="Search for workshop name" autocomplete="on" value="{{ old('title') }}">
                </fieldset>
            </div>
            <div class="col ps-2">
                <fieldset>
                    <select name="topic_id" autocomplete="on" class="text-center">
                        <option value="">-- Select Category --</option>
                        @foreach ($topics as $topic)
                            @if (old('topic_id') == $topic->id)
                                <option value="{{ $topic->id }}" selected>{{ $topic->name }}</option>
                            @endif
                            <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>
            <div class="col ps-2">
                <fieldset>
                    <select name="link_id" class="text-center" autocomplete="on">
                        <option value="">-- Select Schedule --</option>
                        @foreach ($links as $link)
                            @if($link->id == 1)
                                @if (old('link_id') == $link->id)
                                    <option value="{{ $link->id }}" selected>09.00 - 12.00</option>
                                @else
                                    <option value="{{ $link->id }}">09.00 - 12.00</option>
                                @endif
                            @else
                                @if (old('link_id') == $link->id)
                                    <option value="{{ $link->id }}" selected>15.00 - 17.00</option>
                                @else
                                    <option value="{{ $link->id }}">15.00 - 17.00</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                </fieldset>
            </div>
            <div class="col ps-2">
                <button type="submit">Search</button>
            </div>
        </form>
    </div>
</div>
