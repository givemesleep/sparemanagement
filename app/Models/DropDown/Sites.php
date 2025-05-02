<?php

namespace App\Models\DropDown;

use Illuminate\Database\Eloquent\Model;

class Sites extends Model
{
    protected $table = 'tblsites';
    protected $primaryKey = 'site_ID';
    protected $fillable = ['siteDesc'];
    
}
