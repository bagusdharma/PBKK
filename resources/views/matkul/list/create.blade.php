@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
            {{-- <h3>Tambah Data Matakuliah</h3> --}}
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{route('listmatkul.store')}}" method="post">
                        {{csrf_field()}}
                        {{-- <div class="form-group{{ $errors->has('nrp') ? ' has-error' : '' }}">
                            <select name="nrp" id="nrp" class="form-control">
                                    <option value="">-- NRP --</option>
                                    @foreach ($data_mahasiswa as $mahasiswa)
                                        <option value="{{$mahasiswa->id}}"> {{$mahasiswa->nrp}} </option>
                                    @endforeach
                                </select>    
                            {!! $errors->first('nrp', '<p class="help-block">:message</p>') !!}
                        </div> --}}

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
                                    @foreach ($dosen_matkul as $dosen)
                                        <option value="{{$dosen->id}}"> {{$dosen->nama_dosen}} </option>
                                    @endforeach
                                </select>    
                            {!! $errors->first('id_dosen', '<p class="help-block">:message</p>') !!}
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Ambil MataKuliah"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection