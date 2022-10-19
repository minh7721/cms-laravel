<?php

namespace App\Services;

//Article, Category, Tag
use App\Libs\StringUtils;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;

class ArticleManager
{
    /**
     * Tìm Hoặc tạo mới category
     * @return Category
     */
    public static function getCategory(string $name, array $data = []) {
        return Category::firstOrCreate([
            'name' => $name
        ], $data);
    }

    public static function getTag(string $name, array $data = []) {
        $normalized = StringUtils::normalize($name);

        return Tag::firstOrCreate([
            'normalized' => $normalized,
        ], array_merge($data, ['name' => $name]));
    }


    /**
     * Kiểm tra article tồn tại không?
     * @return Article|null
     */
    public static function existedBySource(string $source) {
        return Article::where('source', $source)->first();
    }

    public static function store() {

    }

    public static function updateOrCreateThumb(Article $article, $content) {

    }
}