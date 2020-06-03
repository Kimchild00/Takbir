<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;
use App\Jabatan;
use App\Pendidikan;
use App\Status;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        $jabatan = Jabatan::all();
        $status = Status::all();
        $pendidikan = Pendidikan::all();
        return view('karyawan.create', compact('karyawan','jabatan','status','pendidikan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:3',
            'alamat' => 'required',
            'gender' => 'required',
            'no_telp' => 'required',
            'tanggal' => 'required',
            'jabatan_id' => 'required',
            'status_id' => 'required',
            'pendidikan_id' => 'required',
            'tgl_masuk' => 'required'
        ]);

        $karyawan = Karyawan::create($validateData);
        return redirect('/karyawan')->with('pesan',"data $request->nama Berhasil di tambahkan");
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        // $karyawan = Karyawan::find($id);
        // return view('karyawan.show',['karyawan' => $karyawan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        $karyawan->find($karyawan->id);
        $jabatan = Jabatan::all();
        $status = Status::all();
        $pendidikan = Pendidikan::all();
        
        return view('karyawan.edit',compact('karyawan','jabatan','status','pendidikan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:3',
            'alamat' => 'required',
            'gender' => 'required',
            'no_telp' => 'required',
            'tanggal' => 'required',
            'jabatan_id' => 'required',
            'status_id' => 'required',
            'pendidikan_id' => 'required',
            'tgl_masuk' => 'required'
        ]);

        $karyawan->update($validateData);
        return redirect('/karyawan')->with('pesan', "pesan","data $request->nama Berhasil di tambahkan");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Karyawan $karyawan)
    {
        $karyawan->find($karyawan->id)->delete();
        return redirect('/karyawan')->with('pesan',"data $request->nama Berhasil di hapus");
    }
}