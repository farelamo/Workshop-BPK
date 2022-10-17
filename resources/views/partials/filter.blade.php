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
        <form action="/workshop/filter" method="post" class="border-0">
            @csrf
            
            <div class="col-lg-5">
                <fieldset>
                    <input name="title" placeholder="Search for workshopname" autocomplete="on">
                </fieldset>
            </div>
            <div class="col ps-2">
                <fieldset>
                    <select name="topic_id" autocomplete="on" class="text-center">
                        <option value="">-- Select Category --</option>
                        @foreach ($topics as $topic)
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
                                <option value="{{ $link->id }}">09.00 - 12.00</option>
                            @else
                                <option value="{{ $link->id }}">15.00 - 17.00</option>
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
