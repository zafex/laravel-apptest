<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MasterKodifikasiTable extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_kodifikasi');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_kodifikasi', function (Blueprint $table) {
            $table->string('id', 100)->default(DB::raw('uuid_generate_v4()'))->primary();
            $table->string('id_organization', 100);
            $table->string('group')->default('sifat');
            $table->string('label');
            $table->string('code');
            $table->text('description')->nullable();
            $table->integer('status')->default(1);
            $table->integer('order')->default(1);
            $table->string('created_by')->default('system:application');
            $table->dateTime('created_at')->useCurrent();
            $table->string('updated_by')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->string('deleted_by')->nullable();
            $table->dateTime('deleted_at')->nullable();

            $table->index('id_organization', 'mst_kodifikasi_id_organization_idx');
            $table->index('code', 'mst_kodifikasi_code_idx');
            $table->index('group', 'mst_kodifikasi_group_idx');
            $table->index('label', 'mst_kodifikasi_label_idx');
            $table->index('description', 'mst_kodifikasi_description_idx');
            $table->index('status', 'mst_kodifikasi_status_idx');
            $table->index('order', 'mst_kodifikasi_order_idx');
            $table->index('created_by', 'mst_kodifikasi_created_by_idx');
            $table->index('created_at', 'mst_kodifikasi_created_at_idx');
        });
    }
}
