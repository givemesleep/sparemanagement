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
        Schema::create('accounts', function(Blueprint $accounts){
            $accounts->id('account_id');
            $accounts->string('username');
            $accounts->string('email');
            $accounts->string('password');
            $accounts->integer('role');
            $accounts->timestamps();
            $accounts->boolean('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
