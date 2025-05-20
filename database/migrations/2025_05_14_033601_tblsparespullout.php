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
        Schema::create('tblsparespullout', function(Blueprint $table ){
            $table->id('PullOutID')->autoIncrement()->comment('Primary Key');
            $table->foreignId('sparesID');
            $table->date('PullOutDate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblsparespullout');
    }
};
