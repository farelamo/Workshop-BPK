<!DOCTYPE html>
<html lang="en">

    @include('partials.head')

    <body 
        @if(!Request::is('/'))
            style="background-color: #8B4BC4"
        @endif
    >
        @include('sweetalert::alert')
         
        @include('partials.header')

        @yield('body')

        @include('partials.footer')
        @include('partials.script')
    </body>
</html>
