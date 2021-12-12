<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('home', ['mahasiswas' => $mahasiswas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insert');
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
            'name' => 'required|min:3',
            'nim' => 'required|size:10',
            'email' => 'required|email',
            'major' => 'required',
        ]);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->name = $validateData['name'];
        $mahasiswa->nim = $validateData['nim'];
        $mahasiswa->email = $validateData['email'];
        $mahasiswa->major = $validateData['major'];
        $mahasiswa->save();

        return "Data has been save to the database!";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('edit', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3',
            'nim' => 'required|size:10|unique:mahasiswas',
            'email' => 'required|email|unique:mahasiswas',
            'major' => 'required',
        ]);

        Mahasiswa::where('id', $mahasiswa->id)->update($validateData);

        return redirect()->route('mahasiswas.index', ['mahasiswa', $mahasiswa->id])->with('message', "Update data {$validateData['name']} successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')->with('message', "$mahasiswa->name data successfully deleted from database!");
    }
}