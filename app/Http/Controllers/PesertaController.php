<?php

namespace App\Http\Controllers;

use App\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesertaController extends Controller
{
    public function index() {
        // return DB::table('pendaftar')->get();
        $data = DB::table('pendaftar')->where('status',1)->get();
        //return $data;
        return view('peserta.index',['peserta' => $data]);
    }
}
