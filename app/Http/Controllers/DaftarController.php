<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendaftar;
use DB;

class DaftarController extends Controller
{
    public function daftar(Request $request)
    {
        $simpan  = new Pendaftar();
        $simpan->nama=$request->nama;
        $simpan->nim=$request->nim;
        $simpan->jurusan=$request->jurusan;
        $simpan->kampus=$request->kampus;
        $simpan->tgl_masuk=$request->tgl_masuk;
        $simpan->tgl_keluar=$request->tgl_keluar;
        $simpan->status=0;
        $simpan->save();
        

        if($simpan != null) {
            return redirect('/')->with('status','Data berhasil disimpan');
        } else {
            return redirect('/')->with('status','Data gagal disimpan');
        }
        
    }
}
