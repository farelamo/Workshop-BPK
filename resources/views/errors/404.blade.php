@extends('errors::minimal')

@push('head')
    <style>
        html,
        body {
            background-image: url('/assets/images/errors/ERROR_404.jpg');
            background-repeat: no-repeat;
            background-position: center;
            height: 100%;
            background-size: cover;
        }

        .button {
            background-color: #EFC762;
            color: #9A45D6;
            padding: 1rem;
            font-family: 'montserrat';
            font-weight: bold;
            border-radius: 5px;
        }
    </style>
@endpush
@section('title', __('Not Found'))
@section('code', '404')

{{-- @section('message')
    <a href="{{ url()->previous() }}">
        <button class="button p-5 rounded">Kembali ke halaman sebelumnya</button>
    </a>
@endsection --}}
