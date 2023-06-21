@extends('layouts.blog')

@section('title')
    {{ trans('blog.title.category', ['title' => $category->title]) }}
@endsection

@section('content')
    <!-- Title -->
    <h2 class="mt-4 mb-3">
        {{ trans('blog.title.category', ['title' => $category->title]) }}
    </h2>

    <!-- Breadcrumb:start -->
    {{ Breadcrumbs::render('blog_posts_category', $category->title) }}
    <!-- Breadcrumb:end -->
    <div class="row">
        <div class="col-lg-8">
            <!-- Post list:start -->
            @forelse($posts as $post)
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- tumbnail -->
                                @if (file_exists(public_path($post->thumbnail)))
                                    <img class="card-img-top" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
                                @else
                                    <img class="img-fluid rounded" src="http://placehold.it/750x300"
                                        alt="{{ $post->title }}">
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <h2 class="card-title">{{ $post->title }}</h2>
                                <p class="card-text">{{ $post->descrption }}</p>
                                <a href="" class="btn btn-primary">
                                    {{ trans('blog.button.read_more.value') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="text-center">
                    {{ trans('blog.no_data.posts') }}
                </h3>
            @endforelse
            <!-- Post list:end -->
        </div>
        <div class="col-md-4">
            <!-- Categories list:start -->
            <div class="card mb-1">
                <h5 class="card-header">
                    Categories
                </h5>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>
                            @if ($category->slug == $categoryRoot->slug)
                                {{ $categoryRoot->title }}
                            @else
                                <a href="{{ route('blog.posts.category', ['slug' => $categoryRoot->slug]) }}">
                                    {{ $categoryRoot->title }}
                                </a>
                            @endif
                            <!-- category descendants:start -->
                            @if ($categoryRoot->descendants)
                                @include('blog.sub-categories', [
                                    'categoryRoot' => $categoryRoot->descendants,
                                    'category' => $category,
                                ])
                            @endif
                            <!-- category descendants:end -->
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Categories list:end -->
        </div>
    </div>
    @if ($posts->hasPages())
        <div class="row">
            <div class="col">
                {{ $posts->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    @endif
@endsection
