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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_id')->constrained('rentals')->onDelete('cascade');
            $table->enum('metode_pembayaran', ['cash', 'transfer', 'ewallet']);
            $table->decimal('jumlah', 12, 2); 
            $table->enum('status', ['pending', 'lunas'])->default('pending');
            $table->string('bukti_pembayaran')->nullable(); // foto struk transfer/dll
            $table->date('tanggal_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
