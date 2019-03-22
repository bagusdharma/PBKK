@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
            <h3>Tambah Data Mahasiswa</h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{route('mahasiswa.store')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('nrp') ? ' has-error' : '' }}">
                            <input type="text" name="nrp" class="form-control" placeholder="Masukkan NRP Mahasiswa">
                            {!! $errors->first('nrp', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{{ $errors->has('nama_siswa') ? ' has-error' : '' }}">
                            <input type="text" name="nama_siswa" class="form-control" placeholder="Masukkan Nama Mahasiswa">
                            {!! $errors->first('nama_siswa', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{{ $errors->has('alamat_siswa') ? ' has-error' : '' }}">
                                <input type="text" name="alamat_siswa" class="form-control" placeholder="Masukkan Alamat Mahasiswa">
                                {!! $errors->first('alamat_siswa', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{{ $errors->has('id_dosen') ? ' has-error' : '' }}">
                            <select name="id_dosen" id="id_dosen" class="form-control">
                                    <option value="">-- Pilih Nama Dosen --</option>
                                    @foreach ($dosen as $dsn)
                                        <option value="{{$dsn->id}}"> {{$dsn->nama_dosen}} </option>
                                    @endforeach
                                </select>    
                            {!! $errors->first('id_dosen', '<p class="help-block">:message</p>') !!}
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Simpan"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection