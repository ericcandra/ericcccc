<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\buku;
use App\Models\petugas;
use App\Models\anggota;

class Pinjam extends Model
{
    use HasFactory;
    protected $fillable = ['jumlah_pinjam','buku_id','anggota_id','petugas_id','tanggal_pinjam','tanggal_kembalian'];
    public function buku(){
        return $this->belongsTo(buku::class);
    }
    public function anggota(){
        return $this->belongsTo(anggota::class);
    }    
    public function petugas(){
        return $this->belongsTo(petugas::class);
    }    
}