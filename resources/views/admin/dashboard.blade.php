<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <title>dashboard</title>
</head>

<body>
    <div class="text-center">
        <h1>Anggap aja ini dashboard</h1>
    </div>

    <div class="container">
        <form action="{{ route('logout.admin') }}" method="post">
            @csrf
            <button class="btn btn-danger">Logout Admin</button>
        </form>
    </div>
</body>

</html>