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
        Schema::create('dompet_digital', function (Blueprint $table) {
            $table->id();
            // Menghubungkan catatan koin/poin ke user yang punya akun tersebut
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Jumlah poin, default dimulai dari 0 saat akun baru dibuat
            $table->integer('poin')->default(0);
            // Mencatat tipe mutasi koin: 'klaim_bonus' atau 'tarik_saldo'
            $table->string('tipe_transaksi'); 
            // Nomor e-wallet untuk penulis mencairkan uang (boleh kosong kalau pembaca cuma klaim koin)
            $table->string('nomor_e_wallet')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dompet_digital');
    }
};