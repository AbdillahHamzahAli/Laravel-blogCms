@extends('layouts.dashboard')

@section('title', trans('roles.title.index'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('roles') }}
@endsection

@section('content')
    <!-- section:content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('roles.index') }}" method="GET">
                                <div class="input-group">
                                    <input name="keyword" value="{{ request()->get('keyword') }}" type="search"
                                        class="form-control"
                                        placeholder="{{ trans('roles.form_control.input.search.placeholder') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('roles.create') }}" class="btn btn-primary float-right" role="button">
                                {{ trans('roles.button.create.value') }}
                                <i class="fas fa-plus-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- list role -->
                        @forelse($roles as $role)
                            <li
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
                                <label class="mt-auto mb-auto">
                                    {{ $role->name }}
                                </label>
                                <div>
                                    <!-- detail -->
                                    <a href="{{ route('roles.show', ['role' => $role]) }}" class="btn btn-sm btn-primary"
                                        role="button">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <!-- edit -->
                                    <a href="{{ route('roles.edit', ['role' => $role]) }}" class="btn btn-sm btn-info"
                                        role="button">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <!-- delete -->
                                    <form class="d-inline" role="alert"
                                        alert-text="{{ trans('roles.alert.delete.message.confirm', ['name' => $role->name]) }}"
                                        action="{{ route('roles.destroy', ['role' => $role]) }}"method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </li>
                        @empty

                            <p>
                                @if (request()->get('keyword'))
                                    {{ trans('roles.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
                                @else
                                    {{ trans('roles.label.no_data.fetch') }}
                                @endif
                            </p>
                        @endforelse

                        <!-- list role -->
                    </ul>
                </div>
                @if ($roles->hasPages())
                    <div class="card-footer">
                        {{ $roles->links('vendor.pagination.bootstrap-5') }}
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
                    title: "{{ trans('roles.alert.delete.title') }}",
                    text: $(this).attr('alert-text'),
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: "{{ trans('roles.button.cancel.value') }}",
                    reverseButtons: true,
                    confirmButtonText: "{{ trans('roles.button.delete.value') }}",
                }).then((result) => {
                    if (result.dismiss == 'cancel') return;
                    event.target.submit();
                });
            })
        })
    </script>
@endpush
