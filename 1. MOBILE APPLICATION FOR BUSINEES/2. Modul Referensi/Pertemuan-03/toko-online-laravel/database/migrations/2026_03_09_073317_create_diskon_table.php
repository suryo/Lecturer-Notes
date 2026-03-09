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
        Schema::create('diskon', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100)->nullable();
            $table->enum('tipe', ['persen', 'nominal']);
            $table->decimal('nilai', 10, 2);
            $table->dateTime('berlaku_dari')->nullable();
            $table->dateTime('berlaku_sampai')->nullable();
            $table->foreignId('id_produk')->nullable()->constrained('produk')->onDelete('cascade');
            $table->foreignId('id_kategori')->nullable()->constrained('kategori')->onDelete('cascade');
            $table->decimal('min_pembelian', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diskon');
    }
};
