<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Identitas extends Authenticatable
{
    protected $table = 'identitas';

    protected $primaryKey = 'kd_identitas';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'gmail',
        'password',
        'photo',
        'role'
    ];

    protected $hidden = [
        'password'
    ];

    public function getAuthIdentifierName()
    {
        return 'gmail';
    }
}