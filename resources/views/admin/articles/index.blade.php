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
        <div class="col-4">
            <a href="{{route('admin.article.create')}}" class="btn btn-primary col-2" style="height: 42px;">
                <p>Thêm</p>
            </a>
        </div>
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
                    <td>{{$article->title}}</td>
                    <td>{{$article->author->name}}</td>
                    <td>{{$article->category->name }}</td>
                    <td>{{$article->title}}</td>
                    <th>{{$article->tags[0]->name}}</th>
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
