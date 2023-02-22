<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Internship</title>
        <link rel="stylesheet" href="{{styleUrl('main.css')}}">
        @yield('additional-css')
    </head>
    <body>
    <div class="wrapper">
        @include('layout.header')
        <main class="main">
            @yield('content')

        </main>

        @include('layout.footer')

        <script src="{{scriptUrl('jquery-3.4.1.js')}}"></script>
        <script src="{{scriptUrl('main.js')}}"></script>
        @yield('additional-scripts')
    </div>
    </body>
</html>
