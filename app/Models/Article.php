<?php

namespace App\Models;

use App\Models\Enums\ArticleStatus;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Elastic\ScoutDriverPlus\Searchable;

class Article extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    use Searchable;

    protected $table = 'articles';

    protected $guarded = ['id'];

    protected $casts = [
        'featured'  => 'boolean',
    ];

    protected $mapping = [
        'properties' => [
            'title' => [
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


    public function toSearchableArray()
    {
//        $array = $this->toArray();
//        return $array;
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'author_id' => $this->author_id,
            'title' => $this->title,
            'slug' => $this->slug,
            'thumb' => $this->thumb,
            'description' => $this->description,
            'content' => $this->content,
            'status' => $this->status,
            'views' => $this->views,
            'created_at' => $this->created_at
        ];
    }

//    public function searchableRouting()
//    {
//        return $this->articles->id;
//    }

    public function searchableAs(): string
    {
        return 'title';
    }

//    public function getScoutKey()
//    {
//        return $this->title;
//    }
//
//    public function getScoutKeyName()
//    {
//        return 'title';
//    }



    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'article_tag', 'article_id', 'tag_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', ArticleStatus::PUBLISHED);
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('featured', true);
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y');
    }


}
