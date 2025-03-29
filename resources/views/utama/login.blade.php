<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="{{asset('assets/img/absen33.png')}}" rel="icon">

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body>
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="row justify-content-center p-5">
                <div class="col-md-4 d-none d-md-block login-image p-3">
                    <img src="{{ asset('assets/img/login.avif') }}" alt="login" class="img-fluid">
                </div>
                <div class="col-md-6 p-5">
                    @if(Auth::user())
                    @if(Auth::user()-> level=='admin')
                    <script>
                        window.location = "{{ route('dashboard-admin') }}";
                    </script>
                    @elseif(Auth::user()-> level=='guru')
                    <script>
                        window.location = "{{ route('dashboard-guru') }}";
                    </script>
                    @elseif(Auth::user()-> level=='siswa')
                    <script>
                        window.location = "{{ route('rekap.index') }}";
                    </script>
                    @elseif(Auth::user()-> level=='walikelas')
                    <script>
                        window.location = "{{ route('dashboard-walikelas') }}";
                    </script>
                    @endif
                    @endif

                    <form method="POST" action="{{route ('login.submit') }}">
                        @csrf
                        <h1 class="text-center mb-5">Halaman Login</h1>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="mb-3">
                            <input type="text" class="form-control form-control-user" name="username" value="{{ old('username') }}"
                                placeholder="Username">
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control form-control-user" name="password"
                                placeholder="Password">

                        </div>

                        <div class="mb-3 text-center d-grid gap-md-2 mx-auto">
                            <button type="submit" class="btn btn-dark btn-user">Log In</button>
                        </div>
                       


                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
@section('js')
<script>
    function togglePassword() {
        let passwordInput = document.getElementById("password");
        let eyeIcon = document.getElementById("eyeIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.replace("bi-eye", "bi-eye-slash");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.replace("bi-eye-slash", "bi-eye");
        }
    }
</script>

@endsection

</html>