@extends('layouts.newblog')

@section('title')
    {{ request()->get('keyword') }}
@endsection

@section('content')
    <section class="pb-10 h-screen">
        <div class="container">
            <div class="w-full px-4">
                <div class="mx-auto mb-16 max-w-xl text-center">
                    <h4 class="mb-2 text-lg font-semibold ">{{ trans('blog.widget.post') }}</h4>
                    <h2 class="mb-4 text-3xl font-bold  sm:text-4xl lg:text-5xl">
                        {{ trans('blog.title.search', ['keyword' => request()->get('keyword')]) }}
                    </h2>
                </div>
            </div>
            <div class="flex flex-wrap">
                @forelse($posts as $post)
                    <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
                        <div class="max-w-md h-[420px] mx-auto bg-white shadow-md overflow-hidden relative">
                            <!-- thumbnail:start -->
                            @if (file_exists(public_path($post->thumbnail)))
                                <img class="w-full h-48 object-cover object-center" src="{{ asset($post->thumbnail) }}"
                                    alt="{{ $post->title }}">
                            @else
                                <img class="w-full h-48 object-cover object-center" src="http://placehold.it/700x400"
                                    alt="{{ $post->title }}">
                            @endif
                            <!-- thumbnail:end -->
                            <div class="p-4 flex flex-col flex-grow">
                                <h2 class="text-xl font-semibold text-gray-800">{{ $post->title }}</h2>
                                <p class="pt-4 text-gray-600 text-sm md:text-base flex-grow">
                                    {{ strlen($post->description) > 150 ? substr($post->description, 0, 150) . '...' : $post->description }}
                                </p>
                            </div>
                            <div class="p-4 absolute bottom-0">
                                <a href="{{ route('blog.post.detail', ['slug' => $post->slug]) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    {{ trans('blog.button.read_more.value') }}
                                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3 class="text-center">
                        {{ trans('blog.no_data.posts') }}
                    </h3>
                @endforelse
            </div>
        </div>
    </section>
    @if ($posts->hasPages())
        <div class="container pb-10">
            <div class="w-full flex justify-end px-4">
                {{ $posts->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    @endif
@endsection
