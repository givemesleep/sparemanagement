<?php

namespace App\Models\DropDown;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'tblwarehouse';
    protected $primaryKey = 'wareID';
    protected $fillable = ['warehouseDesc',];
    
}
