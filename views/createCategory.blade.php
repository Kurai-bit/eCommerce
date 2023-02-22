<!DOCTYPE html>
<html lang="en">
<head>
    <title>Internship</title>
    <link rel="stylesheet" href="{{styleUrl('main.css')}}">
    <script src="{{scriptUrl('jquery-3.4.1.js')}}"></script>
    <script src="{{scriptUrl('main.js')}}"></script>

    @yield('additional-css')
</head>
<body>
<div class="wrapper">
    @include('layout.header')
    <main class="main">
        @yield('content')
        <div class="content__container">
            <a href="/categories">Go back</a>
            <div class="dashboard_form_div">
                <form action="/submitcategory" method="POST" class="dashboard_form">
                    <input type="text" name="name" placeholder="Category name">
                    <textarea name="description" id="" cols="30" rows="10" placeholder="Category description"></textarea>
                    <input type="submit" value="Submit">
                </form>
            </div>

        </div>
    </main>

    @include('layout.footer')
    @yield('additional-scripts')
</div>
</body>
</html>