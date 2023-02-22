<!DOCTYPE html>
<html lang="en">
<head>
    <title>Internship</title>
    <link rel="stylesheet" href="{{styleUrl('main.css')}}">
@yield('additional-css')
</head>
<body>
<div class="wrapper">
    <main class="main">
        @yield('content')
        <div class="register__container">
            <div class="register_form_div">
                <form action="../scripts/register.php" method="post" class="register_form" >
                    <input type="text" name="first_name" placeholder="First Name">
                    <input type="text" name="last_name" placeholder="Last Name*" required>
                    <input type="text" name="address" placeholder="Address*" required>
                    <input type="email" name="email" placeholder="your@email.here*" required>
                    <input type="password" name="password" placeholder="Password*" required>
                    <input type="number" name="phone" placeholder="Your Phone*" required>
                    <input type="submit" value="Register">
                </form>
            </div>
        </div>
    </main>

    @include('layout.footer')

    <script src="{{scriptUrl('jquery-3.4.1.js')}}"></script>
    <script src="{{scriptUrl('main.js')}}"></script>
    @yield('additional-scripts')
</div>
</body>
</html>