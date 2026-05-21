<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    protected $table = 'donasi';

    protected $primaryKey = 'kd_barang';

    public $timestamps = false;

    protected $fillable = [
        'pengirim',
        'gambar',
        'barang',
        'daerah',
        'jumlah',
        'keterangan'
    ];
}