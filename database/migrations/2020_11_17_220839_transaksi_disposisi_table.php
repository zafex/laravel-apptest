<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransaksiDisposisiTable extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trx_disposisi');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_disposisi', function (Blueprint $table) {
            $table->string('id', 100)->default(DB::raw('uuid_generate_v4()'))->primary();
            $table->string('id_surat', 100);
            $table->string('id_employee', 100);
            $table->string('id_position', 100);
            $table->string('id_organization', 100);
            $table->string('id_reference', 100)->nullable()->comment('id trx_disposisi_detail');
            $table->string('section')->default('master')->comment('master; sumas; disposisi; terusan;');
            $table->string('nomor');
            $table->dateTime('tanggal');
            $table->text('keterangan')->nullable();
            $table->integer('status')->default(1);
            $table->string('created_by')->default('system:application');
            $table->dateTime('created_at')->useCurrent();
            $table->string('updated_by')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->string('deleted_by')->nullable();
            $table->dateTime('deleted_at')->nullable();

            $table->index('id_surat', 'trx_disposisi_id_surat_idx');
            $table->index('id_employee', 'trx_disposisi_id_employee_idx');
            $table->index('id_position', 'trx_disposisi_id_position_idx');
            $table->index('id_organization', 'trx_disposisi_id_organization_idx');
            $table->index('id_reference', 'trx_disposisi_id_reference_idx');
            $table->index('section', 'trx_disposisi_section_idx');
            $table->index('nomor', 'trx_disposisi_nomor_idx');
            $table->index('tanggal', 'trx_disposisi_tanggal_idx');
            $table->index('status', 'trx_disposisi_status_idx');
            $table->index('keterangan', 'trx_disposisi_keterangan_idx');
            $table->index('created_by', 'trx_disposisi_created_by_idx');
            $table->index('created_at', 'trx_disposisi_created_at_idx');

            $table->foreign('id_surat')->references('id')->on('trx_surat');
        });
    }
}
