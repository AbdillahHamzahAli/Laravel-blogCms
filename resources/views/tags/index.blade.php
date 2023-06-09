@extends('layouts.dashboard')

@section('title', trans('tags.title.index'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('tags') }}
@endsection

@section('content')
    <!-- section:content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            {{-- SEARCH --}}
                            <form action="{{ route('tags.index') }}" method="GET">
                                <div class="input-group">
                                    <input name="keyword" value="{{ request()->get('keyword') }}" type="search"
                                        class="form-control"
                                        placeholder="{{ trans('tags.form_control.input.search.placeholder') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('tags.create') }}" class="btn btn-primary float-right" role="button">
                                {{ trans('tags.button.create.value') }}
                                <i class="fas fa-plus-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- list tag -->
                        @if (count($tags))
                            @include('tags._tags-list', ['tags' => $tags])
                        @else
                            <p>
                                @if (request()->get('keyword'))
                                    {{ trans('tags.label.no_data.fetch', ['search' => request()->get('keyword')]) }}
                                @else
                                    {{ trans('tags.label.no_data.fetch') }}
                                @endif
                            </p>
                        @endif
                    </ul>
                </div>
                @if ($tags->hasPages())
                    <div class="card-footer">
                        {{ $tags->links('vendor.pagination.bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

@push('javascript-internal')
    <script>
        $(document).ready(function() {
            // Delete Tag
            $("form[role='alert']").submit(function(event) {
                event.preventDefault();
                Swal.fire({
                    title: "{{ trans('tags.alert.delete.title') }}",
                    text: $(this).attr('alert-text'),
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: "{{ trans('tags.button.cancel.value') }}",
                    reverseButtons: true,
                    confirmButtonText: "{{ trans('tags.button.delete.value') }}",
                }).then((result) => {
                    if (result.dismiss == 'cancel') return;
                    event.target.submit();
                });
            })
        })
    </script>
@endpush
