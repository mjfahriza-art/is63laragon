@extends('layout.master')
@section('title')
Data Jurusan
@endsection

@section('judul')
Data Jurusan
@endsection

@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><a href="/jurusan/tambah" class="btn btn-primary">Tambah
                Data</a></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jurusan as $x)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $x->kode_jurusan }}</td>
                        <td>{{ $x->nama_jurusan }}</td>
                        <td>
                            <a href="/jurusan/edit/{{ $x->id }}" class="btn btn-outline-info">Edit</a>

                            <form onclick="return confirm('Yakin ingin menghapus data ini?')" action="
                                /jurusan/{{ $x->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger" type="submit">Hapus</button>
                            </form>

                            <!-- <a href="/jurusan/hapus/{{ $x->id }}" class="btn btn-outline-danger"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a> -->
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Data jurusan tidak ditemukan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
Swal.fire({
    icon: "success",
    title: "BERHASIL",
    text: "{{ session('success') }}",
    showConfirmButton: false,
    timer: 2000
});
</script>
@endif
@if(session('error'))
<script>
Swal.fire({
    icon: "error",
    title: "GAGAL!",
    text: "{{ session('error') }}",
    showConfirmButton: false,
    timer: 2000
});
</script>
@endif

@endsection