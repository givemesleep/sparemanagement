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
        Schema::create('tblsparesinfo', function (Blueprint $table) {
            $table->id('sparesID')->autoIncrement()->comment('Primary Key');
            $table->string('manufacturer');
            $table->string('hardware_type');
            $table->string('hardware_category');
            $table->string('descriptions');
            $table->string('part_model1');
            $table->string('part_model2')->nullable();
            $table->string('part_model3')->nullable();
            $table->string('serial_model')->nullable();
            $table->string('warehouse_loc');
            $table->string('hardware_site')->nullable();
            $table->string('platform_type')->nullable();
            $table->string('received_by');
            $table->tinyInteger('is_active')->default(1)->comment('0: Archive, 1: Available');
            $table->tinyInteger('is_pullout')->default(0)->comment('0: Not pullout, 1: Pullout');
            $table->tinyInteger('is_defect')->default(0)->comment('0: Not defect, 1: Defect');
            $table->tinyInteger('is_approved')->default(0)->comment('0: Not Approved, 1: Approved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblsparesinfo');
    }
};
