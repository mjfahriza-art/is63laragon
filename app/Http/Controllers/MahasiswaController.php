<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //disini hasil eksekusi dari klik tombol tambah data di form mahasiswa.index
        return view('mahasiswa.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //disini hasil eksekusi dari klik tombol simpan data di form mahasiswa.form
        //kita akan menampilkan data yang di input di form mahasiswa.form
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|numeric|digitsBetween:12,12',
            'jurusan' => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'nohp'          => 'required',
            'domisili'      => 'required',
            'jenis_kelamin' => 'required',
            'tahun_masuk'   => 'required',
        ]);

        $mahasiswa = Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nohp' => $request->nohp,
            'domisili' => $request->domisili,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect('/mahasiswa')->with(['success' => 'Data mahasiswa berhasil ditambahkan.']);
        //return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //disini hasil eksekusi dari klik tombol edit data di form mahasiswa.index
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //disini hasil eksekusi dari klik tombol simpan perubahan data di form mahasiswa.edit
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|numeric|digitsBetween:12,12',
            'jurusan' => 'required',
        ]);
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nohp' => $request->nohp,
            'domisili' => $request->domisili,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect('/mahasiswa')->with(['success' => 'Data mahasiswa berhasil diperbarui.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();

        return redirect('/mahasiswa')->with(['success' => 'Data mahasiswa berhasil dihapus.']);
    }
}