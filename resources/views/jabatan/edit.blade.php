@extends('layout.master')
@section('title','hal create')
@section('jabatan', 'active')

@section('Content')
<div class="container bg-white">
    <div class="row">
        <div class="col-md-5">
            <form action="{{ route('jabatan.update', $jabatan->id) }}" method="post">
                 @csrf 
                 @method('PUT')
                 <div class="form-group">
                     <label for="nama_jabatan">Nama jabatan</label>
                     <select name="nama_jabatan" id="nama_jabatan" class="form-control @error('nama_jabatan') is-invalid @enderror">
                         @foreach($isi as $item)
                             <option value="{{ $item }}" {{ $jabatan->nama_jabatan === $item ? 'selected' : '' }}>{{ $item }}</option>
                         @endforeach
                     </select>
                     @error('nama_penpendidikan')
                         <div class="text-danger">
                             {{ $message }}
                         </div>
                     @enderror
                 </div>
                 <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        {{-- <div class="col-md-12">
            <hr>
            <form action="{{ route('jabatan.store') }}" method='POST'>
                <h1 class="text-center">Form dah</h1>
                @csrf
                <div class="form-group">
                    <label for="nama_jabatan">jabatan</label>
                    <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" value='{{ old('nama_jabatan') }}'>
                    @error('nama_jabatan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mb-2">Simpan</button>
            </form>
        </div> --}}
    </div>
</div>

@endsection