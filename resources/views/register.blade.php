<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Account</title>
</head>
<body>
    <nav></nav>
    <main>
        <div>
            <form action="{{route('create')}}" method="post">
                @csrf
                Name: <input type="text" name="name" id="name"><br>
                Contact: <input type="number" name="contact" id="contact"><br>
                Email: <input type="email" name="email" id="email"><br>
                Password: <input type="password" name="password" id="password"><br>
                <button type="submit">Create</button>
            </form>
        </div>
    </main>
</body>
</html>