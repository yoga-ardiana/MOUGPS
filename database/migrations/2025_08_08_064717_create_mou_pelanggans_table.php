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
        Schema::create('mou_pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('namaPelanggan');
            $table->string('email')->nullable();
            $table->text('deskripsiProduk');
            $table->text('note');
            $table->string('telp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mou_pelanggans');
    }
};
