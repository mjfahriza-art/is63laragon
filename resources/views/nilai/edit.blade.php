@extends('layouts.app')

@section('title', 'Edit Nilai')
@section('page-title', 'Edit Nilai')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('nilai.update', $nilai) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="mahasiswa_id">Mahasiswa</label>
                        <select class="form-control" id="mahasiswa_id" name="mahasiswa_id" required>
                            <option value="">-- Pilih Mahasiswa --</option>
                            @foreach($mahasiswas as $mahasiswa)
                                <option value="{{ $mahasiswa->id }}" {{ old('mahasiswa_id', $nilai->mahasiswa_id) == $mahasiswa->id ? 'selected' : '' }}>{{ $mahasiswa->nama }} ({{ $mahasiswa->nim }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="kode_mk">Kode Mata Kuliah</label>
                        <input type="text" class="form-control" id="kode_mk" name="kode_mk" value="{{ old('kode_mk', $nilai->kode_mk) }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama_mk">Nama Mata Kuliah</label>
                        <input type="text" class="form-control" id="nama_mk" name="nama_mk" value="{{ old('nama_mk', $nilai->nama_mk) }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sks">SKS</label>
                        <input type="number" class="form-control" id="sks" name="sks" value="{{ old('sks', $nilai->sks) }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nilai_angka">Nilai Angka</label>
                        <input type="number" step="0.01" class="form-control" id="nilai_angka" name="nilai_angka" value="{{ old('nilai_angka', $nilai->nilai_angka) }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="semester">Semester</label>
                        <input type="text" class="form-control" id="semester" name="semester" value="{{ old('semester', $nilai->semester) }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tahun_akademik">Tahun Akademik</label>
                        <input type="number" class="form-control" id="tahun_akademik" name="tahun_akademik" value="{{ old('tahun_akademik', $nilai->tahun_akademik) }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
