<!DOCTYPE html>
<html>
<head>
    <title>Login to admin</title>
    <base href="{{ asset('') }}backend/">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="js/kitfont.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<img class="wave" src="images/wave.png">
<div class="container">
    <div class="img">
        <img src="images/bg.svg">
    </div>
    <div class="login-content">
        <form method="post">
            @csrf
            <img src="images/avatar.svg">
            <h2 class="title">Welcome</h2>
            @if($errors->first())
                <div class="text-danger font-weight-bold mb-4">{{$errors->first()}}</div>
            @endif
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5>Username</h5>
                    <input type="email" class="input" name="email">
                </div>
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Password</h5>
                    <input type="password" class="input" name="password">
                </div>
            </div>
            <a href="#">Forgot password</a>
            <input type="submit" class="btn" value="Login">
        </form>
    </div>
</div>
<script type="text/javascript" src="js/login.js"></script>
</body>
</html>
