<?php

namespace App\Models\DropDown;

use Illuminate\Database\Eloquent\Model;

class Manufactor extends Model
{
    protected $table = 'tblmanufactor';
    protected $primaryKey = 'manuID';
    protected $fillable = ['manuDesc'];
}
