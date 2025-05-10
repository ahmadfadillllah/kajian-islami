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
        Schema::create('verifikasi', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->boolean('statusenabled')->default(1);
            $table->string('users_uuid')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->string('persetujuan')->nullable();
            $table->string('kategori')->nullable();
            $table->string('uuid_reference')->nullable();
            $table->boolean('verified')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifikasi');
    }
};
