@extends('template-admin.layout')
@section('title', 'Data Kelas')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<style>
    .action-btns {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .action-btns .btn {
        margin: 0;
    }

    .btn-custom-width {
        width: auto;
    }
</style>
@endsection
@section('konten')
<div class="d-flex mb-2">
    <a href="{{route('local.create')}}" class="btn btn-success btn-custom-width"><i class="fas fa-plus"></i> Tambah Data Kelas</a>
    <a href="{{route('jurusan.index')}}" class="btn btn-primary " style="justify-content: end; margin-left: 30px;"><i class="fas fa-book"></i> Jurusan</a>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-gray text-primary">
                    Manajemen Data Kelas
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Wali Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($local as $dg)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$dg->nama}}</td>
                                <td>{{ $dg->guru ? $dg->guru->nama : 'Guru tidak ditemukan' }}</td>

                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('local.show', $dg->id) }}" class='btn btn-outline-primary btn-sm'><i class='fas fa-eye' title="show"></i></a>

                                        <a href="{{route('local.edit',$dg['id'])}}" class='btn btn-outline-warning btn-sm'><i class='fas fa-pencil-alt' title="edit"></i></a>

                                        <form action="{{route('local.destroy',$dg['id'])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class='btn btn-outline-danger btn-sm'><i class='far fa-trash-alt' title="hapus" onclick="return confirm('apakah anda yakin ingin menghapus data ini?')"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection