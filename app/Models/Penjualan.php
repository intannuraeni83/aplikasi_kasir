<?php

namespace App\Models;

use App\Traits\HashFormatRupiah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    use HasFactory;


    protected $guarded = ['id'];
    protected $table = 'penjualan';

    public function pelanggan() 
    {
        return $this->BelongsTo(Pelanggan::class);
    }

    public function detailpenjualan() 
    {
        return $this->hasMany(DetailPenjualan::class);
    }
}