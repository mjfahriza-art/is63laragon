@extends('layout.master')
@section('title')
Data Tambah Jurusan
@endsection

@section('judul')
Data Tambah Jurusan
@endsection

@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Jurusan</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="/jurusan/{{ $jurusan->id }}">
            @csrf
            @method('PUT')

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Kode</label>
                <input type="text" value="{{ $jurusan->kode_jurusan }}" name="kode_jurusan"
                    class="form-control @error('kode_jurusan') is-invalid @enderror" id="exampleinputEmaill"
                    aria-describedby="emailHelp">
                @error('kode_jurusan')
                <div class="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Jurusan</label>
                {{-- < class="form-control @error('jurusan') is-invalid @enderror" name="jurusan"> --}}
                <select name="nama_jurusan" class="form-control @error('nama_jurusan') is-invalid @enderror" id="">
                    <option value="">--Pilih Jurusan--</option>
                    <option {{ $jurusan->nama_jurusan == 'Informatika Komputer' ? 'selected' : '' }}
                        value="Informatika Komputer">Informatika Komputer</option>
                    <option {{ $jurusan->nama_jurusan == 'Sekretaris' ? 'selected' : '' }} value="Sekretaris">Sekretaris
                    </option>
                    <option {{ $jurusan->nama_jurusan == 'Komputer Akuntansi' ? 'selected' : '' }}
                        value="Komputer Akuntansi">Komputer Akuntansi</option>
                    <option {{ $jurusan->nama_jurusan == 'Manajemen Perkantoran' ? 'selected' : '' }}
                        value="Manajemen Perkantoran">Manajemen Perkantoran</option>
                    <option {{ $jurusan->nama_jurusan == 'Komunikasi Bisnis Digital' ? 'selected' : '' }}
                        value="Komunikasi Bisnis Digital">Komunikasi Bisnis Digital</option>
                </select>
                @error('nama_jurusan')
                <div class="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection