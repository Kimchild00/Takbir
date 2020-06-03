@extends('layout.master')
@section('status', 'active')
@section('title','hal index')
@section('Content')
      <a class="btn btn-primary" href="{{ route('status.create') }}">Tambah</a>
      @if(session()->has('pesan'))
        <div class="alert alert-success">
          {{ session()->get('pesan') }}
        </div>
        {{-- @ifelse
        <div class="alert alert-success">
          {{ session()->get('hpus') }} --}}
        </div>
      @endif



      <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <form action="{{ route('status.update',$status->id) }}" method="post">
                         @csrf 
                         @method('PUT')
                         <div class="form-group">
                             <label for="nama_status">Nama status</label>
                             <select name="nama_status" id="nama_status" class="form-control @error('nama_status') is-invalid @enderror">
                                 @foreach($isi as $item)
                                     <option value="{{ $item }}" {{ $status->status === $item ? 'selected' : '' }}>{{ $item }}</option>
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