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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            // FK ke tabel users
            // onDelete('cascade') = kalau user dihapus, project-nya ikut terhapus otomatis
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('name');                      // nama project, wajib ada
            $table->text('description')->nullable();     // deskripsi, boleh kosong

            // Warna label hex untuk tampilan kartu, misal: #3B82F6 (biru)
            $table->string('color')->default('#3B82F6');

            $table->timestamps();  // membuat kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
