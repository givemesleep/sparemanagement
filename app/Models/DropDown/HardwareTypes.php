<?php

namespace App\Models\DropDown;

use Illuminate\Database\Eloquent\Model;

class HardwareTypes extends Model
{
    protected $table = 'tblhardware';
    protected $primaryKey = 'hardwareID';
    protected $fillable = ['hardwareType'];
}
