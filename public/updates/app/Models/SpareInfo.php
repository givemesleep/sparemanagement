<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class SpareInfo extends Model
{
    use HasFactory;
    protected $table = 'tblsparesinfo';

    protected $fillable = [
        'manufacturer',
        'hardware_type',
        'hardware_category',
        'descriptions',
        'part_model1',
        'part_model2',
        'part_model3',
        'serial_model',
        'warehouse_loc',
        'hardware_site',
        'platform_type',
        'received_by',
    ];
    //'manufacturer','hardware_type','hardware_category','descriptions','part_model1','part_model2','part_model3',serial_model,warehouse_loc,hardware_site,'platform_type','received_by'
}
