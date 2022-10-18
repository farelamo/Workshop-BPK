<!DOCTYPE html>
<html lang="en">

    <head>
        @include('partials.head')
        @yield('head')
    </head>
    
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

        @yield('scripts')
    </body>
</html>
