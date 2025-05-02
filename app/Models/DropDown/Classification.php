<?php

namespace App\Models\DropDown;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    protected $table = 'tblclass';
    protected $primaryKey = 'classID';
    protected $fillable = ['className',];
    
}
