<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <nav></nav>
    <main>
        <div>
            <form action="{{route('login')}}" method="post">
                @csrf
                Email: <input type="text" name="email" id="email"> <br>
                Password: <input type="password" name="password" id="password"><br>
                <button type="submit">Confirm</button>
            </form>
        </div>
        <div><a href="{{route('register')}}">Register Account</a></div>
    </main>
</body>
</html>