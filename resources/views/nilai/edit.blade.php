@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>Edit Hasil Nilai</h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{route('nilai.update', $nilai->id)}}" method="post">
                        <input name="_method" type="hidden" value="PATCH">
                        {{csrf_field()}}

                        <div class="form-group{{ $errors->has('id_mahasiswa') ? ' has-error' : '' }}">
                            <select name="id_mahasiswa" id="id_mahasiswa" class="form-control" readonly>
                                @foreach($mahasiswa as $mhs)
                                <option value="{{ $mhs->id }}" @if($mhs->id==$nilai->id_mahasiswa) selected='selected'
                                    @endif>{{ $mhs->nama_siswa }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('id_mahasiswa', '<p class="help-block">:message</p>') !!}
                        </div>
                        {{-- <div class="form-group{{ $errors->has('id_matkul') ? ' has-error' : '' }}">
                            <select name="id_matkul" id="id_matkul" class="form-control" readonly>
                                @foreach($matkul as $mk)
                                <option value="{{ $mk->id }}" @if($mk->id==$nilai->id_matkul) selected='selected'
                                    @endif>{{ $mk->nama_matkul }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('id_matkul', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{{ $errors->has('id_dosen') ? ' has-error' : '' }}">
                            <select name="id_dosen" id="id_dosen" class="form-control" readonly>
                                @foreach($dosen as $dsn)
                                <option value="{{ $dsn->id }}" @if($dsn->id==$nilai->id_dosen) selected='selected'
                                    @endif>{{ $dsn->nama_dosen }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('id_matkul', '<p class="help-block">:message</p>') !!}
                        </div> --}}

                        <div class="form-group{{ $errors->has('tugas') ? ' has-error' : '' }}">
                            <label for="tugas">Nilai Tugas</label>
                            <input type="text" name="Tugas" class="form-control" placeholder="Masukkan Mata Kuliah"
                                value="{{$nilai->tugas}}">
                            {!! $errors->first('nama_matkul', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{{ $errors->has('nilai_uts') ? ' has-error' : '' }}">
                            <label for="nilai_uts">Nilai UTS</label>
                            <input type="text" name="nilai_uts" class="form-control" placeholder="Nilai UTS Kuliah"
                                value="{{$nilai->nilai_uts}}">
                            {!! $errors->first('nama_matkul', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{{ $errors->has('nilai)uas') ? ' has-error' : '' }}">
                            <label for="nilai_uas">Nilai UAS</label>
                            <input type="text" name="nilai_uas" class="form-control" placeholder="Masukkan Mata Kuliah"
                                value="{{$nilai->nilai_uas}}">
                            {!! $errors->first('nama_matkul', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Update Nilai"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection