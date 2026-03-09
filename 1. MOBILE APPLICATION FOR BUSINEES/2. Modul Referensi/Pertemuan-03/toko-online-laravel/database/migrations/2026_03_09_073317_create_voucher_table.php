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
        Schema::create('voucher', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20)->unique();
            $table->string('deskripsi')->nullable();
            $table->enum('tipe', ['persen', 'nominal', 'ongkir']);
            $table->decimal('nilai', 10, 2);
            $table->decimal('min_belanja', 15, 2)->default(0);
            $table->decimal('max_potongan', 15, 2)->nullable();
            $table->integer('kuota')->nullable();
            $table->integer('terpakai')->default(0);
            $table->dateTime('berlaku_sampai')->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher');
    }
};
