@extends('layout.master')
@section('title','hal create')
@section('Content')

<div class="container bg-white">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <h1 class="h2 mr-auto">Biodata {{ $p->nama }}</h1>
            {{-- <a href="{{ route('kprakerja.update', ['kprakerja' => $kprakerja->id]) }}" class="btn btn-primary">EDIT</a> --}}
            <a href="{{ url('karyawan/'. $karyawan->id . '/edit') }}" class="btn btn-primary">EDIT</a>

            <form action="{{ route('karyawan.destroy', ['karyawan' => $karyawan->id]) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger mt-3">Hapus</button>
            </form>
        </div>
        <hr>
        <ul>
            <li>No Ktp: {{ $karyawan->nama }}</li>
            <li>Nama: {{ $karyawan->alamat }}</li>
            <li>alamat: {{ $karyawan->gender }}</li>
            <li>Nama Ortu: {{ $karyawan->no_telp }}</li>
            <li>nominal: {{ $karyawan->janggal }}</li>
            <li>program: {{ $karyawan->jabatan->nama_jabatan }}</li>
            <li>program: {{ $karyawan->status->nama_status }}</li>
            <li>program: {{ $karyawan->pendidikan->nama_pendidikan }}</li>
            {{-- <li><img src="{{ Storage::url($kprakerja->foto) }}" alt="" style="width:150px;"</li> --}}
        </ul>
    </div>
</div>


@endsection