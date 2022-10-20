<?php

namespace App\Http\Controllers;

use App\Models\Pekerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PekerjaControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $pekerj = Pekerja::latest()->paginate(5);
            return view ('pekerj.index',compact('pekerj'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pekerj.create');
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
        $request->validate([
            'Id_Pekerja' => 'required',
            'NamaPekerja' => 'required',
            'AlamatPekerja' => 'required',
        ]);
        Pekerja::create($request->all());

        return redirect()->route('pekerj.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pekerja $pekerj)
    {
        //
        return view('pekerj.show',compact('pekerj'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pekerja $pekerj)
    {
        //
        return view('pekerj.edit', compact('pekerj'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pekerja $pekerj)
    {
        //
        $request->validate([
            'Id => required',
            'Id_Pekerja' => 'required',
            'NamaPekerja' => 'required',
            'AlamatPekerja' => 'required',
        ]);

        $pekerj->update($request->all());

        return redirect()->route('pekerj.index')->with('succes','Pekerja Berhasil di Update');
    }

    public function destroy(Pekerja $pekerj)
    {
        $pekerj->delete();

        return redirect()->route('pekerj.index')->with('succes','Pekerja Berhasil di Hapus');
    }
}