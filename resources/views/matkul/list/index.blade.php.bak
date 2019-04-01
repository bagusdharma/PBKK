@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>List MataKuliah</h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="" method="get">
                        <input name="_method" type="hidden" value="PATCH">
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('nrp') ? ' has-error' : '' }}">
                            <label for="nrp">NRP</label>
                            <input type="text" name="nrp" class="form-control" placeholder="NRP Mahasiswa" value="{{$mahasiswa->nrp}}">
                            {!! $errors->first('nrp', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{{ $errors->has('nama_siswa') ? ' has-error' : '' }}">
                            <label for="nama_siswa">Nama Mahasiswa</label>
                            <input type="text" name="nama_matkul" class="form-control" placeholder="Nama Mahasiswa" value="{{$mahasiswa->nama_siswa}}">
                            {!! $errors->first('nama_mahasiswa', '<p class="help-block">:message</p>') !!}
                        </div>

                        {{-- <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Update"></div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if(Session::has('alert-success'))
                    <div class="alert alert-success">
                        {{ Session::get('alert-success') }}
                    </div>
                    @endif
                    <a href="" class="btn btn-info pull-right">Tambah MataKuliah</a><br><br>
                    <table class="table table-striped">
                        <tr>
                            <th>NO</th>
                            <th>Mata Kuliah</th>
                            <th>Action</th>
                        </tr>
                        <?php $no=1; ?>
                        @foreach($data_matkul as $matkul)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$matkul->nama_matkul}}</td>
                            <td>
                                <form method="POST" action="{{ route('delete.list', $matkul->id) }}" accept-charset="UTF-8">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <a href="{{route('matkul.edit', $matkul->id)}}" class="btn btn-warning">Edit</a>
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