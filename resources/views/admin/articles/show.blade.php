@extends('admin.layouts.app')

@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1>{{$title}}</h1>
            </div>
        </div>
        @include('admin.includes.alert')
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">
                        <form id="quickForm" action="" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input disabled value="{{ $article->title }}" type="text" name="title" class="form-control" id="title" placeholder="Enter title">
                                </div>
                                <div class="form-group">
                                    <label for="parent">Danh mục cha</label>
                                    <select disabled name="category_id" class="form-control">
                                        <option value="0" {{ $article->category_id == 0 ? 'selected' : '' }}></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Tag</label>
                                    <select disabled class="form-control" name="tag_id">
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}" {{ $article->tags[0]->id == $tag->id ? 'selected' : '' }}>{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="description">Mô tả ngắn</label>
                                    <input disabled value="{{ $article->description }}" type="text" name="description" class="form-control" id="description" placeholder="Enter description">
                                </div>
                                <div class="form-group">
                                    <label for="content">Mô tả chi tiết</label>
                                    <p class="form-control">{!! $article->content !!}</p>
                                </div>
                                <div class="form-group w-50">
                                    <label>Ảnh bài viết</label>
                                    <div id="image_show">
                                        <a href="{{ $article->thumb }}" target="_blank">'
                                            <img src="{{$article->thumb}}" width="300px;" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <p>{{ $article->status == 1 ? 'Đang kích hoạt' : 'Chưa kích hoạt'}}</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('admin.article.edit', $article->id) }}" class="btn btn-primary">Sửa</a>
                                <a href="{{ route('admin.article.delete', $article->id) }}" class="btn btn-danger">Xóa</a>
                            </div>
                            @csrf
                        </form>
                    </div>

                </div>
                <div class="col-md-6">
                </div>

            </div>

        </div>
    </section>

@endsection
