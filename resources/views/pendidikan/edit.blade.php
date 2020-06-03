@extends('layout.master')
@section('pendidikan', 'active')
@section('title','hal index')
@section('Content')

<section class="content mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>Form Edit Data Pendidikan</h3>
            </div>
        </div>
       <hr>
       <div class="row">
           <div class="col-md-5">
               <form action="{{ route('pendidikan.update',$pendidikan->id) }}" method="post">
                    @csrf 
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_pendidikan">Nama pendidikan</label>
                        <select name="nama_pendidikan" id="nama_pendidikan" class="form-control @error('nama_pendidikan') is-invalid @enderror">
                            @foreach($isi as $item)
                                <option value="{{ $item }}" {{ $pendidikan->nama_pendidikan === $item ? 'selected' : '' }}>{{ $item }}</option>
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
       </div>
    </div>
</section>

@endsection