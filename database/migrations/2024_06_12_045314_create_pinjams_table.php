<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pinjams', function (Blueprint $table) {
            $table->id();
            $table->char('jumlah_pinjam',10);
            $table->foreignId('buku_id')->constrained();
            $table->foreignId('anggota_id')->constrained();
            $table->foreignId('petugas_id')->constrained();
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembalian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjams');
    }
};
