<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MasterInstruksiTable extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_instruksi');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_instruksi', function (Blueprint $table) {
            $table->string('id', 100)->default(DB::raw('uuid_generate_v4()'))->primary();
            $table->string('id_organization', 100);
            $table->text('description')->nullable();
            $table->integer('status')->default(1);
            $table->integer('order')->default(1);
            $table->string('created_by')->default('system:application');
            $table->dateTime('created_at')->useCurrent();
            $table->string('updated_by')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->string('deleted_by')->nullable();
            $table->dateTime('deleted_at')->nullable();

            $table->index('id_organization', 'mst_instruksi_id_organization_idx');
            $table->index('description', 'mst_instruksi_description_idx');
            $table->index('status', 'mst_instruksi_status_idx');
            $table->index('order', 'mst_instruksi_order_idx');
            $table->index('created_by', 'mst_instruksi_created_by_idx');
            $table->index('created_at', 'mst_instruksi_created_at_idx');
        });
    }
}
