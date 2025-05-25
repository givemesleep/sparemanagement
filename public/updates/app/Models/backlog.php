<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class auditor extends Model
{
   use HasFactory;
    protected $table = 'tblauditor';
    //FOR THE EASY CRUD IN THE PRODUCT CONTROLLER YOU NEED THIS
    protected $fillable = ['id', 'auditorName' ];
}
