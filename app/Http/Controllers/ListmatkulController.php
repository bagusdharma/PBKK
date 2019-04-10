<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mahasiswa;
use App\Listmatkul;
use App\Matkul;

class ListmatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_all = DB::table('listmatkuls')
        ->join('matkuls', 'matkuls.id', '=', 'listmatkuls.id_matkul')
        // ->join('dosens', 'dosens.id', '=', 'listmatkuls.id_dosen')
        ->join('mahasiswas', 'mahasiswas.id', '=', 'listmatkuls.id_mahasiswa')
        // ->where('matkuls.id', '=' ,'dosens.id_matkul')
        // ->where('mahasiswas.id', '=', 'matkuls.id_matkul')
        // ->select('listmatkuls.id_mahasiswa', 'listmatkuls.id_matkul', 'mahasiswas.nama_siswa', 'matkuls.nama_matkul', 'dosens.nama_dosen', 'listmatkuls.id')
        // ->distinct('mahasiswas.id','listmatkuls.id')
        ->select('listmatkuls.id_mahasiswa', 'listmatkuls.id_matkul', 'mahasiswas.nama_siswa', 'matkuls.nama_matkul', 'listmatkuls.id')
        ->paginate(10);
        // $data_all = DB::select(DB::raw('select distinct listmatkuls.* from listmatkuls join matkuls on matkuls.id = listmatkuls.id_matkul join mahasiswas on mahasiswas.id = listmatkuls.id_mahasiswa'));
        // echo json_encode($data_all);

        return view('matkul.list.index', compact('data_all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data_all = DB::table('listmatkuls')
        // ->join('matkuls', 'matkuls.id', '=', 'listmatkuls.id_matkul')
        // ->join('dosens', 'dosens.id', '=', 'listmatkuls.id_dosen')
        // ->join('mahasiswas', 'mahasiswas.id', '=', 'listmatkuls.id_mahasiswa')->get();
        $mahasiswa = Mahasiswa::All();
        $dosen_matkul = DB::select(DB::raw('select * from dosens join matkuls on matkuls.id = dosens.id_matkul where matkuls.id = dosens.id_matkul'));
        $matkul = Matkul::All();
        // echo json_encode($dosen_matkul);
        return view ('matkul.list.create', compact('mahasiswa', 'dosen_matkul', 'matkul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $list = Listmatkul::create($request->all());
        return redirect()->route('listmatkul.index')->with('alert-success', 'Data Berhasil Disimpan.');
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
        $data_matkul = Listmatkul::findOrFail($id);
        $data_matkul->delete($id);
        return redirect()->route('listmatkul.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}
