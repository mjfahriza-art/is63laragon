{{-- resources/views/prodi/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detail Program Studi')
@section('page-title', 'Detail Program Studi')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Informasi Program Studi</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3"><strong>Kode Prodi:</strong> {{ $prodi->kode_prodi }}</div>
            <div class="col-md-6 mb-3"><strong>Nama Prodi:</strong> {{ $prodi->nama_prodi }}</div>
            <div class="col-md-6 mb-3"><strong>Jenjang:</strong> {{ $prodi->jenjang }}</div>
            <div class="col-md-6 mb-3"><strong>Status:</strong> <span class="badge badge-{{ $prodi->status == 'aktif' ? 'success' : 'secondary' }}">{{ ucfirst($prodi->status) }}</span></div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Angkatan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mahasiswas as $mhs)
                        <tr>
                            <td>{{ $mhs->nim }}</td>
                            <td>{{ $mhs->nama }}</td>
                            <td>{{ $mhs->angkatan }}</td>
                            <td><span class="badge badge-{{ $mhs->status_label }}">{{ ucfirst($mhs->status) }}</span></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada mahasiswa pada prodi ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $mahasiswas->links() }}
        </div>
    </div>
</div>
@endsection
