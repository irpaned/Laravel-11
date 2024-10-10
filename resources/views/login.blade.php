<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <title>Login</title>
</head>
<body>
    

    <div class="container">
    <h4 class="text-center mt-5">Login</h4>
    <div class="w-25 mx-auto border p-3">
        <form action="{{ route('login.submit') }}" method="post">
            @csrf 
            <!-- wajib digunakan dalam form POST di Laravel untuk mencegah serangan CSRF dan menjaga keamanan aplikasi Anda. -->
            <label>Email</label>
            <input type="email" name="email" class="form-control mb-2">
            <label>Password</label>
            <input type="password" name="password" class="form-control mb-2">
            <button class="btn btn-primary">Login</button>
        </form>
        @if(session("failed"))
        <p class="text-danger">{{ session("failed") }}</p>
        @endif
    </div>
    
    </div>
   
</body>
</html>