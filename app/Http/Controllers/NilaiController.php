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
        ->select('nilais.id','nilais.id_mahasiswa', 'nilais.id_matkul', 'mahasiswas.nama_siswa', 'matkuls.nama_matkul', 'dosens.nama_dosen')
        // ->distinct('mahasiswas.id','listmatkuls.id')
        ->get();
        // echo json_encode($data_nilai);
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
        $nilai = Nilai::create($request->all());
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function list_nilai($id)
    {
        $nilai = Nilai::findOrFail($id);
        return view('nilai.list', compact('nilai'));
    }
}
