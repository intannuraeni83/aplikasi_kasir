<?php

namespace App\Models;

use App\Traits\HashFormatRupiah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPenjualan extends Model
{
    use HasFactory;
   

    protected $guarded = ['id'];
    protected $table = 'detail_penjualan';

    public function penjualan() 
    {
        return $this->BelongsTo(Penjualan::class);
    }
    public function produk() 
    {
        return $this->BelongsTo(Produk::class);
    }
}