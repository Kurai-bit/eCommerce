<!DOCTYPE html>
<html lang="en">
<head>
    <title>Internship</title>
    <link rel="stylesheet" href="{{styleUrl('main.css')}}">
    <script src="{{scriptUrl('jquery-3.4.1.js')}}"></script>
    <script src="{{scriptUrl('main.js')}}"></script>
    <script src="{{scriptUrl('products.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    @yield('additional-css')
</head>
<body>
<div class="wrapper">
    @include('layout.header')
    <main class="main">

        @yield('content')
        <a href="/admin">go back</a>
        <a href="/addproducts">add products</a>
        <div class="content__container" >
            <table id="products" class="display" style="width: 1280px; margin-left: -15px;">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Units</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </main>

    @include('layout.footer')
    @yield('additional-scripts')
    <script>
        $(document).ready( function () {
            $('#products').DataTable({
                ajax: "/getproducts"
            });
        } );
    </script>
</div>
</body>
</html>