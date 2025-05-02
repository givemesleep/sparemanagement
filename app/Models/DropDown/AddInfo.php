<?php

namespace App\Models\DropDown;

use Illuminate\Database\Eloquent\Model;

class AddInfo extends Model
{
    protected $table = 'tblcompa';
    protected $primaryKey = 'compaID';
    protected $fillable = ['compaDesc',];
}
