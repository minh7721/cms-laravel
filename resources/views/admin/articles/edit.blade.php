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
                        <form id="quickForm" action="{{ route('admin.article.update', $article->id) }}" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input value="{{ $article->title }}" type="text" name="title" class="form-control" id="title" placeholder="Enter title">
                                </div>
                                <div class="form-group">
                                    <label for="parent">Danh mục cha</label>
                                    <select name="category_id" class="form-control">
                                        <option value="0" {{ $article->category_id == 0 ? 'selected' : '' }}></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Tag</label>
                                    <select class="form-control" name="tag_id">
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}" {{ $article->tags[0]->id == $tag->id ? 'selected' : '' }}>{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="description">Mô tả ngắn</label>
                                    <input value="{{ $article->description }}" type="text" name="description" class="form-control" id="description" placeholder="Enter description">
                                </div>
                                <div class="form-group">
                                    <label for="content">Mô tả chi tiết</label>
                                    <textarea name="content" id="content" class="form-control" placeholder="Enter content">{{ $article->content }}</textarea>
                                </div>
                                <div class="form-group w-50">
                                    <label>Ảnh bài viết</label>
                                    <input type="file" class="form-control" id="upload">
                                    <div id="image_show">
                                        <a href="{{ $article->thumb }}" target="_blank">'
                                            <img src="{{$article->thumb}}" width="100px;" alt="">
                                        </a>
                                    </div>
                                    <input type="hidden" name="thumb" id="thumb">
                                </div>
                                <div class="form-group">
                                    <label>Kích hoạt</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" value="1" type="radio" id="active" name="status" {{ $article->status == 1 ? 'checked' : ''}}>
                                        <label for="active" class="custom-control-label">Có</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="status" {{ $article->status == 0 ? 'checked' : ''}}>
                                        <label for="no_active" class="custom-control-label">Không</label>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
