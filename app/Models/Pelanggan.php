<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class);
    }
}