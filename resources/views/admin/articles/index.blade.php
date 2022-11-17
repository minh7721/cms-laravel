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
    <div class="row mb-3">
        <div class="col-1">
            <a href="{{route('admin.article.create')}}" class="btn btn-primary col-12" style="height: 38px;">
                <p>Thêm</p>
            </a>
        </div>
        <div class="ml-3">
            <select class="selectpicker categoryTag" data-live-search="true" data-style="btn-info" title="Danh mục" onchange="location = this.value;">
                @foreach($categories as $key=>$category)
                <option value="?category={{ $category->id }}" data-tokens="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

       <div class="ml-3 col-6">
           <select class="selectpicker categoryTag" data-live-search="true" data-style="btn-info" title="Tag" data-size="2" onchange="location = this.value;">
               @foreach($tags as $key=>$tag)
                   <option value="?tag={{ $tag->id }}" data-tokens="{{ $tag->name }}">{{ $tag->name }}</option>
               @endforeach
           </select>
       </div>

        <nav class="navbar navbar-light bg-light float-right">
            <form class="form-inline">
                <input class="form-control mr-sm-2" value="{{ $search ?? '' }}" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>

    </div>

    <div id="crudTable_wrapper" class="mb-2">
        <table class="table table-hover text-wrap bg-white ">
            <thead>
            <tr>
                <th style="width: 50px;">ID</th>
                <th>Tiêu đề</th>
                <th>Tác giả</th>
                <th>Thể loại</th>
                <th>Mô tả ngắn</th>
                <th>Tag</th>
                <th>Kích hoạt</th>
                <th style="width: 150px;">Option</th>
            </tr>
            </thead>
            <tbody>

            @foreach($articles as $key => $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td><a href="{{ route('frontend.detail.index', $article->slug) }}">{{$article->title}}</a></td>
                    <td>{{$article->author->name}}</td>
                    <td>{{$article->category?->name}}</td>
                    <td class="col-4">{{$article->description}}</td>
                    <th>
                        @foreach($article->tags as $tagItem)
                            {{ $tagItem->name.", " }}
                        @endforeach
                    </th>
                    <td>
                        <input type="radio" {{ $article->status == 1 ? 'checked' : '' }}>
                    </td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('admin.article.show', $article->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-primary btn-sm" href="{{route('admin.article.edit', $article->id)}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{route('admin.article.delete', $article->id)}}" class="btn btn-danger btn-sm"
                           onclick="removeRow({{$article->id}}">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row mt-2">
            <div class="col-sm-12 col-md-4">
                {!! $articles->appends(request()->all())->links() !!}
            </div>
        </div>
    </div>
@endsection

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>





