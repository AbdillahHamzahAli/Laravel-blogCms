@extends('layouts.newblog')

@section('title')
    {{ trans('blog.title.tags') }}
@endsection

@section('content')
    <div class="container lg:min-h-screen pb-10">
        <div class="w-full px-4">
            <div class="mx-auto mb-16 max-w-xl text-center">
                <h4 class="mb-4 text-3xl font-bold sm:text-4xl lg:text-5xl">{{ trans('blog.title.tags') }}</h4>
            </div>
            <div class="flex flex-wrap justify-start my-2 text-start">
                @forelse ($tags as $tag)
                    <a href="{{ route('blog.posts.tag', ['slug' => $tag->slug]) }}"
                        class="my-2 mx-1 inline-block rounded-sm hover:text-white hover:bg-black hover:scale-110 border-black border-2 px-6 pb-2 pt-2.5 text-xs font-medium uppercase  transition duration-150 ease-in-out">#{{ $tag->title }}</a>
                @empty
                    <h3 class="w-full text-center">
                        {{ trans('blog.no_data.tags') }}
                    </h3>
                @endforelse
            </div>
        </div>
    </div>
    @if ($tags->hasPages())
        <div class="container pb-10">
            <div class="w-full flex justify-end px-4">
                {{ $tags->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    @endif
@endsection
