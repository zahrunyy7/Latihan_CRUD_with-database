<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
// database/migrations/xxxx_create_parfums_table.php
// database/migrations/xxxx_create_parfums_table.php

public function up(): void
{
    Schema::create('parfums', function (Blueprint $table) {
        $table->id();
        $table->string('nama_parfum');
        $table->string('foto')->nullable();
        $table->decimal('harga', 10, 2);
        $table->text('deskripsi')->nullable(); // <-- TAMBAH KOLOM DESKRIPSI
        $table->timestamps();
    });
} /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parfums');
    }
};
