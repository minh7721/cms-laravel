<div class="flex justify-between truncate ">
    <a class="{{$slug == '/' ? ' bg-xanhLaDam rounded-36px text-white ' : '' }} font-normal py-1.5 px-9" href="{{ route('frontend.main.index') }}">Tất cả</a>
    @foreach($categories as $category)
        <a class="font-normal py-1.5 px-9 {{ $category->slug == $slug ? ' bg-xanhLaDam rounded-36px text-white ' : '' }}" href="{{ route('frontend.main.category', $category->slug) }}">{{ $category->name }}</a>
    @endforeach
</div>
