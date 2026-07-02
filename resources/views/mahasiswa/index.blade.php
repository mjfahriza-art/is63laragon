@extends('layouts.app')

@section('title', 'Mahasiswa')
@section('page-title', 'Mahasiswa')
@section('page-action')
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus mr-2"></i>Tambah Mahasiswa
    </a>
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="GET" class="form-inline mb-3">
                <input type="text" name="search" class="form-control mr-2" placeholder="Cari NIM / Nama" value="{{ request('search') }}">
                <select name="status" class="form-control mr-2">
                    <option value="">-- Status --</option>
                    <option value="aktif" {{ request('status') === 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="cuti" {{ request('status') === 'cuti' ? 'selected' : '' }}>Cuti</option>
                    <option value="lulus" {{ request('status') === 'lulus' ? 'selected' : '' }}>Lulus</option>
                    <option value="dropout" {{ request('status') === 'dropout' ? 'selected' : '' }}>Dropout</option>
                </select>
                <select name="prodi_id" class="form-control mr-2">
                    <option value="">-- Prodi --</option>
                    @foreach($prodis as $prodi)
                        <option value="{{ $prodi->id }}" {{ request('prodi_id') == $prodi->id ? 'selected' : '' }}>{{ $prodi->nama_prodi }}</option>
                    @endforeach
                </select>
                <input type="number" name="angkatan" class="form-control mr-2" placeholder="Angkatan" value="{{ request('angkatan') }}">
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Angkatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mahasiswas as $mahasiswa)
                            <tr>
                                <td>{{ $mahasiswa->nim }}</td>
                                <td>{{ $mahasiswa->nama }}</td>
                                <td>{{ $mahasiswa->prodi->nama_prodi ?? '-' }}</td>
                                <td>{{ $mahasiswa->angkatan }}</td>
                                <td>
                                    <span class="badge badge-{{ $mahasiswa->status === 'aktif' ? 'success' : ($mahasiswa->status === 'cuti' ? 'warning' : ($mahasiswa->status === 'lulus' ? 'info' : 'danger')) }}">{{ ucfirst($mahasiswa->status) }}</span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('mahasiswa.show', $mahasiswa) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('mahasiswa.edit', $mahasiswa) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('mahasiswa.destroy', $mahasiswa) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus data ini?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada data mahasiswa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $mahasiswas->links() }}
        </div>
    </div>
@endsection
