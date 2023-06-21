@extends('layouts.blog')

@section('title')
    {{ trans('blog.title.tags') }}
@endsection

@section('content')
    <h2 class="my-3">
        Page title
    </h2>
    <!-- Breadcrumb:start -->
    {{ Breadcrumbs::render('blog_tags') }}
    <!-- Breadcrumb:end -->

    <!-- List tag -->
    <div class="row">
        <div class="col">
            @forelse($tags as $tag)
                <!-- true -->
                <a href="" class="badge badge-info py-3 px-5">{{ $tag->title }}</a>
            @empty
                <!-- false -->
                <h3 class="text-center">
                    {{ trans('blog.no_data.tags') }}
                </h3>
            @endforelse

        </div>
    </div>
    <!-- List tag -->

    <!-- pagination:start -->
    @if ($tags->hasPages())
        <div class="row">
            <div class="col">
                {{ $tags->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    @endif
    <!-- pagination:end -->
@endsection
