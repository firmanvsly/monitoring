<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <style>
        .login-box,
        .register-box {
            width: 560px
        }

        @media (max-width:576px) {

            .login-box,
            .register-box {
                margin-top: .5rem;
                width: 90%
            }
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Monitoring</b>Air</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Cari Pengguna</p>
                @error('nomer')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-danger dark" role="alert">{{ $message }}</div>
                        </div>
                    </div>
                @enderror
                <form action="{{ route('search') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nomer" placeholder="Masukan Nomer Pengguna"
                            value="@isset($data) {{ $data->nomer }} @endisset">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-search"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Search</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                @isset($data)
                    <table class="table table-stripe table-hover">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $data->nama }}</td>
                        </tr>
                        <tr>
                            <th>Nomer Pengguna</th>
                            <td>{{ $data->nomer }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $data->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Meteran Bulan Ini</th>
                            <td>{{ $data->meteran_bulan_ini }}</td>
                        </tr>
                        <tr>
                            <th>Meteran Bulan Lalu</th>
                            <td>{{ $data->meteran_bulan_lalu }}</td>
                        </tr>
                    </table>
                @endisset
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
