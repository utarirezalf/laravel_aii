<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Peserta;
use Illuminate\Http\Request;
use App\Http\Controllers;
use DB;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $fillable = [
        'nama' , 'nim' , 'jurusan' , 'kampus' , 'nama_pemb' , 'format',
    ];
}
