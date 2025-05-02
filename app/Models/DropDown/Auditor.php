<?php

namespace App\Models\DropDown;

use Illuminate\Database\Eloquent\Model;

class Auditor extends Model
{
    protected $table = 'tblauditor';
    protected $primaryKey = 'auditorID';
    protected $fillable = ['auditorName'];

}
