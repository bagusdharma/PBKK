<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Matkul;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // metode Query Builder
        $data_matkul = Matkul::all();
        return view('matkul.index', compact('data_matkul'));

        // metode Raw Query 
        // $result_matkul = DB::select(DB::raw('select * from matkuls'));
        // return view('matkul.rawquery.index', compact('result_matkul'));

        // metode eloquent
        // $data_matkul = Matkul::get();
        // echo json_encode($data_matkul);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matkul.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $nama_matkul = $request->nama_matkul;
        $matkul = Matkul::create($request->all());
        return redirect()->route('matkul.index')->with('alert-success', 'Data Berhasil Disimpan.');    
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
        $matkul = Matkul::findOrFail($id);
        return view('matkul.edit', compact('matkul'));
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
        $matkul = Matkul::findOrFail($id);
        $matkul->nama_matkul = $request->nama_matkul;
        $matkul->save();
        return redirect()->route('matkul.index')->with('alert-success', 'Data Berhasil Disimpan.');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matkul = Matkul::findOrFail($id);
        $matkul->delete($id);
        return redirect()->route('matkul.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}
