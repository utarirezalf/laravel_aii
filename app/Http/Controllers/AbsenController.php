<?php

namespace App\Http\Controllers;

use App\Absen;
use App\DetailAbsen;
use App\Jadwal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class AbsenController extends Controller
{
    public function index()
    {
        // $jadwal = Jadwal::all();
        // return $countJadwal = $jadwal->count();
        
        $data = Absen::where('id_user', Auth::user()->id)->get();
        return view('absensi.index', compact('data'));
    }

    public function simpan(Request $request)
    {
        //return $request; //get data yang di submit
        $tanggal = Carbon::now()->format('Y-m-d'); //get tanggal sekarang
        $simpan = new Absen();
        $simpan->id_user=Auth::user()->id;
        $simpan->tanggal=$tanggal;
        $simpan->status=$request->status;
        if($request->status == 1) {
            $simpan->ket='Hadir';
        }else{
            $simpan->ket = $request->keterangan;
        }
        $simpan->save();

        $jadwal = Jadwal::all();
        // return $simpan->id;
        $countJadwal = $jadwal->count();
        for($i=0;$i<$countJadwal; $i++){
            $simpanJadwal = new DetailAbsen();
            $simpanJadwal->id_absen = $simpan->id;
            $simpanJadwal->jam = $jadwal[$i]['jam'];
            $simpanJadwal->ket = '-';
            $simpanJadwal->save();
            $dataJadwal[] = $simpanJadwal;
        }

        // return $dataJadwal;

        if($simpan != null) {
            return redirect('/absen')->with('status','Data berhasil disimpan');
        } else {
            return redirect('/absen')->with('status','Data gagal disimpan');
        }
    }

    public function downloadPDF() {
        // $data = Absen::all();
        // $pdf = PDF::loadView('pdf', compact('data'));
        // return $pdf->download('data.pdf');
    }

}
