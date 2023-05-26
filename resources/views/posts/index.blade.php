@extends('layouts.dashboard')

@section('title', trans('posts.title.index'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('posts') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="GET" class="form-inline form-row">
                                <div class="col">
                                    <div class="input-group mx-1">
                                        <label class="font-weight-bold mr-2">
                                            {{ trans('posts.form_control.select.status.label') }}
                                        </label>
                                        <select name="status" class="custom-select">
                                            <option value="publish" selected>Publish</option>
                                            <option value="draft">Draft</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                {{ trans('posts.button.apply.value') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mx-1">
                                        <input name="keyword" type="search" class="form-control"
                                            placeholder="{{ trans('posts.form_control.input.search.placeholder') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="btn btn-primary float-right" role="button">
                                {{ trans('posts.button.create.value') }}
                                <i class="fas fa-plus-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- list post -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
