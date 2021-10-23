<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransaksiSuratTable extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trx_surat');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_surat', function (Blueprint $table) {
            $table->string('id', 100)->default(DB::raw('uuid_generate_v4()'))->primary();
            $table->string('id_organization', 100);
            $table->string('id_employee', 100);
            $table->string('id_position', 100);
            $table->string('id_klasifikasi', 100);
            $table->string('id_sifat', 100);
            $table->string('id_jenis', 100);
            $table->text('perihal')->nullable();
            $table->text('ringkasan')->nullable();
            $table->string('nomor')->nullable();
            $table->dateTime('tanggal');
            $table->integer('status')->default(1);
            $table->string('created_by')->default('system:application');
            $table->dateTime('created_at')->useCurrent();
            $table->string('updated_by')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->string('deleted_by')->nullable();
            $table->dateTime('deleted_at')->nullable();

            $table->index('id_organization', 'trx_surat_id_organization_idx');
            $table->index('id_employee', 'trx_surat_id_employee_idx');
            $table->index('id_position', 'trx_surat_id_position_idx');
            $table->index('id_klasifikasi', 'trx_surat_id_klasifikasi_idx');
            $table->index('id_sifat', 'trx_surat_id_sifat_idx');
            $table->index('id_jenis', 'trx_surat_id_jenis_idx');
            $table->index('perihal', 'trx_surat_perihal_idx');
            $table->index('ringkasan', 'trx_surat_ringkasan_idx');
            $table->index('nomor', 'trx_surat_nomor_idx');
            $table->index('tanggal', 'trx_surat_tanggal_idx');
            $table->index('status', 'trx_surat_status_idx');
            $table->index('created_by', 'trx_surat_created_by_idx');
            $table->index('created_at', 'trx_surat_created_at_idx');
        });
    }
}
