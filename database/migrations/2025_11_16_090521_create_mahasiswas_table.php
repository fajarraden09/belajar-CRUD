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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id(); // Otomatisasi membuat kolom 'Id' Primary Key
            $table->string('nama'); // Kolom 'nama' bertipe string
            $table->string('nim')->unique(); // Kolom 'nim' tipe string yang wajib unik
            $table->string('jurusan'); // kolom 'jurusan' tipe striing
            $table->string('email')->unique(); // Kolom 'email' tipe string wajib unik
            $table->timestamps(); // otomatisasi membuat 'created_at' dan 'update_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
