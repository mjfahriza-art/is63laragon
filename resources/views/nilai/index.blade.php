{{-- resources/views/nilai/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Data Nilai')
@section('page-title', 'Data Nilai')

@section('page-action')
    <a href="{{ route('nilai.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus mr-1"></i> Tambah Nilai
    </a>
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Nilai Mahasiswa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Mahasiswa</th>
                        <th>Kode MK</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Nilai Angka</th>
                        <th>Nilai Huruf</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($nilais as $nilai)
                        <tr>
                            <td>{{ $nilai->mahasiswa->nama ?? '-' }}</td>
                            <td>{{ $nilai->kode_mk }}</td>
                            <td>{{ $nilai->nama_mk }}</td>
                            <td>{{ $nilai->sks }}</td>
                            <td>{{ $nilai->nilai_angka }}</td>
                            <td>{{ $nilai->nilai_huruf }}</td>
                            <td>
                                <a href="{{ route('nilai.edit', $nilai) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('nilai.destroy', $nilai) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Belum ada data nilai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $nilais->links() }}
        </div>
    </div>
</div>
@endsection
