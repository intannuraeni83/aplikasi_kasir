<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    
        use HasFactory;
    
        protected $table = 'produk'; // Nama tabel produk dalam database
    
        protected $fillable = [
            'nama_produk',
            'harga',
            'stok',
            // Tidak ada definisi relasi yang diperlukan jika hanya ingin mengakses produk dari detail penjualan.
        ];
    
}
