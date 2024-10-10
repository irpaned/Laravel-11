<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Laravel</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
</head>
<body>
    <h1 class="text-center mt-5">CRUD Threads dengan Laravel 11</h1>
    @if(Auth::check())
        <p class="text-center">Halo {{ Auth::user()->name }}, anda berhasil login</p>
    @endif
    <div class="mt-3 container">
        @yield('content') 
    </div>

    <div class="container">
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
    </div>
        
   
</body>
</html>