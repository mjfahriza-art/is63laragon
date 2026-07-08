{{-- resources/views/prodi/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Data Program Studi')
@section('page-title', 'Data Program Studi')

@section('page-action')
    <a href="{{ route('prodi.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus mr-1"></i> Tambah Prodi
    </a>
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Program Studi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Kode Prodi</th>
                        <th>Nama Prodi</th>
                        <th>Jenjang</th>
                        <th>Status</th>
                        <th>Jumlah Mahasiswa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prodis as $prodi)
                        <tr>
                            <td>{{ $prodi->kode_prodi }}</td>
                            <td>{{ $prodi->nama_prodi }}</td>
                            <td>{{ $prodi->jenjang }}</td>
                            <td><span class="badge badge-{{ $prodi->status == 'aktif' ? 'success' : 'secondary' }}">{{ ucfirst($prodi->status) }}</span></td>
                            <td>{{ $prodi->mahasiswas_count }}</td>
                            <td>
                                <a href="{{ route('prodi.show', $prodi) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('prodi.edit', $prodi) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('prodi.destroy', $prodi) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
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
        <div class="mt-3">
            {{ $prodis->links() }}
        </div>
    </div>
</div>
@endsection
