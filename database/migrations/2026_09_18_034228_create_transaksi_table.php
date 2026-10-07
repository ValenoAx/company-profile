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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sandal',)->constrained('sandal')->onDelete('cascade');
            $table->foreignId('id_pelanggan',)->constrained('pelanggan')->onDelete('cascade');
            $table->foreignId('id_users',)->constrained('users')->onDelete('cascade');
            $table->decimal('total_bayar', 12, 0);
            $table->enum('status', ['Lunas', 'Belum Lunas'])->default('Belum Lunas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
