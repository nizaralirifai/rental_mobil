<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'nama_pemesan',
        'harga',
        'merek_mobil',
        'waktu_pembayaran',
        'metode_pembayaran',
        'no_hp_pemesan'
    ];
}
