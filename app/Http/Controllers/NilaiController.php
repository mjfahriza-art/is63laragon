<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = Nilai::with('mahasiswa.prodi')
            ->orderByDesc('tahun_akademik')
            ->orderBy('semester')
            ->paginate(10);
        $mahasiswas = Mahasiswa::orderBy('nama')->get();

        return view('nilai.index', compact('nilais', 'mahasiswas'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::orderBy('nama')->get();

        return view('nilai.create', compact('mahasiswas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'kode_mk' => 'required|string|max:10',
            'nama_mk' => 'required|string|max:100',
            'sks' => 'required|integer|min:1|max:6',
            'nilai_angka' => 'required|numeric|min:0|max:100',
            'semester' => 'required|string|max:10',
            'tahun_akademik' => 'required|integer|min:2000|max:2100',
        ]);

        $validated['nilai_huruf'] = Nilai::konversiHuruf((float) $validated['nilai_angka']);

        Nilai::create($validated);

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil ditambahkan!');
    }

    public function show(Nilai $nilai)
    {
        $nilai->load('mahasiswa.prodi');

        return view('nilai.show', compact('nilai'));
    }

    public function edit(Nilai $nilai)
    {
        $mahasiswas = Mahasiswa::orderBy('nama')->get();

        return view('nilai.edit', compact('nilai', 'mahasiswas'));
    }

    public function update(Request $request, Nilai $nilai)
    {
        $validated = $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'kode_mk' => 'required|string|max:10',
            'nama_mk' => 'required|string|max:100',
            'sks' => 'required|integer|min:1|max:6',
            'nilai_angka' => 'required|numeric|min:0|max:100',
            'semester' => 'required|string|max:10',
            'tahun_akademik' => 'required|integer|min:2000|max:2100',
        ]);

        $validated['nilai_huruf'] = Nilai::konversiHuruf((float) $validated['nilai_angka']);

        $nilai->update($validated);

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil diperbarui!');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil dihapus!');
    }
}
