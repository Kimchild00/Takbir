<?php

namespace App\Http\Controllers;

use App\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::all();
        return view('jabatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $isi = ['Fullstack','Backend','Frontend'];
        return view('jabatan.create',['jabatan' => Jabatan::all()] ,compact('isi'));
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
            'nama_jabatan' => 'required|min:2|max:50'
        ]);


        $jabatan = Jabatan::create($validateData);
        return redirect('/jabatan')->with('pesan',"data $request->nama_jabatan Berhasil di tambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        $jabatan = Japatan::find($id);
        return view('jabatan.show',['jabatan' => $jabatan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        $isi = ['Fullstack','Backend','Frontend'];
        return view('jabatan.edit',['jabatan'=> $jabatan->find($jabatan->id)] ,compact('isi'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $validateData = $request->validate([
            'nama_jabatan' => 'required|min:2|max:50'
        ]);


        $jabatan->update($validateData);
        return redirect('/jabatan')->with('pesan',"data $request->nama_jabatan Berhasil di tambahkan");
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Jabatan $jabatan)
    {
        $jabatan->find($jabatan->id)->delete();
        return redirect('/jabatan')->with('pesan',"data $request->nama_pendidikan Berhasil di hapus");
  
    }
}
