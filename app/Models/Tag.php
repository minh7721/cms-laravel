<?php

namespace App\Models;

use App\Libs\StringUtils;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'tags';

    protected $guarded = ['id'];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function save(array $options = [])
    {
        if (empty($this->length)) {
            $this->length = StringUtils::wordsCount($this->name);
        }
        return parent::save($options);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'article_tag',  'tag_id', 'article_id');
    }
}
