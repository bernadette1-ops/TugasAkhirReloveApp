<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCenter extends Model
{
    protected $table = 'service_center'; 
    
    protected $primaryKey = 'kd_keluhan';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'gmail',
        'keluhan',
        'status'
    ];
}