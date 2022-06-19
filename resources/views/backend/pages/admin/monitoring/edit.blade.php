@extends('backend.layouts.app')

@section('title', 'Edit Pengguna')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengguna</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.monitoring.index') }}">Pengguna</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 mx-auto">
                    <form action="{{ route('admin.monitoring.update', $data->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                @include('backend.includes.messages')
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ $data->nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" rows="3" id="alamat" placeholder="Masukan Alamat" name="alamat">{{ $data->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="meteranBulanIni">Meteran Bulan Ini</label>
                                    <input type="text" class="form-control" id="meteranBulanIni"
                                        placeholder="Masukan Meteran Bulan Ini" name="meteran_bulan_ini" value="{{ $data->meteran_bulan_ini }}">
                                </div>
                                <div class="form-group">
                                    <label for="meteranBulanLalu">Meteran Bulan Lalu</label>
                                    <input type="text" class="form-control" id="meteranBulanLalu"
                                        placeholder="Masukan Meteran Bulan Lalu" name="meteran_bulan_lalu" value="{{ $data->meteran_bulan_lalu }}">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@push('css-plugin')
@endpush

@push('js-plugin')
@endpush
