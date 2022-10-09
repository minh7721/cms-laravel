
<div class="mt-9 flex flex-col justify-center mb-9">
    <p class="">Danh sách tin</p>
    @foreach($articles as $key => $article)
        <a href="{{route('frontend.detail.index', $article->slug)}}" class="flex flex-row sm:flex-col my-8">
            <div class="w-full mr-6">
                <img class="w-full rounded-36px" style="max-height: 500px;" src="{{ $article->thumb }}" alt="">
            </div>
            <div class="flex flex-col w-full">
                <p class="mt-4 font-semibold text-lg tracking-spaceChu">{{ $article->title }}</p>
                <div class="flex flex-row text-xs tracking-spaceChu">
                    <p class="text-xanhLaDam mr-2 text-base">{{ $article->category->name }} •</p>
                    <p class="font-normal mr-2 text-base">{{ $article->author->name }} •</p>
                    <p class="font-normal opacity-50 text-base">{{ $article->created_at }}</p>
                </div>
                <p class="font-normal opacity-50 text-base">{{ $article->description }}</p>
            </div>
        </a>
    @endforeach

    <div class="row mt-2">
        <div class="col-sm-12 col-md-4">
            {!! $articles->appends(request()->all())->links() !!}
        </div>
    </div>

{{--    <div class="mt-20">--}}
{{--        <div class="flex justify-center">--}}
{{--            <button class="border-4 border-black border rounded-36px mb-10" style="width:200px; height: 50px;">--}}
{{--                Xem thêm--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
