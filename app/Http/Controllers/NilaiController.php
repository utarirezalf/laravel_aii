<?php

namespace App\Http\Controllers;

use App\Nilai;
use App\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
   public function index() {
      //$nilai = Nilai::where('id_user', Auth::user()->id)->get();
      //return DB::table('nilai')->get();
      $data = DB::table('nilai')->get();
      // return view('nilai.index',['nilai' => $data]);
      //return view('nilai.index'); 
      // $data = Nilai::where('id_user', Auth::user()->id)->get();
      return view('nilai.index', compact('data'));
   }

   public function simpan(Request $request) {
         //return $request;
         $format = $request->file('format');
        $tujuan_upload_format= 'data_format';
        $upload_format = $request->nama.'-'.time().'.'.$format->extension();
        $uploadFormat = $format->storeAs($tujuan_upload_format, $upload_format);

        $simpan = new Nilai();
        $simpan->id_user=Auth::user()->id;
        $simpan->nama=$request->nama;
        $simpan->nim=$request->nim;
        $simpan->jurusan=$request->jurusan;
        $simpan->kampus=$request->kampus;
        $simpan->nama_pemb=$request->nama_pemb;
        $simpan->format=$upload_format;

      //   if($file = $request->file('file')){
      //      $name = $file->getClientOriginalName();
      //      if($file->move('images', $name)){
      //         $post = new Post();
      //         $post->image = $name;
      //         $post->save();
      //         return redirect()->route('nilai');
      //      };
      //   }
        $simpan->save();

        if($simpan != null) {
         return redirect('/nilai')->with('status','Format nilai berhasil disimpan');
     } else {
         return redirect('/nilai')->with('status','Format nilai gagal disimpan');
     }
   }
}
