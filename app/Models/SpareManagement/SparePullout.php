<?php

namespace App\Models\SpareManagement;

use Illuminate\Database\Eloquent\Model;

class SparePullout extends Model
{
    protected $table = '';
    protected $fillable = [
        'PullOutID',
        'sparesID',
        'PullOutDate'
    ];

    protected $primaryKey = 'PullOutID';

}
