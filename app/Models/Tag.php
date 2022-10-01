<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $guarded = ['id'];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tag');
    }
}
