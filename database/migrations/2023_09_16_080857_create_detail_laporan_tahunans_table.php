<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_laporan_tahunans', function (Blueprint $table) {
            $table->id();
            $table->integer('laporan_tahunan_id');
            $table->integer('dokumen_id');
            $table->string('keterangan');
            $table->enum('status', ['Disetujui', 'Ditolak', 'Progress']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_laporan_tahunans');
    }
};
