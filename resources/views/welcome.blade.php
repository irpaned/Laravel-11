<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Laravel</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
</head>
<body>
    <h1 class="text-center mt-5">Selamat Datang di Aplikasi Laravel CRUD 11</h1>

    <div class="text-center mt-5">
        <form action="{{ route('threads.tampil') }}" method="get">
            @csrf
            <button class="btn btn-primary">Akses</button>
        </form>
    </div>

</body>
</html>