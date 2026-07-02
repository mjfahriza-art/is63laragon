@extends('layouts.app')

@section('title', 'Edit Mahasiswa')
@section('page-title', 'Edit Mahasiswa')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('mahasiswa.update', $mahasiswa) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="prodi_id">Program Studi</label>
                        <select class="form-control" id="prodi_id" name="prodi_id" required>
                            <option value="">-- Pilih Prodi --</option>
                            @foreach($prodis as $prodi)
                                <option value="{{ $prodi->id }}" {{ old('prodi_id', $mahasiswa->prodi_id) == $prodi->id ? 'selected' : '' }}>{{ $prodi->nama_prodi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $mahasiswa->email) }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="angkatan">Angkatan</label>
                        <input type="number" class="form-control" id="angkatan" name="angkatan" value="{{ old('angkatan', $mahasiswa->angkatan) }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="aktif" {{ old('status', $mahasiswa->status) === 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="cuti" {{ old('status', $mahasiswa->status) === 'cuti' ? 'selected' : '' }}>Cuti</option>
                            <option value="lulus" {{ old('status', $mahasiswa->status) === 'lulus' ? 'selected' : '' }}>Lulus</option>
                            <option value="dropout" {{ old('status', $mahasiswa->status) === 'dropout' ? 'selected' : '' }}>Dropout</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="no_hp">No. HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $mahasiswa->no_hp) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat', $mahasiswa->alamat) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control-file" id="foto" name="foto">
                    @if($mahasiswa->foto)
                        <small class="form-text text-muted">Foto saat ini: {{ $mahasiswa->foto }}</small>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
