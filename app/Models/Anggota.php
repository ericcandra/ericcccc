<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $fillable = ['nama_anggota','alamat','nohp'];
    // public function buku(){
    //     return $this->belongsTo(buku::class);

    // }
    
}