<?php

namespace Tests\Feature;

use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Prodi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_shows_real_statistics(): void
    {
        $prodi = Prodi::create([
            'kode_prodi' => 'TI',
            'nama_prodi' => 'Teknik Informatika',
            'jenjang' => 'S1',
            'status' => 'aktif',
        ]);

        Mahasiswa::create([
            'prodi_id' => $prodi->id,
            'nim' => '20230001',
            'nama' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'angkatan' => 2023,
            'status' => 'aktif',
            'no_hp' => '081234567890',
            'alamat' => 'Bandung',
        ]);

        Nilai::create([
            'mahasiswa_id' => 1,
            'kode_mk' => 'MK001',
            'nama_mk' => 'Pemrograman Web',
            'sks' => 3,
            'nilai_angka' => 85,
            'nilai_huruf' => 'A',
            'semester' => '1',
            'tahun_akademik' => 2023,
        ]);

        $response = $this->get(route('dashboard'));

        $response->assertOk();
        $response->assertSee('Total Program Studi', false);
        $response->assertSee('Total Mahasiswa', false);
        $response->assertSee('Total Data Nilai', false);
        $response->assertSee('class="h5 mb-0 font-weight-bold text-gray-800">1</div>', false);
    }
}
