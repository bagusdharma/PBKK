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
                    <a href=" {{route('nilai.create')}} " class="btn btn-info pull-right">Input Nilai</a><br><br>
                    <table class="table table-striped">
                        <tr>
                            <th>NO</th>
                            <th>Mahasiswa</th>
                            <th>Mata Kuliah</th>
                            <th>Dosen Pengajar</th>
                            <th>Nilai Matakuliah</th>
                            <th>Action</th>
                        </tr>
                        <?php $no=1; ?>
                        @foreach($data_nilai as $nilai)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$nilai->nama_siswa}}</td>
                            <td>{{$nilai->nama_matkul}}</td>
                            <td> {{$nilai->nama_dosen}} </td>
                            <td> {{$nilai->nilai_akhir}} </td>
                            <td>
                                <form method="POST" action="{{ route('nilai.destroy', $nilai->id) }}" accept-charset="UTF-8">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <a href="{{route('nilai.edit', $nilai->id)}}" class="btn btn-warning">Edit</a>
                                    <input type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');"
                                        value="Delete">
                                    <a href="{{route('list.nilai', $nilai->id)}}" class="btn btn-success">Lihat Nilai</a>
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