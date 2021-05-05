<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Peserta;
use Illuminate\Http\Request;
use App\Http\Controllers;
use DB;

class Absen extends Model
{
    protected $fillabel = ['nama','tanggal','status','ket'];
    protected $table = 'absen';
}
