<?php

namespace App\Models\SpareManagement;

use Illuminate\Database\Eloquent\Model;

class SpareTicket extends Model
{
    protected $table = 'tblsparesinfo'; // Specify the table name
    protected $primaryKey = 'sparesID'; // Specify the primary key
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
        'is_active',
        'is_pullout',
        'is_defect',
        'is_approved',
    ];
}
