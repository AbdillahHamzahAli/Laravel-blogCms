@extends('layouts.blog')

@section('title')
    {{ request()->get('keyword') }}
@endsection

@section('content')
    <!-- page title -->
    <h2 class="my-3">
        {{ trans('blog.title.search', ['keyword' => request()->get('keyword')]) }}
    </h2>
    <!-- Breadcrumbs:start -->
    {{ Breadcrumbs::render('blog_search', request()->get('keyword')) }}
    <!-- Breadcrumbs:end -->

    <div class="row">
        <div class="col">
            <!-- Post list:start -->
            @forelse($posts as $post)
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- thumbnail:start -->
                                @if (file_exists(public_path($post->thumbnail)))
                                    <img class="card-img-top" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
                                @else
                                    <img class="img-fluid rounded" src="http://placehold.it/750x300"
                                        alt="{{ $post->title }}">
                                @endif

                                <!-- thumbnail:end -->
                            </div>
                            <div class="col-lg-6">
                                <h2 class="card-title">{{ $post->title }}</h2>
                                <p class="card-text">{{ $post->description }}</p>
                                <a href="" class="btn btn-primary">
                                    Readmore
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="text-center">
                    {{ trans('blog.no_data.search_posts') }}
                </h3>
            @endforelse
            <!-- Post list:end -->
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
