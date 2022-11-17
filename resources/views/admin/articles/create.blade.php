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
                        <form id="quickForm" action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input value="{{ old('title') }}" type="text" name="title" class="form-control" id="title" placeholder="Enter title">
                                </div>
                                <div class="form-group">
                                    <label for="parent">Danh mục cha</label>
                                    <select name="category_id" class="form-control">
                                        <option value="0"></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <label>Tag</label>--}}
{{--                                    <select class="form-control" name="tag_id">--}}
{{--                                        <option value="0"></option>--}}
{{--                                        @foreach($tags as $tag)--}}
{{--                                            <option value="{{$tag->id}}">{{$tag->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}

                                <div class="form-group">
                                    <label>Tag</label>
                                    <select class="selectpicker categoryTag form-control" name="tag_id" data-live-search="true" title="Tag" data-size="2">
                                            @foreach($tags as $key=>$tag)
                                                <option value="{{ $tag->id }}" data-tokens="{{ $tag->name }}">{{ $tag->name }}</option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="description">Mô tả ngắn</label>
                                    <input value="{{ old('description') }}" type="text" name="description" class="form-control" id="description" placeholder="Enter description">
                                </div>
                                <div class="form-group">
                                    <label for="content">Mô tả chi tiết</label>
                                    <textarea name="content" id="content" class="form-control" placeholder="Enter content">{{old('content')}}</textarea>
                                </div>
                                <div class="form-group w-50">
                                    <label>Ảnh bài viết</label>
                                    <input type="file" class="form-control" id="upload">
                                    <div id="image_show">

                                    </div>
                                    <input type="hidden" name="thumb" id="thumb">
                                </div>
                                <div class="form-group">
                                    <label>Kích hoạt</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" value="1" type="radio" id="active" name="status">
                                        <label for="active" class="custom-control-label">Có</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="status" checked="">
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
