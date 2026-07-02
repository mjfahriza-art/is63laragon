@extends('layouts.app')

@section('title', 'Detail Mahasiswa')
@section('page-title', 'Detail Mahasiswa')
@section('page-action')
    <a href="{{ route('mahasiswa.edit', $mahasiswa) }}" class="btn btn-warning btn-sm">Edit</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow mb-4">
                <div class="card-body text-center">
                    <h5 class="font-weight-bold">{{ $mahasiswa->nama }}</h5>
                    <p class="text-muted mb-2">{{ $mahasiswa->nim }}</p>
                    <p class="mb-2"><strong>Prodi:</strong> {{ $mahasiswa->prodi->nama_prodi ?? '-' }}</p>
                    <p class="mb-2"><strong>Angkatan:</strong> {{ $mahasiswa->angkatan }}</p>
                    <p class="mb-2"><strong>Status:</strong> <span class="badge badge-{{ $mahasiswa->status === 'aktif' ? 'success' : ($mahasiswa->status === 'cuti' ? 'warning' : ($mahasiswa->status === 'lulus' ? 'info' : 'danger')) }}">{{ ucfirst($mahasiswa->status) }}</span></p>
                    <p class="mb-0"><strong>Email:</strong> {{ $mahasiswa->email }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-chart-bar mr-2"></i>Riwayat Nilai</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Kode MK</th>
                                    <th>Mata Kuliah</th>
                                    <th>SKS</th>
                                    <th>Nilai Angka</th>
                                    <th>Nilai Huruf</th>
                                    <th>Semester</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($mahasiswa->nilais as $nilai)
                                    <tr>
                                        <td>{{ $nilai->kode_mk }}</td>
                                        <td>{{ $nilai->nama_mk }}</td>
                                        <td>{{ $nilai->sks }}</td>
                                        <td>{{ $nilai->nilai_angka }}</td>
                                        <td>{{ $nilai->nilai_huruf }}</td>
                                        <td>{{ $nilai->semester }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Belum ada data nilai.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
