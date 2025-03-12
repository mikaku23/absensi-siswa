<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- title -->
    <title>Halaman Registrasi</title>

    <!-- Css Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">

    <!-- css register -->
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
</head>

<body>

    <!-- container -->
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="row justify-content-center p-5">
                <div class="col-md-5 d-none d-md-block register-image">
                    <img src="{{ asset('assets/img/register.avif') }}" alt="register" class="img-fluid" style="margin-top: 120px;">
                </div>
                <div class="col-md-6 p-5">
                    <form class="user" method="POST" action="{{route ('registrasi.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <h1 class="text-center mb-5">Daftar Akun</h1>
                        <div class="mb-3">
                            <input type="number" class="form-control form-control-user" id="nip" name="nip"
                                placeholder="Nip" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-user" id="nama" name="nama"
                                placeholder="Nama" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-user" id="name" name="username"
                                placeholder="Username" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control form-control-user" id="pass" name="password"
                                placeholder="Password" required>
                        </div>
                        <div class="mb-3">
                            <select class="form-control form-control-user" id="jk" name="jk" required>
                                <option disabled selected value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control form-control-user" id="nohp" name="nohp"
                                placeholder="No Hp" required>
                        </div>
                        <div class="mb-3">
                            <input type="date" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir"
                                placeholder="Tanggal Lahir" required>
                        </div>
                        <div class="mb-3 text-center d-grid gap-md-2 mx-auto">
                            <button type="submit" class="btn btn-dark btn-user" name="submit">Register</button>
                        </div>
                        <hr>

                        <!-- login -->
                        <p class=" text-center ">Sudah punya akun? <a class="text-decoration-none" href="{{route('login')}}">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php



    ?>