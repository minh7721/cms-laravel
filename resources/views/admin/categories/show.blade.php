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
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">
                        <form id="quickForm" action="" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input disabled value="{{ $category->name }}" type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="parent">Danh mục cha</label>
                                    <select  disabled name="parent_id" class="form-control">
                                        <option  {{ $category->id == 0 ? 'selected' : ''}} value="0"></option>
                                        @foreach($categories as $category1)
                                            <option value="{{ $category1->id }}" {{ $category->parent_id == $category1->id ? 'selected' : '123'}}>{{ $category1->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Mô tả ngắn</label>
                                    <input disabled value="{{ $category->description }}" type="text" name="description" class="form-control" id="description" placeholder="Enter description">
                                </div>
                                <div class="form-group">
                                    <label for="content">Mô tả dài</label>
                                    <p class="form-control">{!! $category->content !!}</p>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary">Sửa</a>
                                <a href="{{ route('admin.category.delete', $category->id) }}" class="btn btn-primary">Xóa</a>
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
