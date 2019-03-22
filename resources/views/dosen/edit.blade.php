@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
            <h3>Edit Data Dosen</h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{route('dosen.update', $dosen->id)}}" method="post">
                        <input name="_method" type="hidden" value="PATCH">
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                                <input type="text" name="nip" class="form-control" placeholder="Masukkan NIP Dosen" value="{{$dosen->nip}}">
                                {!! $errors->first('nip', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group{{ $errors->has('nama_dosen') ? ' has-error' : '' }}">
                                <input type="text" name="nama_dosen" class="form-control" placeholder="Masukkan Nama Dosen" value="{{$dosen->nama_dosen}}">
                                {!! $errors->first('nama_dosen', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group{{ $errors->has('id_matkul') ? ' has-error' : '' }}">
                                <select name="id_matkul" id="id_matkul" class="form-control">
                                        @foreach($matkul as $key)
                                            <option value="{{ $key->id }}"  @if($key->id==$dosen->id_matkul) selected='selected' @endif >{{ $key->nama_matkul }}</option>
                                        @endforeach 
                                    </select>    
                                {!! $errors->first('id_matkul', '<p class="help-block">:message</p>') !!}
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