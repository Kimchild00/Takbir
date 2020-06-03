@extends('layout.master')
@section('title','hal index')
@section('karyawan', 'active')
@section('Content')
      <a class="btn btn-primary" href="{{ route('karyawan.create') }}">Tambah</a>
      @if(session()->has('pesan'))
        <div class="alert alert-success">
          {{ session()->get('pesan') }}
        </div>
        {{-- @ifelse
        <div class="alert alert-success">
          {{ session()->get('hpus') }} --}}
        </div>
      @endif
      <table class="table table-striped display responsive nowrap responsive" style="width:100%" id="example">
        <thead>
          <tr>
            <th></th>
            <th>no</th>
            <th>nama</th>
            <th>alamat</th>
            <th>gender</th>
            <th>no_telp</th>
            <th>tanggal lahir</th>
            <th>tanggal masuk</th>
            <th>Detail</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($karyawan as $data)
          <tr>
            <th></th>
            <th>{{ $data->id }}</th>
            <th>{{ $data->nama }}</th>
            <td>{{ $data->alamat }}</td>
            <td>{{ $data->gender }}</td>
            <td>{{ $data->no_telp }}</td>
            <td>{{ $data->tanggal }}</td>
            <td>{{ $data->tgl_masuk }} </td>  
            <td>
              Biotada Karyawan di perusahaan PT.ga tau lagi ini dimana, yang jelas orang orang ini sangat meyakinkan karena dari yang terbaik untuk yang terbaik, sebagai berikut <br>
              Jabatan tertinggi = {{ $data->jabatan->nama_jabatan }} <br>
              Pendidikan Tertinggi = {{ $data->pendidikan->nama_pendidikan }} <br>
              Status = {{ $data->status->nama_status }}</td> 
            
            {{-- <td>{{ $data }}</td> --}}
             <td>
              <div class="btn">
                <form action="{{ route('karyawan.destroy',$data->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="fa fa-trash"></button>
                </form>
            </div>
               {{-- <a class="p-2 badge-danger badge" href="{{  }}">hapus</a> --}}
               <a href="{{ route('karyawan.edit',$data->id,'edit') }}" class="p-2 badge-info badge">Edit</a>
            </td>
          </tr>
        @endforeach

        </tbody>
        
    </table>





















      {{-- <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
              <th>no</th>
              <th>nama</th>
              <th>alamat</th>
              <th>gender</th>
              <th>no_telp</th>
              <th>tanggal lahir</th>
              <th>tanggal masuk</th>
              <th>jabatan</th>
              <th>pendidikan</th>
              <th>status</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($karyawan as $data)
          <tr>
            <th>{{ $data->id }}</th>
            <th>{{ $data->nama }}</th>
            <td>{{ $data->alamat }}</td>
            <td>{{ $data->gender }}</td>
            <td>{{ $data->no_telp }}</td>
            <td>{{ $data->tanggal }}</td>
            <td>{{ $data->tgl_masuk }}</td>
            <td>{{ $data->jabatan->nama_jabatan }}</td>
            <td>{{ $data->pendidikan->nama_pendidikan }}</td>
            <td>{{ $data->status->nama_status }}</td>

            <td>{{ $data }}</td>
             <td><a class="btn btn-danger" href="/karyawan/hapus/{{ $data->id }}">hapus</a></td>
            <td></td>
          </tr>
        @endforeach

        </tbody> --}}

    {{-- <tfoot>
      <th>no</th>
      <th>nama</th>
      <th>alamat</th>
      <th>gender</th>
      <th>no_telp</th>
      <th>tanggal lahir</th>
      <th>tanggal masuk</th>
      <th>jabatan</th>
      <th>pendidikan</th>
      <th>status</th>
    </tfoot>
</table> --}}
      @endsection