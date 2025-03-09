@extends('template.layout')
@section('title', 'Mengedit Data ' . $local->nama)
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection

@section('konten')
<div class="col">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Data {{$local->nama}}</h5>

            <!-- Vertical Form -->
            <form class="row g-3" action="{{route('local.update', $local->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <label for="nama" class="form-label">Angkatan</label>
                    <select name="nama" id="nama" class="form-control" required>
                        <option disabled selected value="">Pilih Angkatan</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                        <option value="XIII">XIII</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="id_jurusan" class="form-label">Jurusan</label>
                    <select name="id_jurusan" id="id_jurusan" class="form-control" required>
                        <option disabled selected value="">Pilih Jurusan</option>
                        @foreach($jurusan as $j)
                        <option value="{{$j['id']}}">{{$j['nama']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <label for="id_guru" class="form-label">Wali Kelas</label>
                    <select name="id_guru" class="form-control" required>
                        <option disabled selected value="">Pilih Wali Kelas</option>
                        @foreach ($guru as $g)
                        <option value="{{ $g->id }}"
                            @if (in_array($g->id, $guru_terpakai)) disabled @endif>
                            {{ $g->nama }}
                        </option>
                        @endforeach
                    </select>

                </div>
                <div class="text-end">
                    <a href="{{route('local.index')}}" class="btn btn-primary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="reset" class="btn btn-warning">
                        <i class="bi bi-arrow-clockwise"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>
</div>
@endsection
