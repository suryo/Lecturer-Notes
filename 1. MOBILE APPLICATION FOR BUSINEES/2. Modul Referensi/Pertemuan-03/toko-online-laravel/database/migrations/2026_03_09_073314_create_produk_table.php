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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori')->constrained('kategori')->onDelete('cascade');
            $table->string('nama', 200);
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 15, 2);
            $table->integer('stok')->default(0);
            $table->integer('berat_gram')->nullable();
            $table->integer('terjual')->default(0);
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->enum('status', ['aktif', 'nonaktif', 'habis'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
