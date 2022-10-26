<div class="flex justify-between truncate ">
    <a class="{{$slug == '/' ? ' bg-xanhLaDam rounded-36px text-white ' : '' }} font-normal py-1.5 px-9" href="{{ route('frontend.main.index') }}">Tất cả</a>
    @foreach($categories as $category)
        <a class="font-normal py-1.5 px-9 {{ $category->slug == $slug ? ' bg-xanhLaDam rounded-36px text-white ' : '' }}" href="{{ route('frontend.category.index', $category->slug) }}">{{ $category->name }}</a>
    @endforeach
</div>

<div class="d-flex justify-content-between mt-3 mb-3">
{{--    <select class="selectpicker" data-live-search="true" data-style="btn-info" title="Danh mục" onchange="location = this.value;" style="height: 38px;">--}}
{{--        @foreach($categories as $key=>$category)--}}
{{--            <option value="{{ route('frontend.category.index', $category->slug) }}" data-tokens="{{ $category->name }}">{{ $category->name }}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
    <select class="form-control col-2" id="exampleFormControlSelect1" onchange="location = this.value;" style="height: 38px;">
        @foreach($categories as $key=>$category)
            <option value="{{ route('frontend.category.index', $category->slug) }}" data-tokens="{{ $category->name }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <form class="form-inline mb-3" action="{{ route('frontend.search.index') }}" method="GET">
        <input class="form-control mr-sm-2 valueSearch" name="search" value="{{ $search ?? '' }}" type="search" placeholder="Search" aria-label="Search">
        <button class="btn my-2 my-sm-0 bg-xanhLaDam text-white btnSearch" type="submit" value="{{ $search ?? '' }}">Search</button>
    </form>
</div>
