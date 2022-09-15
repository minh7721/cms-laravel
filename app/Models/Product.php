<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'content',
        'menu_id',
        'thumb',
        'price',
        'price_sale',
        'active'
    ];

    public function menu(): HasOne
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }

}
