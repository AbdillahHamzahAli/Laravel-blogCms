@extends('layouts.blog')

@section('title')
    {{ trans('blog.title.home') }}
@endsection

@section('content')
    <!-- page title -->
    <h2 class="my-3">
        {{ trans('blog.title.home') }}
    </h2>
    <!-- Breadcrumbs:start -->
    {{ Breadcrumbs::render('blog_home') }}
    <!-- Breadcrumbs:end -->


    <div class="row my-2">
        @forelse($posts as $post)
            <div class="col-md-6 col-lg-4">
                <div class="card mb-4 h-100">
                    <!-- thumbnail:start -->
                    @if (file_exists(public_path($post->thumbnail)))
                        <img class="card-img-top" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }} "
                            style="height: 225px; width: 100%; display: block;" data-holder-rendered="true">
                    @else
                        <img class="img-fluid rounded" src="http://placehold.it/750x300"
                            style="height: 225px; width: 100%; display: block;" alt="{{ $post->title }}"
                            data-holder-rendered="true">
                    @endif

                    <!-- thumbnail:end -->

                    <div class="card-body ">
                        <h4 class="card-title">{{ $post->title }}</h4>
                        <p class="card-text" style="max-height:100px; overflow:hidden">{{ $post->description }}</p>
                        <div class="d-flex justify-content-between align-items-end">
                            <a href="{{ route('blog.post.detail', ['slug' => $post->slug]) }}"
                                class="btn btn-sm btn-outline-secondary ">
                                {{ trans('blog.button.read_more.value') }}
                            </a>
                            <small>
                                {{ date_format($post->updated_at, 'Y/m/d') }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h3 class="text-center">
                {{ trans('blog.no_data.posts') }}
            </h3>
        @endforelse
    </div>
    @if ($posts->hasPages())
        <div class="row">
            <div class="col">
                {{ $posts->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    @endif
@endsection

@push('css-internal')
    <style>
        .imgContainer {
            max-width: 750px;
            max-height: 300px;
            overflow: hidden;
        }

        .imgContainer img {
            width: 100%;
            min-height: 100%;
        }
    </style>
@endpush
