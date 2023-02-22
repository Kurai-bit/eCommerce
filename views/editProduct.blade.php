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
                <form action="/updateproducts/{{$id}}" method="POST" class="dashboard_form">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{$name}}">
                    <label for="price">Price</label>
                    <input type="number" name="price" value="{{$price}}">
                    <label for="units">Units</label>
                    <input type="number" name="units" value="{{$units}}">
                    <label for="category">category</label>
                    <input type="text" name="category" value="{{$category}}">
                    <label for="newDescription">Description</label>
                    <textarea name="newDescription" id="" cols="30" rows="10">{{$description}}</textarea>
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