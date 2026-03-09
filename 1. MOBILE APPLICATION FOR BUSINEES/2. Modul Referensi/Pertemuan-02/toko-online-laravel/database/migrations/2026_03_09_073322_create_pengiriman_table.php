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
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pesanan')->constrained('pesanan')->onDelete('cascade');
            $table->string('kurir', 50)->nullable();
            $table->string('layanan', 50)->nullable();
            $table->string('no_resi', 100)->nullable();
            $table->integer('estimasi_hari')->nullable();
            $table->enum('status', ['menunggu','dikemas','dikirim','tiba'])->default('menunggu');
            $table->dateTime('dikirim_at')->nullable();
            $table->dateTime('tiba_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman');
    }
};
