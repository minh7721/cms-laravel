@extends('admin.layouts.app')

@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1>{{$title}}</h1>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div id="crudTable_wrapper" class="mb-2">
        <table class="table table-hover text-wrap bg-white ">
            <thead>
            <tr>
                <th style="width: 50px;">ID</th>
                <th>Tác giả</th>
                <th>Thể loại</th>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Mô tả chi tiết</th>
                <th>Kích hoạt</th>
                <th>Created</th>
                <th style="width: 150px;">Option</th>
            </tr>
            </thead>
            <tbody>

            @foreach($articles as $key => $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td>{{$article->author_id}}</td>
                    <td>{{$article->category_id}}</td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->description}}</td>
                    <td>{{$article->content}}</td>
                    <td>{{$article->status}}</td>
                    <td>{{$article->created_at}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a class="btn btn-success btn-sm" href="#">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row mt-2">
            {{--            <div class="col-sm-12 col-md-4">--}}
            {{--            </div>--}}
            {{--            <div class="col-sm-0 col-md-4 text-center">--}}
            {{--            </div>--}}
            <div class="col-sm-12 col-md-4">
                {!! $articles->appends(request()->all())->links() !!}
            </div>
        </div>
    </div>
@endsection
