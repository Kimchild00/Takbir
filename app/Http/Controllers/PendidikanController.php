<?php

namespace App\Http\Controllers;

use App\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendidikan = Pendidikan::all();
        return view('pendidikan.index', compact('pendidikan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $isi = ['SD','SMP','SMK/SMA', "D3", 'S1','S2','S3'];
        return view('pendidikan.create',['pendidikan' => Pendidikan::all()], compact('isi'));
       
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
            'nama_pendidikan' => 'required|min:2|max:50'
        ]);


        $pendidikan = Pendidikan::create($validateData);
        return redirect('/pendidikan')->with('pesan',"data $request->nama_pendidikan Berhasil di tambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendidikan $pendidikan)
    {
        $isi = ['SD','SMP','SMK/SMA', "D3", 'S1','S2','S3'];
        return view('pendidikan.edit',['pendidikan'=> $pendidikan->find($pendidikan->id)], compact('isi'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendidikan $pendidikan)
    {
        $validateData = $request->validate([
            'nama_pendidikan' => 'required|min:2|max:50'
        ]);


        $pendidikan->update($validateData);
        return redirect('/pendidikan')->with('pesan',"data $request->nama_pendidikan Berhasil di tambahkan");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Pendidikan $pendidikan)
    {
        $pendidikan->find($pendidikan->id)->delete();
        return redirect('/pendidikan')->with('pesan',"data $request->nama_pendidikan Berhasil di hapus");
    }
}
