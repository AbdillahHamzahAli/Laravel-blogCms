@extends('layouts.blog')

@section('title')
    {{ trans('blog.title.categories') }}
@endsection

@section('content')
    <h2 class="my-3">
        Page title
    </h2>
    <!-- Breadcrumb:start -->
    {{ Breadcrumbs::render('blog_categories') }}
    <!-- Breadcrumb:end -->

    <!-- List category -->
    <div class="row">
        @forelse($categories as $category)
            <!-- true -->
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <!-- thumbnail:start -->
                    @if (file_exists(public_path($category->thumbnail)))
                        <img class="card-img-top" src="{{ asset($category->thumbnail) }}" alt="{{ $category->title }}">
                    @else
                        <img class="card-img-top" src="http://placehold.it/700x400" alt="{{ $category->title }}">
                    @endif
                    <!-- thumbnail:end -->
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="">
                                {{ $category->title }}
                            </a>
                        </h4>
                        <p class="card-text">
                            {{ $category->description }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <!-- false -->
            <h3 class="text-center">
                {{ trans('blog.no_data.categories') }}
            </h3>
        @endforelse

    </div>
    <!-- List category -->

    <!-- pagination:start -->
    @if ($categories->hasPages())
        <div class="row">
            <div class="col">
                {{ $categories->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    @endif
    <!-- pagination:end -->
@endsection
