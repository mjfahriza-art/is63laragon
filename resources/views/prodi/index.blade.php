@extends('layouts.app')

@section('title', 'Program Studi')
@section('page-title', 'Program Studi')
@section('page-action')
    <a href="{{ route('prodi.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus mr-2"></i>Tambah Prodi
    </a>
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Kode</th>
                            <th>Nama Prodi</th>
                            <th>Jenjang</th>
                            <th>Status</th>
                            <th>Mahasiswa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($prodis as $prodi)
                            <tr>
                                <td>{{ $prodi->kode_prodi }}</td>
                                <td>{{ $prodi->nama_prodi }}</td>
                                <td>{{ $prodi->jenjang }}</td>
                                <td>
                                    <span class="badge badge-{{ $prodi->status === 'aktif' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($prodi->status) }}
                                    </span>
                                </td>
                                <td>{{ $prodi->mahasiswas_count }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('prodi.show', $prodi) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('prodi.edit', $prodi) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('prodi.destroy', $prodi) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus data ini?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada data program studi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $prodis->links() }}
        </div>
    </div>
@endsection
