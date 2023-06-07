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
                            <form action="" method="GET">
                                <div class="input-group">
                                    <input name="keyword" type="search" class="form-control"
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
                            <a href="#" class="btn btn-primary float-right" role="button">
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
                                    <!-- edit -->
                                    <a class="btn btn-sm btn-info" role="button">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <!-- delete -->
                                    <form class="d-inline" action="" method="POST">
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @empty
                            <p>
                                {{ trans('roles.label.no_data.fetch') }}
                            </p>
                        @endforelse

                        <!-- list role -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
