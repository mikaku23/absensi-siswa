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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 30);
            $table->string('nisn', 20);
            $table->text('alamat');
            $table->string('nohp', 13);
            $table->string('username', 30);
            $table->string('password', 30);
            $table->string('nohp_wm', 13);
            $table->string('nama_wm', 30);
            $table->text('alamat_wm');
            $table->foreignId('id_local')->references('id')->on('locals')->onDelete('cascade');
            $table->foreignId('id_pengguna')->references('id')->on('penggunas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
