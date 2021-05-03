<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pendaftar;
use Illuminate\Http\Request;
use App\Http\Controllers;
use DB;

class Peserta extends Model
{
    public function index(){
        return view('peserta.index');
    }
}
