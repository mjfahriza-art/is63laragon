@extends('layouts.app')

@section('title', 'Detail Nilai')
@section('page-title', 'Detail Nilai')
@section('page-action')
    <a href="{{ route('nilai.edit', $nilai) }}" class="btn btn-warning btn-sm">Edit</a>
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <p><strong>Mahasiswa:</strong> {{ $nilai->mahasiswa->nama ?? '-' }}</p>
            <p><strong>Kode MK:</strong> {{ $nilai->kode_mk }}</p>
            <p><strong>Mata Kuliah:</strong> {{ $nilai->nama_mk }}</p>
            <p><strong>SKS:</strong> {{ $nilai->sks }}</p>
            <p><strong>Nilai Angka:</strong> {{ $nilai->nilai_angka }}</p>
            <p><strong>Nilai Huruf:</strong> {{ $nilai->nilai_huruf }}</p>
            <p><strong>Semester:</strong> {{ $nilai->semester }}</p>
            <p><strong>Tahun Akademik:</strong> {{ $nilai->tahun_akademik }}</p>
        </div>
    </div>
@endsection
