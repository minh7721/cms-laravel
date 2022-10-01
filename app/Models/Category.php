<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $guarded = ['id'];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function articles() {
        return $this->hasMany(Article::class, 'category_id');
    }
}
