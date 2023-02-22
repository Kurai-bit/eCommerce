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
            <div class="dashboard_form_div">
                <a href="/products">Go back</a>
                <form action="/submitproducts" method="POST" class="dashboard_form">
                    <input type="text" name="name" placeholder="Name">
                    <select name="category" id="category">
                        @foreach($data as $id => $name)
                            <option name="category" value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                    <input type="number" name="price" placeholder="price">
                    <input type="number" name="units" placeholder="amount">
                    <textarea name="description" id="" cols="30" rows="10" placeholder="Product description"></textarea>
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