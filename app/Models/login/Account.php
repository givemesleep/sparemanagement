<?php

namespace App\Models\login;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'email', 'password', 'role', 'account_id'];
    protected $hidden = [
        'password',
    ];
}
