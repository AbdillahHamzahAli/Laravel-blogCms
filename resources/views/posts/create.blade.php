@extends('layouts.dashboard')

@section('title', trans('posts.title.create'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('add_post') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="POST">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex align-items-stretch">
                            <div class="col-md-8">
                                <!-- title -->
                                <div class="form-group">
                                    <label for="input_post_title" class="font-weight-bold">
                                        {{ trans('posts.form_control.input.title.label') }}
                                    </label>
                                    <input id="input_post_title" value="" name="title" type="text"
                                        class="form-control" placeholder="" />
                                </div>
                                <!-- slug -->
                                <div class="form-group">
                                    <label for="input_post_slug" class="font-weight-bold">
                                        {{ trans('posts.form_control.input.slug.label') }}
                                    </label>
                                    <input id="input_post_slug" value="" name="slug" type="text"
                                        class="form-control" placeholder="" readonly />
                                </div>
                                <!-- thumbnail -->
                                <div class="form-group">
                                    <label for="input_post_thumbnail" class="font-weight-bold">
                                        {{ trans('posts.form_control.input.thumbnail.label') }}
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button id="button_post_thumbnail" data-input="input_post_thumbnail"
                                                class="btn btn-primary" type="button">
                                                {{ trans('posts.button.browse.value') }}
                                            </button>
                                        </div>
                                        <input id="input_post_thumbnail" name="thumbnail" value="" type="text"
                                            class="form-control" placeholder="" readonly />
                                    </div>
                                </div>
                                <!-- description -->
                                <div class="form-group">
                                    <label for="input_post_description" class="font-weight-bold">
                                        {{ trans('posts.form_control.textarea.description.label') }}
                                    </label>
                                    <textarea id="input_post_description" name="description" placeholder="" class="form-control " rows="3"></textarea>
                                </div>
                                <!-- content -->
                                <div class="form-group">
                                    <label for="input_post_content" class="font-weight-bold">
                                        {{ trans('posts.form_control.textarea.content.label') }}
                                    </label>
                                    <textarea id="input_post_content" name="content" placeholder="" class="form-control " rows="20"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- catgeory -->
                                <div class="form-group">
                                    <label for="input_post_description" class="font-weight-bold">
                                        {{ trans('posts.form_control.input.category.label') }}
                                    </label>
                                    <div class="form-control overflow-auto" style="height: 886px">
                                        <!-- List category -->
                                        <ul class="pl-1 my-1" style="list-style: none;">
                                            <li class="form-group form-check my-1">
                                                <input class="form-check-input" type="checkbox" name="category[]">
                                                <label class="form-check-label">Check me out</label>
                                            </li>
                                        </ul>
                                        <!-- List category -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- tag -->
                                <div class="form-group">
                                    <label for="select_post_tag" class="font-weight-bold">
                                        {{ trans('posts.form_control.select.tag.label') }}
                                    </label>
                                    <select id="select_post_tag" name="tag" data-placeholder=""
                                        class="custom-select w-100" multiple>
                                        <option value="tag1">tag 1</option>
                                        <option value="tag2">tag 2</option>
                                    </select>
                                </div>
                                <!-- status -->
                                <div class="form-group">
                                    <label for="select_post_status" class="font-weight-bold">
                                        {{ trans('posts.form_control.select.status.label') }}
                                    </label>
                                    <select id="select_post_status" name="status" class="custom-select">
                                        <option value="draft">Draft</option>
                                        <option value="publish">Publish</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-right">
                                    <a class="btn btn-warning px-4"
                                        href="{{ route('posts.index') }}">{{ trans('posts.button.back.value') }}</a>
                                    <button type="submit" class="btn btn-primary px-4">
                                        {{ trans('posts.button.save.value') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('javascript-external')
    {{-- file manager(button) --}}
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
@endpush

@push('javascript-internal')
    <script>
        $(document).ready(function() {
            // event : input slug
            $("#input_post_title").change(function(event) {
                $("#input_post_slug").val(
                    event.target.value
                    .trim()
                    .toLowerCase()
                    .replace(/[^a-z\d-]/gi, "-")
                    .replace(/-+/g, "-")
                    .replace(/^-|-$/g, "")
                );
            });
            // event : input thumbnail
            $('#button_post_thumbnail').filemanager('image');
        })
    </script>
@endpush
