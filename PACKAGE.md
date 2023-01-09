# Sluggable
1. Install the package via Composer:

    ```sh
    $ composer require cviebrock/eloquent-sluggable
    ```

   The package will automatically register its service provider.

2. Optionally, publish the configuration file if you want to change any defaults:

    ```sh
    php artisan vendor:publish --provider="Cviebrock\EloquentSluggable\ServiceProvider"
    ```


## Updating your Eloquent Models

Your models should use the Sluggable trait, which has an abstract method `sluggable()`
that you need to define.  This is where any model-specific configuration is set
(see [Configuration](#configuration) below for details):

```php
use Cviebrock\EloquentSluggable\Sluggable;
class Post extends Model
{
    use Sluggable;
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
```

Of course, your model and database will need a column in which to store the slug.
You can use `slug` or any other appropriate name you want; your configuration array
will determine to which field the data will be stored.  You will need to add the
column (which should be `NULLABLE`) manually via your own migration.

That's it ... your model is now "sluggable"!



## Usage

Saving a model is easy:

```php
$post = Post::create([
    'title' => 'My Awesome Blog Post',
]);
```

So is retrieving the slug:

```php
echo $post->slug;
```

> **NOTE:** that if you are replicating your models using Eloquent's `replicate()` method,
> the package will automatically re-slug the model afterwards to ensure uniqueness.
```php
$post = Post::create([
    'title' => 'My Awesome Blog Post',
]);
// $post->slug is "my-awesome-blog-post"
$newPost = $post->replicate();
// $newPost->slug is "my-awesome-blog-post-1"
```


# Crawl Data

**Keyword**
* guzzle laravel
* https://viblo.asia/p/crawl-data-using-laravel-proxy-and-simple-html-dom-Az45bojwKxY
* Symfony dom crawler

# Elasticsearch

**Keyword**
* Scout Driver
* https://github.com/babenkoivan/elastic-scout-driver#installation
* 


[X] Lưu trữ file ở những đâu?
[X] Amazon S3 là gì? (Object storage) -> cung cấp API cho mình sử dụng
[X] Config để sử dụng s3 trong laravel
[ ] Không sử dụng laravel thì có s3 AWS CLI
[X] Môột số cách sử dụng trên AWS S3
[X] Làm sao để push lên S3
[X] Tạo Buckget
[X] Tạo user trên S3 (Quyền cơ bản)
[X] Lấy đường dẫn của ảnh để show lên giao diện
[ ] S3 interface và S3 API ?


# 19/10
[X] Crawl data: Category check theo name, nếu có thì add vào, không có thì tạo category mới
[X] Crawl data: Tag check theo name, nếu có thì add vào, không có thì tạo tag mới 
[X] Hoàn thiện Elasticsearch 
[X] Sửa lại giao diện blog

# Elasticsearch

**Keyword**
* Scout Driver
* https://github.com/babenkoivan/elastic-scout-driver#installation
* 


[X] Lưu trữ file ở những đâu?
[X] Amazon S3 là gì? (Object storage) -> cung cấp API cho mình sử dụng
[X] Config để sử dụng s3 trong laravel
[ ] Không sử dụng laravel thì có s3 AWS CLI
[X] Môột số cách sử dụng trên AWS S3
[X] Làm sao để push lên S3
[X] Tạo Buckget
[X] Tạo user trên S3 (Quyền cơ bản)
[X] Lấy đường dẫn của ảnh để show lên giao diện
[ ] S3 interface và S3 API ?


# 19/10
[X] Crawl data: Category check theo name, nếu có thì add vào, không có thì tạo category mới
[X] Crawl data: Tag check theo name, nếu có thì add vào, không có thì tạo tag mới 
[X] Hoàn thiện Elasticsearch 
[X] Sửa lại giao diện blog
