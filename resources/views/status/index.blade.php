@extends('layout.master')
@section('title','hal index')
@section('status', 'active')
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
      <table class="table table-striped table-bordered">
                
        <thead>
            <tr>
                <th>No</th>
                <th>Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($status as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                @if($item->nama_status === 'Jombs')
                    <td>
                        <b class="badge badge-danger">{{$item->nama_status }}</b>
                    </td>
                @elseif($item->nama_status === 'nikah')
                    <td>
                        <b class="badge badge-info">{{$item->nama_status }}</b>
                    </td>
                @elseif($item->nama_status === 'Lajang')
                    <td>
                        <b class="badge badge-secondary">{{$item->nama_status }}</b>
                    </td>
                @elseif($item->nama_status === 'D3')
                    <td>
                        <b class="badge badge-warning">{{$item->nama_status }}</b>
                    </td>
                @elseif($item->nama_status === 'S1')
                    <td>
                        <b class="badge badge-success">{{$item->nama_status }}</b>
                    </td>
                @elseif($item->nama_status === 'S2')
                <td>
                    <b class="badge badge-light">{{$item->nama_status }}</b>
                </td>
                @elseif($item->nama_status === 'S3')
                <td>
                    <b class="badge badge-dark">{{$item->nama_status }}</b>
                </td>
                @endif
                <td>
                    <div class="btn-group">
                    <a href="{{ route('status.edit',$item->id,'edit') }}" class="btn">
                        <i class="fa fa-edit mr-3"></i>
                    </a>
                    <div class="btn">
                        <form action="{{ route('status.destroy',$item->id) }}" method="POST">
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