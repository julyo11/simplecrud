<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request)
    {
        $request->validate([
            // 'nama' => 'required',
            'berkas' => 'required|file|image|max:5000',
        ]);

        $extFile = $request->berkas->getClientOriginalExtension();
        $namaFile = $request->nama . time() . "." . $extFile;

        $path = $request->berkas->move('image', $namaFile);
        echo "Variabel path berisi: $path <br>";

        $pathBaru = asset('image/', $namaFile);
        echo "Gambar berhasil di upload ke <a href='$pathBaru'>$pathBaru</a> <br> <img src='$pathBaru'>";
    }
}