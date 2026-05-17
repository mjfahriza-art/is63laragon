<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jurusan = Jurusan::all();
        return view('jurusan.index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //disini hasil eksekusi dari klik tombol tambah data di form jurusan.index
        return view('jurusan.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //disini hasil eksekusi dari klik tombol simpan data di form jurusan.form
        //kita akan menampilkan data yang di input di form jurusan.form
        $request->validate([
            'kode_jurusan' => 'required',
            'nama_jurusan' => 'required',
        ]);

        $jurusan = Jurusan::create([
            'kode_jurusan' => $request->kode_jurusan,
            'nama_jurusan' => $request->nama_jurusan,
        ]);

        return redirect('/jurusan')->with(['success' => 'Data jurusan berhasil ditambahkan.']);
        //return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil ditambahkan.');
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
        //disini hasil eksekusi dari klik tombol edit data di form jurusan.index
        $jurusan = Jurusan::find($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //disini hasil eksekusi dari klik tombol simpan perubahan data di form jurusan.edit
        $request->validate([
            'kode_jurusan' => 'required',
            'nama_jurusan' => 'required',
        ]);
        $jurusan = Jurusan::find($id);
        $jurusan->update([
            'kode_jurusan' => $request->kode_jurusan,
            'nama_jurusan' => $request->nama_jurusan,
        ]);

        return redirect('/jurusan')->with(['success' => 'Data jurusan berhasil diperbarui.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $jurusan = Jurusan::find($id);
        $jurusan->delete();

        return redirect('/jurusan')->with(['success' => 'Data jurusan berhasil dihapus.']);
    }
}