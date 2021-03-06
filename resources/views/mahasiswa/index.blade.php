@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Tabel Mahasiswa</h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    @if(Session::has('alert-success'))
                    <div class="alert alert-success">
                        {{ Session::get('alert-success') }}
                    </div>
                    @endif
                    <a href="{{route('mahasiswa.create')}}" class="btn btn-info pull-right">Tambah Data</a><br><br>
                    <table class="table table-striped">
                        <tr>
                            <th>NO</th>
                            <th>NRP</th>
                            <th>Nama Mahasiswa</th>
                            <th>Alamat Mahasiswa</th>
                            <th>Dosen</th>
                            <th>Action</th>
                            <th>MataKuliah</th>
                        </tr>
                        <?php $no=1; ?>
                        @foreach($data_mahasiswa as $mahasiswa)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$mahasiswa->nrp}}</td>
                            <td>{{$mahasiswa->nama_siswa}}</td>
                            <td> {{$mahasiswa->alamat_siswa}} </td>
                            <td> {{$mahasiswa->nama_dosen}} </td>
                            {{-- <td> {{$mahasiswa->nama_matkul}} </td> --}}
                            <td>
                                <form method="POST" action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" accept-charset="UTF-8">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <a href="{{route('mahasiswa.edit', $mahasiswa->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                    <input type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"
                                        value="Delete">
                                </form>
                            </td>
                            <td><a href="{{route('listmatkul.index')}}" class="btn btn-success btn-sm">List Matakuliah</a>
                            </td>
                        </tr>
                        @endforeach
                        {{$data_mahasiswa->links()}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection