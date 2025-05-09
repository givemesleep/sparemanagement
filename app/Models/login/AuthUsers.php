<?php

namespace App\Models\login;

use Illuminate\Database\Eloquent\Model;

class AuthUsers extends Model
{
    //

    protected $table = 'tblaccountsinfo';
    protected $primaryKey = 'accountID';
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'is_active',
        'accountID'
    ];
}
