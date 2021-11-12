<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact request</title>
</head>
<body>
    <h3>new contact request</h3>
    <div>
        <span>name:</span>
        <b>{{$name}}</b>
    </div>
    <div>
        <span>email:</span>
        <a href="email:{{$email}}">{{$email}}</a>
    </div>
    <div>
        <span>message:</span>
        <b>{{$msg}}</b>
    </div>
</body>
</html>