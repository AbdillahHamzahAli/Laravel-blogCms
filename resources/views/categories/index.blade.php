@extends('layouts.dashboard')

@section('title', trans('categories.title.index'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('categories') }}
@endsection

@section('content')
    <!-- section:content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            {{-- SEARCH CATEGORY --}}
                            <form action="{{ route('categories.index') }}" method="GET">
                                <div class="input-group">
                                    <input name="keyword" type="search" class="form-control"
                                        placeholder="{{ trans('categories.form_control.input.search.placeholder') }}"
                                        value="{{ request()->get('keyword') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('categories.create') }}" class="btn btn-primary float-right" role="button">
                                {{ trans('categories.button.create.value') }}
                                <i class="fas fa-plus-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @include('categories._categories-list', [
                            'categories' => $categories,
                            'count' => 0,
                        ])
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('javascript-internal')
    <script>
        $(document).ready(function() {
            // Event Delete Category
            $("form[role='alert']").submit(function(event) {
                event.preventDefault();
                Swal.fire({
                    title: $(this).attr('alert-title'),
                    text: $(this).attr('alert-text'),

                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: $(this).attr('alert-btn-cancel'),
                    reverseButtons: true,
                    confirmButtonText: $(this).attr('alert-btn-yes'),
                }).then((result) => {
                    if (result) {
                        // todo: process of deleting categories
                        event.target.submit();
                    }
                });
            });
        });
    </script>
@endpush
