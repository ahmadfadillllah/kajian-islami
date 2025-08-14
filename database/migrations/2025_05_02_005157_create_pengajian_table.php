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
        Schema::create('pengajian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('masjid_id')->constrained('masjid');
            $table->string('uuid')->nullable();
            $table->boolean('statusenabled')->default(1);
            $table->string('nama')->nullable();
            $table->string('jenis')->nullable();
            $table->string('ustadz')->nullable();
            $table->date('tanggal_kegiatan')->nullable();
            $table->string('durasi')->nullable();
            $table->string('status')->nullable();
            $table->text('keterangan')->nullable();
            $table->text('type')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('streaming')->nullable();
            $table->bigInteger('harga')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajian');
    }
};
