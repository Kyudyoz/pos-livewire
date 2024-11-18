<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Menu extends Model
{
    /** @use HasFactory<\Database\Factories\MenuFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'desc',
        'type',
        'photo',
    ];

    public static $types = ['Makanan', 'Minuman'];

    public function getHargaAttribute()
    {
        return 'Rp. ' . number_format($this->attributes['price'], 0, ',', '.');
    }

    public function getGambarAttribute()
    {
        return $this->photo ? asset('storage/' . $this->photo) : url('img/no-img.jpg');
    }
}
