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
        <form method="POST" action="/jurusan">
            @csrf
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Kode Jurusan</label>
                <input type="text" name="kode_jurusan" class="form-control @error('kode_jurusan') is-invalid @enderror"
                    id="exampleinputEmaill" aria-describedby="emailHelp">
                @error('kode_jurusan')
                <div class="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jurusan</label>
                {{-- < class="form-control @error('jurusan') is-invalid @enderror" name="jurusan"> --}}
                <select name="nama_jurusan" class="form-control @error('nama_jurusan') is-invalid @enderror" id="">
                    <option value="">--Pilih Jurusan--</option>
                    <option value="Informatika Komputer">Informatika</option>
                    <option value="Sekretaris">Sistem Informasi</option>
                    <option value="Komputer Akuntansi">Komputer Akuntansi</option>
                    <option value="Digital Bisnis">Digital Bisnis</option>
                    <option value="Manajemen">Manajemen</option>
                </select>
                @error('nama_jurusan')
                <div class="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tambah Data Baru</button>
        </form>
    </div>
</div>
@endsection