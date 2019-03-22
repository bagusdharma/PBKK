@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <h3>Edit Data Mahasiswa</h3>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{route('mahasiswa.update', $mahasiswa->id)}}" method="post">
                            <input name="_method" type="hidden" value="PATCH">
                            {{csrf_field()}}
                            <div class="form-group{{ $errors->has('nrp') ? ' has-error' : '' }}">
                                <input type="text" name="nrp" class="form-control" placeholder="Masukkan NRP Mahasiswa" value="{{$mahasiswa->nrp}}">
                                {!! $errors->first('nrp', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group{{ $errors->has('nama_siswa') ? ' has-error' : '' }}">
                                <input type="text" name="nama_siswa" class="form-control" placeholder="Masukkan Nama Mahasiswa" value="{{$mahasiswa->nama_siswa}}">
                                {!! $errors->first('nama_siswa', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group{{ $errors->has('alamat_siswa') ? ' has-error' : '' }}">
                                <input type="text" name="alamat_siswa" class="form-control" placeholder="Masukkan Alamat Mahasiswa" value="{{$mahasiswa->alamat_siswa}}">
                                {!! $errors->first('alamat_siswa', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group{{ $errors->has('id_dosen') ? ' has-error' : '' }}">
                                <select name="id_dosen" id="id_dosen" class="form-control">
                                    @foreach($dosen as $dsn)
                                        <option value="{{$dsn->id}}"  @if($dsn->id==$mahasiswa->id_dosen) selected='selected' @endif >{{$dsn->nama_dosen}}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('id_dosen', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection