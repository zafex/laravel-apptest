<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransaksiDisposisiInstruksiTable extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trx_disposisi_instruksi');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_disposisi_instruksi', function (Blueprint $table) {
            $table->string('id_disposisi', 100);
            $table->string('id_instruksi', 100);
            $table->foreign('id_disposisi')->references('id')->on('trx_disposisi');
            $table->foreign('id_instruksi')->references('id')->on('mst_instruksi');
            $table->primary(['id_disposisi', 'id_instruksi']);
        });
    }
}
