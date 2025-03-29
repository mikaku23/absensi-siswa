@extends('template-walikelas.layout')
@section('title', 'Absen Siswa')
@section('css')
<!-- Other head content -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
@section('konten')
<a href="{{route('absenWalikelas.index')}}" class="btn btn-success btn-custom-width mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>

<div class="card">
    <h5 class="card-header">Absen Siswa</h5>
    <div class="card-body">
        <form method="GET" action="{{ route('absenWalikelas.create') }}">
            <div class="row">
                <div class="col-md-4">
                    <select name="kelas" class="form-control">
                        <option value="">Pilih Kelas</option>
                        @foreach($locals as $local)
                        <option value="{{ $local->id }}" {{ request('kelas') == $local->id ? 'selected' : '' }}>
                            {{ $local->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>
    <div class="table-responsive text-nowrap">
        <form method="POST" action="{{ route('absenWalikelas.membuat') }}">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Hadir</th>
                        <th>Sakit</th>
                        <th>Alpa</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($datasiswa as $dg)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$dg->nama}}</td>
                        <td>{{$dg->local->nama}}</td>
                        <td>
                            <input type="radio" name="status[{{ $dg->id }}]" value="hadir" class="select-hadir">
                        </td>
                        <td>
                            <input type="radio" name="status[{{ $dg->id }}]" value="sakit" class="select-sakit">
                        </td>
                        <td>
                            <input type="radio" name="status[{{ $dg->id }}]" value="alpa" class="select-alpa">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row justify-content-end">
                <div class="col-sm-2 text-right">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection