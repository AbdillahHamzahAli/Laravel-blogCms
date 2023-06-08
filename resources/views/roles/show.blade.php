@extends('layouts.dashboard')

@section('title', trans('roles.title.detail'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('detail_role', $role) }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="input_role_name" class="font-weight-bold">
                            {{ trans('roles.form_control.input.name.label') }}
                        </label>
                        <input id="input_role_name" value="{{ $role->name }}" name="name" type="text"
                            class="form-control" readonly />
                    </div>
                    <!-- permission -->
                    <div class="form-group">
                        <label for="input_role_permission" class="font-weight-bold">
                            {{ trans('roles.form_control.input.permission.label') }}
                        </label>
                        <div class="row">
                            @forelse($authorities as $manageName => $permissions)
                                <!-- list manage name:start -->
                                <ul class="list-group mx-1">
                                    <li class="list-group-item bg-dark text-white">
                                        {{ trans("permissions.{$manageName}") }}
                                    </li>
                                    @foreach ($permissions as $permission)
                                        <!-- list permission:start -->
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    onclick="return false;"
                                                    {{ in_array($permission, $rolePermission) ? 'checked' : null }}>
                                                <label class="form-check-label">
                                                    {{ $permission }}
                                                </label>
                                            </div>
                                        </li>
                                        <!-- list permission:end -->
                                    @endforeach
                                </ul>
                                <!-- list manage name:end  -->
                            @empty
                                <p>
                                    {{ trans('roles.label.no_data.fetch') }}
                                </p>
                            @endforelse

                        </div>
                    </div>
                    <!-- button  -->
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('roles.index') }}" class="btn btn-primary mx-1" role="button">
                            {{ trans('roles.button.back.value') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
