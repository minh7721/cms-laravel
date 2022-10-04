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
                        <form id="quickForm" action="{{ route('admin.category.store') }}" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{ old('name') }}" type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="parent">Danh mục cha</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="0"></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
