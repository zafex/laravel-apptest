<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransaksiDisposisiTujuanTable extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trx_disposisi_tujuan');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_disposisi_tujuan', function (Blueprint $table) {
            $table->string('id', 100)->default(DB::raw('uuid_generate_v4()'))->primary();
            $table->string('id_disposisi', 100);
            $table->string('id_employee', 100);
            $table->string('id_position', 100);
            $table->string('id_organization', 100);
            $table->integer('status')->default(1);
            $table->string('created_by')->default('system:application');
            $table->dateTime('created_at')->useCurrent();
            $table->string('updated_by')->nullable();
            $table->dateTime('updated_at')->nullable();

            $table->index('id_disposisi', 'trx_disposisi_tujuan_id_disposisi_idx');
            $table->index('id_employee', 'trx_disposisi_tujuan_id_employee_idx');
            $table->index('id_position', 'trx_disposisi_tujuan_id_position_idx');
            $table->index('id_organization', 'trx_disposisi_tujuan_id_organization_idx');
            $table->index('status', 'trx_disposisi_tujuan_status_idx');
            $table->index('created_by', 'trx_disposisi_tujuan_created_by_idx');
            $table->index('created_at', 'trx_disposisi_tujuan_created_at_idx');

            $table->foreign('id_disposisi')->references('id')->on('trx_disposisi');
        });
    }
}
