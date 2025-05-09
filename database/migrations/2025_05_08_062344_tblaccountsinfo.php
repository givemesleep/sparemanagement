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
        Schema::create('tblaccountsinfo', function(Blueprint $accounts){
            $accounts->id('accountID');
            $accounts->string('username');
            $accounts->string('email');
            $accounts->string('password');
            $accounts->integer('role');
            $accounts->timestamps();
            $accounts->smallInteger('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblaccountsinfo');
    }
};
