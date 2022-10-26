<div class="flex justify-between truncate ">
    <a class="{{$slug == '/' ? ' bg-xanhLaDam rounded-36px text-white ' : '' }} font-normal py-1.5 px-9" href="{{ route('frontend.main.index') }}">Tất cả</a>
    @foreach($categories as $category)
        <a class="font-normal py-1.5 px-9 {{ $category->slug == $slug ? ' bg-xanhLaDam rounded-36px text-white ' : '' }}" href="{{ route('frontend.category.index', $category->slug) }}">{{ $category->name }}</a>
    @endforeach

</div>

<div class="d-flex justify-content-end mt-3 mb-3">
    <form class="form-inline mb-3" action="{{ route('frontend.search.index') }}">
        <input class="form-control mr-sm-2 valueSearch" name="search" value="{{ $search ?? '' }}" type="search" placeholder="Search" aria-label="Search">
        <button class="btn my-2 my-sm-0 bg-xanhLaDam text-white btnSearch" type="submit" value="{{ $search ?? '' }}">Search</button>
    </form>
</div>
