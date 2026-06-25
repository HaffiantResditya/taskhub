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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            // FK ke projects — kalau project dihapus, task-nya ikut terhapus
            $table->foreignId('project_id')->constrained()->onDelete('cascade');

            // FK ke users — siapa yang membuat task ini
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('title');              // judul task, wajib ada
            $table->text('description')->nullable(); // detail task, boleh kosong

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
