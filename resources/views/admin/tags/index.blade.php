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
            <a href="{{route('admin.tag.create')}}" class="btn btn-primary col-2" style="height: 42px;">
                <p>Thêm</p>
            </a>
        </div>
    </div>
    <div id="crudTable_wrapper" class="mb-2">
        <table class="table table-hover text-wrap bg-white ">
            <thead>
            <tr>
                <th style="width: 50px;">ID</th>
                <th>Tên</th>
                <th>Slug</th>
                <th>Length</th>
                <th>Last update</th>
                <th style="width: 150px;">Option</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $key => $tag)
                <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->name}}</td>
                    <td>{{$tag->slug}}</td>
                    <td>{{$tag->length}}</td>
                    <td>{{$tag->updated_at}}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('admin.tag.show', $tag->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-primary btn-sm" href="{{route('admin.tag.edit', $tag->id)}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{route('admin.tag.delete', $tag->id)}}" class="btn btn-danger btn-sm"
                           onclick="removeRow({{$tag->id}}">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row mt-2">
            <div class="col-sm-12 col-md-4">
                {!! $tags->appends(request()->all())->links() !!}
            </div>
        </div>
    </div>
@endsection

