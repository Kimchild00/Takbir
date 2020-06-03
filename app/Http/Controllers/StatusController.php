<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Status::all();
        return view('status.index', compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $isi = ['Jombs','nikah','Lajang'];
        return view('status.create',['status'=> Status::all()],compact('isi'));
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
            'nama_status' => 'required|min:2|max:50'
        ]);


        $status = Status::create($validateData);
        return redirect('/status')->with('pesan',"data $request->nama_status Berhasil di tambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        $isi = ['Jombs','nikah','Lajang'];
        return view('status.edit', ['status'=> $status->find($status->id)], compact('isi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        $validateData = $request->validate([
            'nama_status' => 'required|min:2|max:50'
        ]);


        $status->update($validateData);
        return redirect('/status')->with('pesan',"data $request->nama_status Berhasil di tambahkan");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,Status $status)
    {
        $status->find($status->id)->delete();
        return redirect('/status')->with('pesan',"data $request->nama_status Berhasil di hapus");
    }
}
