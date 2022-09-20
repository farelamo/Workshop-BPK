<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Workshop</title>
</head>

<body>
    @include('sweetalert::alert')
    <form action="/workshop" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="title" placeholder="title" value="{{ old('title') }}">
        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>
        <textarea name="description" placeholder="description">{{ old('description') }}</textarea>
        @error('description')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>
        <textarea name="destination" placeholder="destination">{{ old('destination') }}</textarea>
        @error('destination')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>
        <input type="file" name="image" placeholder="image" value="{{ old('image') }}">
        @error('image')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>
        <input type="file" name="document" placeholder="document" value="{{ old('document') }}">
        @error('document')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>
        <input 
            type="date" name="date" placeholder="date" value="{{ old('date') }}"
            min="{{ $checkDate['date_start'] }}" max="{{ $checkDate['date_end'] }}"
        >
        @error('date')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>
        <input type="text" name="link_id" placeholder="link_id" value="{{ old('link_id') }}">
        @error('link_id')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>
        <input type="text" name="topic_id" placeholder="topic_id" value="{{ old('topic_id') }}">
        @error('topic_id')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>
        <button type="submit">Send</button>
    </form>
</body>

</html>
