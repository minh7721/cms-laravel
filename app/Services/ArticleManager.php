<?php

namespace App\Services;

//Article, Category, Tag
use App\Libs\StringUtils;
use App\Models\Article;
use App\Models\Category;
use App\Models\Enums\ArticleStatus;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

class ArticleManager
{
    /**
     * Tìm Hoặc tạo mới category
     * @return Category|Model
     */
    public static function getCategory(string $name, array $data = []) {
        return Category::firstOrCreate([
            'name' => $name
        ], [
            'description' => $name,
            'content' => $name,
        ]);
    }

    public static function getTag(string $name): Model|Tag
    {
        $normalized = StringUtils::normalize($name);
        return Tag::firstOrCreate([
            'normalized' => $normalized,
        ], ['name' => $name]);
    }

    /**
     * Kiểm tra article tồn tại không?
     * @return Article|null
     */
    public static function existedBySource(string $source)
    {
        return Article::where('source', $source)->first();
    }

    public static function store($source, $category, array $data = []): Model|Article
    {
        return Article::firstOrCreate([
            'source' => $source,
        ],[
            'author_id' => 1,
            'category_id' => $category,
            'title' => $data['title'],
            'thumb' => $data['thumb'],
            'description' => $data['description'],
            'content' => $data['content'][0][0],
            'status' => ArticleStatus::PUBLISHED,
            'source' => $source
        ]);
    }

    public static function updateOrCreateThumb(Article $article, $content,  bool $force = true) {
        if (!empty($user->avatar)) {
            if (!$force) return true;
            $path_info = $user->avatar;
            $new_file = false;
        } else {
            $disk = 'public'; //sử dụng config
            $path = 'article/' . Article::make($article->id, 'jpg');
//            $path_info = new DiskPathInfo($disk, $path);
//            $new_file = true;
        }

        $content = is_array($content) ? json_encode($content) : $content;
        if ($path_info->put($content)) {
            if ($new_file) {
                $article->thumb = $path_info;
                return $article->save();
            }
            return true;
        } else {
            \Log::error("Can't not update Avatar for user [$article->id] : ");
            return false;
        }
    }
}
