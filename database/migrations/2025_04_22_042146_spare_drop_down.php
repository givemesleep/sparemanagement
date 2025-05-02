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
        Schema::create('tblauditor', function(Blueprint $auditors){
            $auditors->id('auditorID');
            $auditors->string('auditorName');

        });

        Schema::create('tblboxes', function(Blueprint $boxes){
            $boxes->id('boxID');
            $boxes->string('boxDesc');
        });

        Schema::create('tblclass', function(Blueprint $class){
            $class->id('classID');
            $class->string('className');

        });

        Schema::create('tblcompa', function(Blueprint $compa){
            $compa->id('compaID');
            $compa->string('compaDesc');
        });

        Schema::create('tblhardware', function(Blueprint $hardware){
            $hardware->id('hardwareID');
            $hardware->string('hardwareType');
        });

        Schema::create('tblhwcateg', function(Blueprint $hwcat){
            $hwcat->id('hwcatID');
            $hwcat->string('hwcatDesc');
        });

        Schema::create('tblmanufactor', function(Blueprint $manu){
            $manu->id('manuID');
            $manu->string('manuDesc');
        });

        Schema::create('tblplatform', function(Blueprint $platform){
            $platform->id('platformID');
            $platform->string('platformDesc');
        });

        Schema::create('tblwarehouse', function(Blueprint $ware){
            $ware->id('wareID');
            $ware->string('warehouseDesc');
        });

        Schema::create('tblsites', function(Blueprint $sites){
            $sites->id('siteID');
            $sites->string('siteDesc');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblauditor');
        Schema::dropIfExists('tblboxes');
        Schema::dropIfExists('tblclass');
        Schema::dropIfExists('tblcompa');
        Schema::dropIfExists('tblhardware');
        Schema::dropIfExists('tblhwcateg');
        Schema::dropIfExists('tblmanufactor');
        Schema::dropIfExists('tblplatform');
        Schema::dropIfExists('tblwarehouse');
        Schema::dropIfExists('tblsites');
    }
};
