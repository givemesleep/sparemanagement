<?php

namespace App\Models\DropDown;

use Illuminate\Database\Eloquent\Model;

class hwCateg extends Model
{
    protected $table = 'tblhwcateg';
    protected $primaryKey = 'hwcatID';
    protected $fillable = ['hwcatDesc',];

}
