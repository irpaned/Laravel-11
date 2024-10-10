<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <title>Register</title>
</head>
<body>
    

    <div class="container">
    <h4 class="text-center mt-5">Register</h4>
    <div class="w-25 mx-auto border p-3">
        <form action="{{ route('register.submit') }}" method="post">
            @csrf 
            <label>Name</label>
            <input type="text" name="name" class="form-control mb-2">
            <label>Email</label>
            <input type="email" name="email" class="form-control mb-2">
            <label>Password</label>
            <input type="password" name="password" class="form-control mb-2">
            <button class="btn btn-primary">Register</button>
        </form>
    </div>
    
    </div>
   
</body>
</html>