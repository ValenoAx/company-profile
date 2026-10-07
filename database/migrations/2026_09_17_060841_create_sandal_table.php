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
        Schema::create('sandal', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sandal', 100);
            $table->string('gambar', 255);
            $table->enum('ukuran', [36, 37, 38, 39, 40, 41, 42, 43])->default(36);
            $table->text('deskripsi');
            $table->decimal('harga', 12, 0);
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sandal');
    }
};
