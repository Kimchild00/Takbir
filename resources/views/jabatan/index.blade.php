@extends('layout.master')
@section('title','hal index')
@section('jabatan', 'active')

@section('Content')
      <a class="btn btn-primary" href="{{ route('jabatan.create') }}">Tambah</a>
      @if(session()->has('pesan'))
        <div class="alert alert-success">
          {{ session()->get('pesan') }}
        </div>
        {{-- @ifelse
        <div class="alert alert-success">
          {{ session()->get('hpus') }} --}}
        </div>
      @endif
      <table class="table table-striped table-bordered">
                
        <thead>
            <tr>
                <th>No</th>
                <th>Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jabatan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                @if($item->nama_jabatan === 'Fullstack')
                    <td>
                        <b class="badge badge-danger">{{$item->nama_jabatan }}</b>
                    </td>
                @elseif($item->nama_jabatan === 'Backend')
                    <td>
                        <b class="badge badge-info">{{$item->nama_jabatan }}</b>
                    </td>
                @else($item->nama_jabatan === 'Front')
                    <td>
                        <b class="badge badge-secondary">{{$item->nama_jabatan }}</b>
                    </td>
                @endif
                <td>
                    <div class="btn-group">
                    <a href="{{ route('jabatan.edit',$item->id,'edit') }}" class="btn">
                        <i class="fa fa-edit mr-3"></i>
                    </a>
                    <div class="btn">
                        <form action="{{ route('jabatan.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="fa fa-trash"></button>
                        </form>
                    </div>
                    </div>
                </td>
            @empty
                <td class="text-center" colspan="6"></td>
            </tr>
            @endforelse
        </tbody>
    </table>


      @endsection