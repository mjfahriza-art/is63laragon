{{-- resources/views/nilai/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Tambah Nilai')
@section('page-title', 'Tambah Nilai')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Nilai</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('nilai.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="mahasiswa_id">Mahasiswa</label>
                    <select name="mahasiswa_id" id="mahasiswa_id" class="form-control @error('mahasiswa_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Mahasiswa --</option>
                        @foreach($mahasiswas as $mahasiswa)
                            <option value="{{ $mahasiswa->id }}" {{ old('mahasiswa_id') == $mahasiswa->id ? 'selected' : '' }}>{{ $mahasiswa->nama }} ({{ $mahasiswa->nim }})</option>
                        @endforeach
                    </select>
                    @error('mahasiswa_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kode_mk">Kode Mata Kuliah</label>
                    <input type="text" name="kode_mk" id="kode_mk" class="form-control @error('kode_mk') is-invalid @enderror" value="{{ old('kode_mk') }}" required>
                    @error('kode_mk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nama_mk">Nama Mata Kuliah</label>
                    <input type="text" name="nama_mk" id="nama_mk" class="form-control @error('nama_mk') is-invalid @enderror" value="{{ old('nama_mk') }}" required>
                    @error('nama_mk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sks">SKS</label>
                    <input type="number" name="sks" id="sks" class="form-control @error('sks') is-invalid @enderror" value="{{ old('sks') }}" required>
                    @error('sks')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nilai_angka">Nilai Angka</label>
                    <input type="number" step="0.01" name="nilai_angka" id="nilai_angka" class="form-control @error('nilai_angka') is-invalid @enderror" value="{{ old('nilai_angka') }}" required>
                    @error('nilai_angka')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nilai_huruf">Nilai Huruf</label>
                    <input type="text" name="nilai_huruf" id="nilai_huruf" class="form-control @error('nilai_huruf') is-invalid @enderror" value="{{ old('nilai_huruf') }}" required>
                    @error('nilai_huruf')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="semester">Semester</label>
                    <input type="number" name="semester" id="semester" class="form-control @error('semester') is-invalid @enderror" value="{{ old('semester') }}" required>
                    @error('semester')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="tahun_akademik">Tahun Akademik</label>
                    <input type="number" name="tahun_akademik" id="tahun_akademik" class="form-control @error('tahun_akademik') is-invalid @enderror" value="{{ old('tahun_akademik') }}" required>
                    @error('tahun_akademik')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
