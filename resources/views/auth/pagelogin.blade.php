<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Boostrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <!-- CSS Buatan -->
    <link rel="stylesheet" href="CSS/login.css">
    <title>Login | Page</title>
</head>

<body>

    <!--Animated Background -->
    <div class="area">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>

            <!-- Form login -->
            <div class="content">
                <h1 class="text-white text-center m-3">
                    CakeBucks
                </h1>

                <!-- Alert -->
                @if(session()->has('alert'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('alert') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <!-- /.Alert -->

                <!-- Form Content -->
                <form action="{{ route('masuklogin') }}" method="POST" class="form mb-5">
                    @csrf
                    <!-- Username input -->
                    <div class="form-group mb-4">
                        <label class="form-label" for="username">Username</label>
                        <i class="fa-solid fa-user-shield"></i>
                        <input type="text" id="name" name="name" aria-label="name" class="form-control form-control-lg"
                            placeholder="Username" value="{{ old('name') }}">
                        <span class="text-white fw-bold">@error('name'){{ $message }} @enderror</span>
                    </div>

                    <!-- Password input -->
                    <div class="form-group mb-4">
                        <label class="form-label" for="password">Password</label>
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="password" name="password" aria-label="password"
                            class="form-control form-control-lg" placeholder="Password">
                        <span class="text-white fw-bold">@error('password'){{ $message }} @enderror</span>
                    </div>

                    <!-- Submit button -->
                    <div class="tombol">
                        <button type="submit" class="btn btn-lg btn-block">Sign in</button>
                    </div>
                </form>
            </div>
        </ul>
    </div>

    <!-- Boostrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
