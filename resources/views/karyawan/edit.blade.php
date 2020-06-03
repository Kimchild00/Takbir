@extends('layout.master')
@section('title','hal edit')
@section('karyawan', 'active')
@section('Content')
<div class="container bg-white">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <form action="{{ route('karyawan.update',$karyawan->id) }}" method='POST' enctype="multipart/form-data">
                <h1 class="text-center">Form dah</h1>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value='{{ old('nama') ?? $karyawan->nama }}'>
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">alamat</label>
                    <textarea type="text" class="form-control" id="alamat" name="alamat" value=''>{{ old('alamat') ?? $karyawan->alamat }} </textarea>
                    @error('alamat')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gender">jenis kelamin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="gender" id="laki-laki" value="Laki-laki" {{ $karyawan->gender == 'Laki-laki' ? 'checked' : '' }}>
                    <label for="Laki-laki" class="form-check-input">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="gender" id="perempuan" value="Perempuan" {{ $karyawan->gender == 'Perempuan' ? 'checked' : '' }}>
                    <label for="Perempuan" class="form-check-input">Perempuan</label>
                </div>
                @error('gender')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                {{-- <div class="col">
                    <label for="gender">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                        <option value="Laki-Laki" {{ $karyawan->gender  == 'Laki-Laki' 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ $karyawan->gender  == 'Perempuan' 'selected' : '' }}>Perempuan</option> --}}
                        {{-- <option value="Laki-Laki" {{ old('gender') == $karyawan->gender ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ old('gender') == $karyawan->gender ? 'selected' : '' }}>Perempuan</option> --}}
                        {{-- @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </select>
                </div> --}}



                <div class="form-group">
                    <label for="no_telp">no telpon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value='{{ old('no_telp') ?? $karyawan->no_telp }}'>
                    @error('no_telp')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal">tanggal lahir</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value='{{ old('tanggal') ?? $karyawan->tanggal }}'>
                    @error('tanggal')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tgl_masuk">tanggal masuk</label>
                    <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" value='{{ old('tgl_masuk') ??$karyawan->tgl_masuk }}'>
                    @error('tgl_masuk')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jabatan_id">jabatan</label>
                    <select name="jabatan_id" id="jabatan_id" class="form-control"> --}}
                        @foreach ($jabatan as $jabatans)
                        {{-- <option value="{{ $jabatans->id }}" {{ old('jabatan_id') == "$jabatans->nama_jabatan" ? 'selected' : '' }}>{{ $jabatans->nama_jabatan }}</option> --}}
                        <option value="{{ $jabatans->id }}" {{ old('jabatan_id') ?? $karyawan->jabatan_id === $jabatans->id ? 'selected' : '' }}>{{ $jabatans->nama_jabatan }}</option>
                        @endforeach
                    </select>
                    @error('jabatan_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pendidikan_id">pendidikan</label>
                    <select name="pendidikan_id" id="pendidikan_id" class="form-control">
                        @foreach ($pendidikan as $pendidikans)
                            <option value="{{ $pendidikans->id }}" {{ old('pendidikan_id') ?? $karyawan->pendidikan_id === $pendidikans->id ? 'selected' : '' }}>{{ $pendidikans->nama_pendidikan }}</option>
                        @endforeach
                    </select>
                    @error('pendidikan_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status_id">status</label>
                    <select name="status_id" id="status_id" class="form-control"> --}}
                        @foreach ($status as $statuss)
                            <option value="{{ $statuss->id }}" {{ old('status_id') ?? $karyawan->status_id === $statuss->id ? 'selected' : '' }}>{{ $statuss->nama_status }}</option>
                        @endforeach
                    </select>
                    @error('status_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary mb-2">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection