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

class Article extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    protected $table = 'articles';

    protected $guarded = ['id'];

    protected $casts = [
        'featured'  => 'boolean',
    ];

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

//    public function getCreatedAtAttribute($date)
//    {
//        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y');
//    }
//
//    public function getUpdatedAtAttribute($date)
//    {
//        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y');
//    }

}
