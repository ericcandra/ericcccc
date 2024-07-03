<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    protected $fillable     = ['nama_petugas','nohp','alamat'];
    
    // public function pinjam(){
    //     return $this->belongsTo(pinjam::class, 'pinjam_id');
    // }
}
