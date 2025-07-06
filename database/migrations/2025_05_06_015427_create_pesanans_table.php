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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->constrained()->cascadeOnDelete();
            $table->string('nama_pembeli');
            $table->string('email_pembeli');
            $table->string('no_hp');
            $table->integer('jumlah');
            $table->decimal('total_harga', 15, 2);
            $table->string('status')->default('pending'); // pending / paid / expired
            $table->string('reference')->nullable(); // dari Tripay
            $table->string('merchant_ref')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
