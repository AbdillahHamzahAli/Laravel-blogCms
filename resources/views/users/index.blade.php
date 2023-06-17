@extends('layouts.dashboard')

@section('title', trans('users.title.index'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('users') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('users.index') }}" method="GET">
                                <div class="input-group">
                                    <input name="keyword" value="{{ request()->get('keyword') }}" type="search"
                                        class="form-control"
                                        placeholder="{{ trans('users.form_control.input.search.placeholder') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            @can('user_create')
                                <a href="{{ route('users.create') }}" class="btn btn-primary float-right" role="button">
                                    {{ trans('users.button.create.value') }}
                                    <i class="fas fa-plus-square"></i>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- list users -->
                        @include('users._user-list', ['users' => $users])
                    </div>
                </div>
                <div class="card-footer">
                    <!-- Todo:paginate -->
                    @if ($users->hasPages())
                        <div class="card-footer">
                            {{ $users->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    @endif
                </div>
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
                    title: "{{ trans('users.alert.delete.title') }}",
                    text: $(this).attr('alert-text'),
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: "{{ trans('users.button.cancel.value') }}",
                    reverseButtons: true,
                    confirmButtonText: "{{ trans('users.button.delete.value') }}",
                }).then((result) => {
                    if (result.dismiss == 'cancel') return;
                    event.target.submit();
                });
            })
        })
    </script>
@endpush
