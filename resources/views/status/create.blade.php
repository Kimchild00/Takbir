@extends('layout.master')
@section('title','hal create')
@section('status', 'active')

@section('Content')
<div class="container bg-white">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <form action="{{ route('status.store') }}" method='POST'>
                <h1 class="text-center">Form dah</h1>
                @csrf
                <div class="form-group">
                    <label for="nama_status">status</label>
                    <input type="text" class="form-control" id="nama_status" name="nama_status" value='{{ old('nama_status') }}'>
                    @error('nama_status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary mb-2">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection