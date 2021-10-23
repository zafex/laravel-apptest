<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransaksiSuratDetailTable extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trx_surat_detail');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_surat_detail', function (Blueprint $table) {
            $table->string('id', 100)->default(DB::raw('uuid_generate_v4()'))->primary();
            $table->string('id_surat', 100);
            $table->text('content');
            $table->integer('order')->default(1);

            $table->index('id_surat', 'trx_surat_detail_id_surat_idx');
            $table->index('content', 'trx_surat_detail_content_idx');
            $table->index('order', 'trx_surat_detail_order_idx');

            $table->foreign('id_surat')->references('id')->on('trx_surat');
        });
    }
}
