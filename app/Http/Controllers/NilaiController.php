<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Nilai;
use App\Mahasiswa;
use App\Dosen;
use App\Matkul;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_nilai = DB::table('nilais')
        ->join('matkuls', 'matkuls.id', '=', 'nilais.id_matkul')
        ->join('dosens', 'dosens.id', '=', 'nilais.id_dosen')
        ->join('mahasiswas', 'mahasiswas.id', '=', 'nilais.id_mahasiswa')
        ->select('nilais.id','nilais.id_mahasiswa', 'nilais.id_matkul', 'mahasiswas.nama_siswa', 'matkuls.nama_matkul', 'dosens.nama_dosen', 'nilais.nilai_akhir')
        // ->distinct('mahasiswas.id','listmatkuls.id')
        ->paginate(10);
        // $nilai = Nilai::All();
        // $nilai_akhir = 
        // echo json_encode($nilai);
        return view('nilai.index', compact('data_nilai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mahasiswa = Mahasiswa::All();
        $dosen = Dosen::All();
        $matkul = Matkul::All();
        return view('nilai.create', compact('mahasiswa', 'dosen', 'matkul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $nilai = Nilai::create($request->all());
        $nilai = new Nilai();
        $nilai->id_mahasiswa = $request['id_mahasiswa'];
        $nilai->id_dosen = $request['id_dosen'];
        $nilai->id_matkul = $request['id_matkul'];
        $nilai->tugas = $request['tugas'];
        $nilai->nilai_uts = $request['nilai_uts'];
        $nilai->nilai_uas = $request['nilai_uas'];
        
        // echo 'nilai tugas = '.$nilai->tugas.' nilai uts = '.$nilai->nilai_uts.' nilai uas = '.$nilai->nilai_uas;
        $nilai_akhir = (($nilai->tugas)+($nilai->nilai_uts)+($nilai->nilai_uas))/3;
        // echo 'nilai akhir = '. $nilai_akhir;
        if($nilai_akhir >= 86) {
            $nilai->nilai_akhir = 'A';
        }
        else if($nilai_akhir >= 75 && $nilai_akhir < 86) {
            $nilai->nilai_akhir = 'AB';
        }
        else if($nilai_akhir >= 65 && $nilai_akhir < 75) {
            $nilai->nilai_akhir = 'B';
        }
        else if($nilai_akhir >= 55 && $nilai_akhir < 65) {
            $nilai->nilai_akhir = 'BC';
        }
        else if($nilai_akhir >= 50 && $nilai_akhir < 55) {
            $nilai->nilai_akhir = 'C';
        }
        else if($nilai_akhir >= 45 && $nilai_akhir < 50) {
            $nilai->nilai_akhir = 'D';
        }
    
        else  $nilai->nilai_akhir = 'E';

        $nilai->save();
        return redirect()->route('nilai.index')->with('alert-success', 'Data Berhasil Disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);
        $mahasiswa = DB::table('mahasiswas')
        ->select('id','nama_siswa')->get();
        return view('nilai.edit', compact('nilai', 'mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->update($request->all());
        return redirect()->route('nilai.index')->with('alert-success', 'Data Berhasil Disimpan.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();
        return redirect()->route('nilai.index')->with('alert-success', 'Data Berhasil Dihapus.'); 

    }

    public function list_nilai($id)
    {
        $nilai = Nilai::findOrFail($id);
        $mahasiswa = DB::table('mahasiswas')
        ->select('id','nama_siswa')->get();
        $matkul = DB::table('matkuls')
        ->select('id','nama_matkul')->get();
        $dosen = DB::table('dosens')
        ->select('id','nama_dosen')->get();
        return view('nilai.list', compact('nilai','mahasiswa','matkul', 'dosen'));
    }
}
