<!DOCTYPE html>
<html lang="en">
<head>
    <title>Internship</title>
    <link rel="stylesheet" href="{{styleUrl('main.css')}}">
    <script src="{{scriptUrl('jquery-3.4.1.js')}}"></script>
    <script src="{{scriptUrl('main.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    @yield('additional-css')
</head>
<body>
<div class="wrapper">
    @include('layout.header')
    <main class="main">
        @yield('content')
        <div class="admin_content__container" >
            <a href="/categories">show categories</a>
            <a href="/products">show products</a>
        </div>
    </main>

    @include('layout.footer')
    @yield('additional-scripts')
</div>
</body>
</html>