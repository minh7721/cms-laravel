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
            <a href="{{route('admin.category.create')}}" class="btn btn-primary col-2" style="height: 42px;">
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
                <th>Parent</th>
                <th>Description</th>
                <th>Last Update</th>
                <th style="width: 150px;">Option</th>
            </tr>
            </thead>
            <tbody>

            @foreach($categories as $key => $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->parent_id}}</td>
                    <td>{{$category->description}}</td>
                    <td>{{$category->updated_at}}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('admin.category.show', $category->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-primary btn-sm" href="{{route('admin.category.edit', $category->id)}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{route('admin.category.delete', $category->id)}}" class="btn btn-danger btn-sm"
                           onclick="removeRow({{$category->id}}">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row mt-2">
            <div class="col-sm-12 col-md-4">
                {!! $categories->appends(request()->all())->links() !!}
            </div>
        </div>
    </div>
@endsection

