<?php

namespace App\Models\DropDown;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $table = 'tblplatform';
    protected $primaryKey = 'platformID';
    protected $fillable = ['platformDesc',];
}
