@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
            <h3>Input Nilai Mahasiswa</h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{route('nilai.store')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('id_mahasiswa') ? ' has-error' : '' }}">
                            <select name="id_mahasiswa" id="id_mahasiswa" class="form-control">
                                    <option value="">-- Pilih Nama Mahasiswa --</option>
                                    @foreach ($mahasiswa as $mhs)
                                        <option value="{{$mhs->id}}"> {{$mhs->nama_siswa}} </option>
                                    @endforeach
                                </select>    
                            {!! $errors->first('id_dosen', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group{{ $errors->has('id_matkul') ? ' has-error' : '' }}">
                            <select name="id_matkul" id="id_matkul" class="form-control">
                                    <option value="">-- Pilih MataKuliah --</option>
                                    @foreach ($matkul as $mk)
                                        <option value="{{$mk->id}}"> {{$mk->nama_matkul}} </option>
                                    @endforeach
                                </select>    
                            {!! $errors->first('id_matkul', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group{{ $errors->has('id_dosen') ? ' has-error' : '' }}">
                            <select name="id_dosen" id="id_dosen" class="form-control">
                                    <option value="">-- Dosen Matakuliah --</option>
                                    @foreach ($dosen as $dsn)
                                        <option value="{{$dsn->id}}"> {{$dsn->nama_dosen}} </option>
                                    @endforeach
                                </select>    
                            {!! $errors->first('id_dosen', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group{{ $errors->has('tugas') ? ' has-error' : '' }}">
                                <label for="tugas">Nilai Tugas</label>
                                <input type="text" name="tugas" placeholder="Input Nilai Tugas" class="form-control">
                                    {!! $errors->first('tugas', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group{{ $errors->has('nilai_uts') ? ' has-error' : '' }}">
                            <label for="nilai_uts">Nilai UTS</label>
                            <input type="text" name="nilai_uts" placeholder="Input Nilai UTS" class="form-control">
                                {!! $errors->first('nilai_uts', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group{{ $errors->has('nilai_uas') ? ' has-error' : '' }}">
                                <label for="nilai_uas">Nilai UAS</label>
                                <input type="text" name="nilai_uas" placeholder="Input Nilai UAS" class="form-control">
                                    {!! $errors->first('nilai_uas', '<p class="help-block">:message</p>') !!}
                            </div>
                            
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Input Nilai"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection