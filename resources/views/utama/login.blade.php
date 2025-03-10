<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body>
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="row justify-content-center p-5">
                <div class="col-md-6 d-none d-md-block login-image p-5">
                    <img src="{{ asset('assets/img/404.jpg') }}" alt="login" class="img-fluid">
                </div>
                <div class="col-md-6 p-5">

                    <form method="POST" action="{{ route('login.process') }}" class="user">
                        @csrf
                        <h1 class="text-center mb-5">Halaman Login</h1>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                        @endif

                        <div class="mb-3">
                            <input type="text" class="form-control form-control-user" name="username"
                                placeholder="Username" required>
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control form-control-user" name="password"
                                placeholder="Password" required>
                        </div>

                        <div class="mb-3 text-center d-grid gap-md-2 mx-auto">
                            <button type="submit" class="btn btn-dark btn-user">Log In</button>
                        </div>
                        <hr />

                        <p class="text-center">Belum punya akun? <a class="text-decoration-none"
                                href="{{ url('/register') }}">Register</a></p>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>