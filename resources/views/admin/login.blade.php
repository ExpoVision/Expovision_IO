<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form action="{{route('login')}}" method="POST" class="login">
        @csrf
        <div class="form-group">
            <label for=""></label>
            <input type="text" name="login" placeholder="Login" />
        </div>
        <div class="form-group">
            <label for=""></label>
            <input type="password" name="password" placeholder="Password" />
        </div>
        <div class="form-group">
            <input type="submit" value="Sign in">
        </div>
        
    </form>
</body>
</html>