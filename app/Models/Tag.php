<?php

namespace App\Models;

use App\Libs\StringUtils;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Elastic\ScoutDriverPlus\Searchable;

class Tag extends Model
{
    use HasFactory;
    use Sluggable;
    use Searchable;

    protected $table = 'tags';

    protected $guarded = ['id'];

    protected $casts = [
        'active' => 'boolean',
    ];

    protected $mapping = [
        'properties' => [
            'name' => [
                'type' => 'text',
                // Also you can configure multi-fields, more details you can find here https://www.elastic.co/guide/en/elasticsearch/reference/current/multi-fields.html
                'fields' => [
                    'raw' => [
                        'type' => 'keyword',
                    ]
                ]
            ],
        ]
    ];

    public function save(array $options = []): bool
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

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'normalized' => $this->normalized,
            'slug' => $this->slug,
            'length' => $this->length,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    public function searchableAs(): string
    {
        return 'name';
    }

//    public function getScoutKey()
//    {
//        return $this->name;
//    }
//
//    public function getScoutKeyName(): string
//    {
//        return 'name';
//    }
}
