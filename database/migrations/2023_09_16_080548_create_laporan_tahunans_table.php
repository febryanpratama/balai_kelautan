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
        Schema::create('laporan_tahunans', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_id');
            $table->integer('user_id');
            $table->enum('status', ['Progress', 'Disetujui', 'Ditolak']);
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
        Schema::dropIfExists('laporan_tahunans');
    }
};
