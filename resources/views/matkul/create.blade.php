@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Tabel Mata Kuliah</h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{route('matkul.store')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('nama_matkul') ? ' has-error' : '' }}">
                            <input type="text" name="nama_matkul" class="form-control" placeholder="Masukkan Mata Kuliah">
                            {!! $errors->first('nama_matkul', '<p class="help-block">:message</p>') !!}
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Simpan"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection