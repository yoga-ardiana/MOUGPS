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
        Schema::table('mou_pelanggans', function (Blueprint $table) {
            //
             $table->string('token')->unique()->after('telp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mou_pelanggans', function (Blueprint $table) {
            //
        });
    }
};
