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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_alamat')->constrained('alamat')->onDelete('cascade');
            $table->string('kode_pesanan', 30)->unique();
            $table->enum('status', ['menunggu_bayar','dibayar','dikemas','dikirim','selesai','dibatalkan'])->default('menunggu_bayar');
            $table->decimal('subtotal', 15, 2);
            $table->decimal('diskon_voucher', 15, 2)->default(0);
            $table->decimal('ongkir', 15, 2)->default(0);
            $table->decimal('diskon_ongkir', 15, 2)->default(0);
            $table->decimal('total', 15, 2);
            $table->foreignId('id_voucher')->nullable()->constrained('voucher')->onDelete('set null');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
