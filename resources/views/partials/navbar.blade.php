{{-- Cek di resources/views/partials/navbar.blade.php --}}
{{-- Bagian modal logout — pastikan action sudah benar --}}
 
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Logout</h5>
                <button class="close" type="button" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin keluar dari sistem Simahaswa?
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button"
                        data-dismiss="modal">Batal</button>
                {{-- Form POST ke route logout — @csrf wajib ada --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sign-out-alt mr-1"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
 
{{-- Pastikan nama user tampil di dropdown --}}
<span class="mr-2 d-none d-lg-inline text-gray-600 small">
    {{ Auth::user()->name }}
</span>