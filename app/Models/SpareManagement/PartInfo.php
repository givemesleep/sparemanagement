<?php

namespace App\Models\SpareManagement;

use Illuminate\Database\Eloquent\Model;

class PartInfo extends Model
{
    protected $table = 'tblpartinfo'; // Specify the table name
    protected $primaryKey = 'partID'; // Specify the primary key
    protected $fillable = [
        'partNum',
        'partStatus'
    ];

    public $timestamps = true; // Enable timestamps if needed
}
