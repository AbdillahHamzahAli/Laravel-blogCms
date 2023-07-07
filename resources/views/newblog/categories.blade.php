@extends('layouts.newblog')

@section('title')
    {{ trans('blog.title.categories') }}
@endsection

@section('content')
    <section class="pb-10 lg:min-h-screen">
        <div class="container">
            <div class="w-full px-4">
                <div class="mx-auto mb-16 max-w-xl text-center">
                    <h4 class="mb-4 text-3xl font-bold sm:text-4xl lg:text-5xl">{{ trans('blog.title.categories') }}</h4>
                </div>
            </div>
            <div class="flex flex-wrap">
                @forelse($categories as $category)
                    <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}"
                        class="w-full px-4 md:w-1/3 xl:w-1/4 ">
                        <div
                            class="max-w-md mb-8 h-[380px] shadow-sm shadow-gray-300 hover:scale-110 duration-500 mx-auto bg-white overflow-hidden relative">
                            <!-- thumbnail:start -->
                            @if (file_exists(public_path($category->thumbnail)))
                                <img class="w-full h-48 object-cover object-center" src="{{ asset($category->thumbnail) }}"
                                    alt="{{ $category->title }}">
                            @else
                                <img class="w-full h-48 object-cover object-center" src="http://placehold.it/700x400"
                                    alt="{{ $category->title }}">
                            @endif
                            <!-- thumbnail:end -->
                            <div class="p-4 flex flex-col flex-grow">
                                <h2 class="text-xl font-semibold text-gray-800">{{ $category->title }}</h2>
                                <p class="pt-4 text-gray-600 text-sm md:text-base flex-grow">
                                    {{ strlen($category->description) > 150 ? substr($category->description, 0, 150) . '...' : $category->description }}
                                </p>
                            </div>
                        </div>
                    </a>
                @empty
                    <h3 class="w-full text-center">
                        {{ trans('blog.no_data.categories') }}
                    </h3>
                @endforelse
            </div>
        </div>
    </section>

    @if ($categories->hasPages())
        <div class="container pb-10">
            <div class="w-full flex justify-end px-4">
                {{ $categories->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    @endif
@endsection
