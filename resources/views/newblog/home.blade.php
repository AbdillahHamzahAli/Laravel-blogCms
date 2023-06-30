@extends('layouts.newblog')

@section('title')
    {{ trans('blog.title.home') }}
@endsection

@section('content')
    {{-- title --}}
    <h2 class="my-3">
        {{ trans('blog.title.home') }}
    </h2>
    {{-- {{ Breadcrumbs::render('blog_home') }} --}}
    @forelse($posts as $post)
        <h1 class="text-center">{{ $post->title }}</h1>
        {{ $post }}

    @empty
        <h3 class="text-center">
            {{ trans('blog.no_data.posts') }}
        </h3>
    @endforelse
@endsection
