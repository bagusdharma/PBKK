<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Dosen;
use App\Matkul;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // metode Query Builder
        // $data_dosen = DB::table('matkuls')->join('dosens', 'matkuls.id', '=', 'dosens.id_matkul')
                        //  ->paginate(10);

        // return view('dosen.index', compact('data_dosen'));

        // metode Raw Query
        // $result_dosen = DB::select(DB::raw('select * from dosens join matkuls on matkuls.id = dosens.id_matkul'));
        // return view('dosen.rawquery.index', compact('result_dosen'));

        // metode Eloquent
        $eloquent_dosen = Dosen::with('matkul')->paginate(10);
        // echo json_encode($eloquent_dosen);
        return view('dosen.eloquent.index', compact('eloquent_dosen'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $matkul = Matkul::pluck('nama_matkul','id');

        $matkul = DB::table('matkuls')
                    ->select('id','nama_matkul')->get();
        return view('dosen.create', compact('matkul'));
        // echo json_encode($matkul);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dosen = Dosen::create($request->all());
        return redirect()->route('dosen.index')->with('alert-success', 'Data Berhasil Disimpan.');
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
        $dosen = Dosen::findOrFail($id);
        $matkul = DB::table('matkuls')
                    ->select('id','nama_matkul')->get();
        return view('dosen.edit', compact('dosen','matkul'));
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
        $dosen = Dosen::findOrFail($id);
        $dosen->update($request->all());
        return redirect()->route('dosen.index')->with('alert-success', 'Data Berhasil Disimpan.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete($id);
        return redirect()->route('dosen.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}
