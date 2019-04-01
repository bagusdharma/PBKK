@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if(Session::has('alert-success'))
                    <div class="alert alert-success">
                        {{ Session::get('alert-success') }}
                    </div>
                    @endif
                    <a href=" {{route('listmatkul.create')}} " class="btn btn-info pull-right">Tambah List MataKuliah</a><br><br>
                    <table class="table table-striped">
                        <tr>
                            <th>NO</th>
                            <th>Mahasiswa</th>
                            <th>Mata Kuliah</th>
                            <th>Dosen</th>
                            <th>Action</th>
                        </tr>
                        <?php $no=1; ?>
                        @foreach($data_all as $matkul)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$matkul->nama_siswa}}</td>
                            <td>{{$matkul->nama_matkul}}</td>
                            <td> {{$matkul->nama_dosen}} </td>
                            <td>
                                <form method="POST" action="{{ route('listmatkul.destroy', $matkul->id) }}" accept-charset="UTF-8">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    {{-- <a href="{{route('matkul.edit', $matkul->id)}}" class="btn btn-warning">Edit</a> --}}
                                    <input type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');"
                                        value="Delete">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        {{-- {{$data_matkul->links()}} --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection