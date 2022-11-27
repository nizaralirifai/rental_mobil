<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental_Mobil extends Model
{
    protected $fillable = [
        'merek', 
        'warna',
        'tahun_pembuatan',
        'tipe', 
        'tempat_duduk', 
        'bahan_bakar', 
        'audio', 
        'aksesoris', 
        'harga'];
}
