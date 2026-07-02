@extends('layouts.app')

@section('title', 'Nilai Mahasiswa')
@section('page-title', 'Nilai Mahasiswa')
@section('page-action')
    <a href="{{ route('nilai.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus mr-2"></i>Tambah Nilai
    </a>
@endsection

@section('content')
    <div class="card shadow mb-4">
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
                            <th>Semester</th>
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
                                <td>{{ $nilai->semester }} ({{ $nilai->tahun_akademik }})</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('nilai.show', $nilai) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('nilai.edit', $nilai) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('nilai.destroy', $nilai) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus data ini?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">Belum ada data nilai.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $nilais->links() }}
        </div>
    </div>
@endsection
