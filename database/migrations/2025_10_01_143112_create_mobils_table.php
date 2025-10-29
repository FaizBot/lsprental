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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->string('nama_mobil', 100);
            $table->string('merk', 50);
            $table->string('plat_nomor', 20)->unique();
            $table->string('warna', 30)->nullable();
            $table->string('transmisi');
            $table->string('bahan_bakar');
            $table->year('tahun')->nullable();
            $table->decimal('harga_sewa', 12, 2);
            $table->enum('status', ['tersedia', 'disewa', 'maintenance'])->default('tersedia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
