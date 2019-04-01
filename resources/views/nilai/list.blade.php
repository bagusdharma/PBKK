@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>List Hasil Nilai</h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{route('list.nilai', $nilai->id)}}" method="get">
                        <input name="_method" type="hidden" value="PATCH">
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('id_mahasiswa') ? ' has-error' : '' }}">
                            <label for="id_mahasiswa">Nama Mahasiswa</label>
                            {{-- @foreach ($mahasiswa as $mhs) --}}
                            <input type="text" name="id_mahasiswa" class="form-control" placeholder="Nama Mahasiswa"
                                value="{{$nilai->id_mahasiswa}}">
                            {{-- @endforeach --}}
                        </div>
                        <div class="form-group{{ $errors->has('id_matkul') ? ' has-error' : '' }}">
                            <label for="id_dosen">Dosen Pengajar</label>
                            <input type="text" name="nama_matkul" class="form-control"
                                placeholder="Masukkan Mata Kuliah" value="{{$nilai->id_dosen}}">
                            {!! $errors->first('nama_matkul', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{{ $errors->has('nama_matkul') ? ' has-error' : '' }}">
                            <label for="id_matkul">Matakuliah</label>
                            <input type="text" name="nama_matkul" class="form-control"
                                placeholder="Masukkan Mata Kuliah" value="{{$nilai->id_matkul}}">
                            {!! $errors->first('nama_matkul', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{{ $errors->has('nama_matkul') ? ' has-error' : '' }}">
                            <label for="tugas">Nilai Tugas</label>
                            <input type="text" name="Tugas" class="form-control" placeholder="Masukkan Mata Kuliah"
                                value="{{$nilai->tugas}}">
                            {!! $errors->first('nama_matkul', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{{ $errors->has('nama_matkul') ? ' has-error' : '' }}">
                            <label for="nilai_uts">Nilai UTS</label>
                            <input type="text" name="nilai_uts" class="form-control" placeholder="Nilai UTS Kuliah"
                                value="{{$nilai->nilai_uts}}">
                            {!! $errors->first('nama_matkul', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{{ $errors->has('nama_matkul') ? ' has-error' : '' }}">
                            <label for="nilai_uas">Nilai UAS</label>
                            <input type="text" name="nilai_uas" class="form-control" placeholder="Masukkan Mata Kuliah"
                                value="{{$nilai->nilai_uas}}">
                            {!! $errors->first('nama_matkul', '<p class="help-block">:message</p>') !!}
                        </div>

                        {{-- <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Update"></div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection