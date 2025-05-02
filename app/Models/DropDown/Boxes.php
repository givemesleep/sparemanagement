<?php

namespace App\Models\DropDown;

use Illuminate\Database\Eloquent\Model;

class Boxes extends Model
{
    protected $table = 'tblboxes';
    protected $primaryKey = 'boxID';
    protected $fillable = ['boxDesc',];
}
