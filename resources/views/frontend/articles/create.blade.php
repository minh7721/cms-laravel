<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')
</head>

<body>
<div class="md:w-10/12 w-11/12 mx-auto">
    <!-- Start Header -->
    @include('frontend.includes.header')
    <!-- End Header -->

    <!-- Start Content -->
    <div id="content" class="mt-9 flex justify-center">
        <div class="lg:w-9/12 sm:w-full">
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

                    <div class="form-group">
                        <label>Tag</label>
                        <select class="form-control" name="tag_id">
                            <option value="0"></option>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
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
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Đăng bài</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
    <!-- End Content -->

    <!-- Start Footer -->
    <div id="footer"></div>
    <!--End Footer  -->
</div>
@include('frontend.includes.footer')
</body>

</html>
