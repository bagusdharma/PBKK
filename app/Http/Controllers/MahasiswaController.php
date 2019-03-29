<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Mahasiswa;
use App\Dosen;
use App\Matkul;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // metode Query Builder
        $data_mahasiswa = DB::table('dosens')
        ->join('mahasiswas', 'dosens.id', '=', 'mahasiswas.id_dosen')
        ->join('matkuls', 'dosens.id_matkul', '=', 'matkuls.id')
        ->select('dosens.*', 'mahasiswas.*', 'nama_matkul')
        ->paginate(10);
                        
        return view('mahasiswa.index', compact('data_mahasiswa'));

        // metode Raw Query
        // $result_mahasiswa = DB::select(DB::raw('select * from dosens join matkuls on matkuls.id = dosens.id_matkul join mahasiswas on mahasiswas.id_dosen = dosens.id'));
        // return view('mahasiswa.rawquery.index', compact('result_mahasiswa'));

        // metode eloquent
        // $eloquent_mahasiswa = Mahasiswa::with('dosen')->paginate(10);
        // return view('mahasiswa.eloquent.index', compact('eloquent_mahasiswa'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosen = DB::table('dosens')
                    ->select('id','nama_dosen', 'id_matkul')->get();
        
                    // echo json_encode($dosen);
        return view('mahasiswa.create', compact('dosen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mahasiswa = Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('alert-success', 'Data Berhasil Disimpan.');
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
        $mahasiswa = Mahasiswa::findOrFail($id);
        $dosen = DB::table('dosens')
                    ->select('id','nama_dosen','id_matkul')->get();
// echo json_encode($dosen);
        return view('mahasiswa.edit', compact('mahasiswa','dosen'));
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
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswa.index')->with('alert-success', 'Data Berhasil Disimpan.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete($id);
        return redirect()->route('mahasiswa.index')->with('alert-success', 'Data Berhasil Dihapus.'); 
    }
}
