{{-- resources/views/mahasiswa/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detail Mahasiswa')
@section('page-title', 'Detail Mahasiswa')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profil Mahasiswa</h6>
            </div>
            <div class="card-body text-center">
                @if($mahasiswa->foto)
                    <img src="{{ asset('storage/' . $mahasiswa->foto) }}" class="img-fluid rounded-circle mb-3" style="width: 180px; height: 180px; object-fit: cover;">
                @else
                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mb-3" style="width: 180px; height: 180px; margin: 0 auto;">
                        <i class="fas fa-user fa-4x text-gray-400"></i>
                    </div>
                @endif
                <h4 class="font-weight-bold">{{ $mahasiswa->nama }}</h4>
                <p class="text-muted mb-2">{{ $mahasiswa->nim }}</p>
                <span class="badge badge-{{ $mahasiswa->status_label }}">{{ ucfirst($mahasiswa->status) }}</span>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pribadi</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3"><strong>Program Studi:</strong> {{ $mahasiswa->prodi->nama_prodi ?? '-' }}</div>
                    <div class="col-md-6 mb-3"><strong>Angkatan:</strong> {{ $mahasiswa->angkatan }}</div>
                    <div class="col-md-6 mb-3"><strong>Email:</strong> {{ $mahasiswa->email }}</div>
                    <div class="col-md-6 mb-3"><strong>No. HP:</strong> {{ $mahasiswa->no_hp ?? '-' }}</div>
                    <div class="col-md-12 mb-3"><strong>Alamat:</strong> {{ $mahasiswa->alamat ?? '-' }}</div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Riwayat Nilai</h6>
            </div>
            <div class="card-body">
                @if($mahasiswa->nilais->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Kode MK</th>
                                    <th>Mata Kuliah</th>
                                    <th>SKS</th>
                                    <th>Nilai</th>
                                    <th>Huruf</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mahasiswa->nilais as $nilai)
                                    <tr>
                                        <td>{{ $nilai->kode_mk }}</td>
                                        <td>{{ $nilai->nama_mk }}</td>
                                        <td>{{ $nilai->sks }}</td>
                                        <td>{{ $nilai->nilai_angka }}</td>
                                        <td>{{ $nilai->nilai_huruf }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted mb-0">Belum ada data nilai.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
