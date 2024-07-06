<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    protected $fillable = ['kode_buku','nama_buku','pengarang','kategori','stok'];

    // protected $primaryKey = "kode_buku";
}


