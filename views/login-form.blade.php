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
        <div class="login__container">
            <div class="login_form_div">
                <form action="/login-validate" method="post" class="login_form">
                    <input type="email" name="email" placeholder="your@email.here*" required>
                    <input type="password" name="password" placeholder="Password*" required>
                    <input type="submit" value="Login">
                    <a href="../register-form.php">Signup ?</a>
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