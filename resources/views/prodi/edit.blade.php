@extends('layouts.app')

@section('title', 'Edit Program Studi')
@section('page-title', 'Edit Program Studi')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('prodi.update', $prodi) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="kode_prodi">Kode Prodi</label>
                        <input type="text" class="form-control" id="kode_prodi" name="kode_prodi" value="{{ old('kode_prodi', $prodi->kode_prodi) }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nama_prodi">Nama Prodi</label>
                        <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" value="{{ old('nama_prodi', $prodi->nama_prodi) }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="jenjang">Jenjang</label>
                        <select class="form-control" id="jenjang" name="jenjang" required>
                            <option value="D3" {{ old('jenjang', $prodi->jenjang) === 'D3' ? 'selected' : '' }}>D3</option>
                            <option value="S1" {{ old('jenjang', $prodi->jenjang) === 'S1' ? 'selected' : '' }}>S1</option>
                            <option value="S2" {{ old('jenjang', $prodi->jenjang) === 'S2' ? 'selected' : '' }}>S2</option>
                            <option value="S3" {{ old('jenjang', $prodi->jenjang) === 'S3' ? 'selected' : '' }}>S3</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="aktif" {{ old('status', $prodi->status) === 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ old('status', $prodi->status) === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('prodi.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
