@foreach ($categoryRoot as $item)
    <a href="{{ route('blog.posts.category', ['slug' => $item->slug]) }}"
        class="my-2 mx-1 inline-block rounded-sm {{ $item->title == $category->title ? 'bg-black text-white' : ' hover:text-white hover:bg-black hover:scale-110' }} border-black border-2 px-6 pb-2 pt-2.5 text-xs font-medium uppercase  transition duration-150 ease-in-out">{{ $item->title }}</a>
    @if ($item->descendants)
        @include('newblog.sub-categories', [
            'categoryRoot' => $item->descendants,
            'category' => $category,
        ])
    @endif
@endforeach
