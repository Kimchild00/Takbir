@extends('layout.master')
@section('pendidikan', 'active')
@section('title','hal index')
@section('Content')
      <a class="btn btn-primary" href="{{ route('pendidikan.create') }}">Tambah</a>
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
            <table class="table table-striped table-bordered">
                
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pendidikan</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendidikan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        @if($item->nama_pendidikan === 'SD')
                            <td>
                                <b class="badge badge-danger">{{$item->nama_pendidikan }}</b>
                            </td>
                        @elseif($item->nama_pendidikan === 'SMP')
                            <td>
                                <b class="badge badge-info">{{$item->nama_pendidikan }}</b>
                            </td>
                        @elseif($item->nama_pendidikan === 'SMA/SMK')
                            <td>
                                <b class="badge badge-secondary">{{$item->nama_pendidikan }}</b>
                            </td>
                        @elseif($item->nama_pendidikan === 'D3')
                            <td>
                                <b class="badge badge-warning">{{$item->nama_pendidikan }}</b>
                            </td>
                        @elseif($item->nama_pendidikan === 'S1')
                            <td>
                                <b class="badge badge-success">{{$item->nama_pendidikan }}</b>
                            </td>
                        @elseif($item->nama_pendidikan === 'S2')
                        <td>
                            <b class="badge badge-light">{{$item->nama_pendidikan }}</b>
                        </td>
                        @elseif($item->nama_pendidikan === 'S3')
                        <td>
                            <b class="badge badge-dark">{{$item->nama_pendidikan }}</b>
                        </td>
                        @endif
                        <td>
                            <div class="btn-group">
                            <a href="{{ route('pendidikan.edit',$item->id,'edit') }}" class="btn">
                                <i class="fa fa-edit mr-3"></i>
                            </a>
                            <div class="btn">
                                <form action="{{ route('pendidikan.destroy',$item->id) }}" method="POST">
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
    
            
    
        </div>
    </section>




      @endsection