<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\Laporan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $laporans= Mahasiswa::with('laporan')->where('nama','LIKE','%' .$request->search.'%')->orWhere('prodi','LIKE','%' .$request->search.'%')
            ->paginate(5);
        }else {
                $laporans = Mahasiswa::with('laporan')->paginate(5);  
            }
        return view('mahasiswa.laporan', [
            'laporans' => $laporans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laporan = Mahasiswa::find($id);
        
        return view('mahasiswa.laporan',compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        $validated = $this->validate($request,[
            'npm' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'status_laporan' => 'required',
            'file_laporan' => 'required',
            'nilai' => 'required',
        ]);

        $laporan = Mahasiswa::with('laporan')->find($id);
        
        $laporan->update([

            'npm' => $validated['npm'],
            'nama' => $validated['nama'],
            'prodi' => $validated['prodi'],
        ]);
        $laporan->laporan->update([

            'status_laporan' => $validated['status_laporan'],
            'file_laporan' => $validated['file_laporan'],
            'nilai' => $validated['nilai'],
        ]);

        if($laporan){
            return redirect()->route('laporan.index')->with(['success' => 'Nilai berhasil ditambahkan']);
        }else{
            return redirect()->route('laporan.index')->with('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
