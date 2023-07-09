@extends('layouts.newblog')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="pb-10 container lg:min-h-screen">
        <div class="w-full px-4">
            <div class="lg:mx-64 mb-16">
                <h1 class="mb-4 text-5xl md:text-8xl font-bold">Blog Details
                </h1>
                <p class="font-serif font-thin text-neutral-700 text-lg md:text-xl leading-6 md:leading-8">
                    {{ $post->description }}</p>
            </div>
            <div class="lg:mx-32 mb-16">
                @if (file_exists(public_path($post->thumbnail)))
                    <img class="w-full object-cover object-center" src="{{ asset($post->thumbnail) }}"
                        alt="{{ $post->title }}">
                @else
                    <img class="w-full object-cover object-center" src="http://placehold.it/750x300"
                        alt="{{ $post->title }}">
                @endif
            </div>
            <div class="lg:mx-64 max-w-5xl mb-16">
                <div class="mb-2">
                    <i class="fas fa-calendar"></i>
                    <span class="ml-4 text-neutral-500">{{ date_format($post->updated_at, 'Y/m/d') }}</span>
                </div>
                <h2 class="font-bold mb-6 text-3xl md:text-5xl ">{{ $post->title }}</h2>
                {{-- <i class="fas fa-calendar"></i> --}}
                <div class="font-serif font-thin text-neutral-700 text-lg md:text-xl leading-6 md:leading-8">
                    {!! $post->content !!}
                </div>
            </div>
            <div class="lg:mx-64">
                <div class="flex flex-wrap justify-start my-2 text-start">
                    @foreach ($post->tag as $item)
                        <a href="{{ route('blog.posts.tag', ['slug' => $item->slug]) }}"
                            class="my-2 mx-1 inline-block rounded-sm hover:text-white hover:bg-black hover:scale-110 border-black border-2 px-6 pb-2 pt-2.5 text-xs font-medium uppercase  transition duration-150 ease-in-out">{{ $item->title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="lg:mx-52 flex p-10 flex-wrap">
        @forelse($posts as $post)
            <div class="w-full md:w-1/2">
                <div class="max-w-sm mb-8 h-[420px] mx-auto bg-white border border-black overflow-hidden relative">
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
                        <h2 class="text-xl font-semibold text-gray-800 ">{{ $post->title }}</h2>
                        <p class="pt-4 text-gray-600 text-sm md:text-base flex-grow">
                            {{ strlen($post->description) > 80 ? substr($post->description, 0, 80) . '...' : $post->description }}
                        </p>
                    </div>
                    <div class="p-4 absolute bottom-0">
                        <a href="{{ route('blog.post.detail', ['slug' => $post->slug]) }}"
                            class="inline-flex items-center px-3 py-2 text-sm  font-medium text-center border-black border-2 hover:bg-black hover:text-white group">
                            {{ trans('blog.button.read_more.value') }}
                            <svg aria-hidden="true" class="group-hover:ml-4 duration-300 w-4 h-4 ml-2 -mr-1"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
@endsection
