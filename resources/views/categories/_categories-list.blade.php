@foreach ($categories as $category)
    <!-- category list -->
    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
        <label class="mt-auto mb-auto">
            {{ str_repeat('-', $count) . ' ' . $category->title }}
        </label>
        <div>
            <!-- detail -->
            <a href="{{ route('categories.show', ['category' => $category]) }}" class="btn btn-sm btn-primary"
                role="button">
                <i class="fas fa-eye"></i>
            </a>
            <!-- edit -->
            <a href="{{ route('categories.edit', ['category' => $category]) }}" class="btn btn-sm btn-info" role="button">
                <i class="fas fa-edit"></i>
            </a>
            <!-- delete -->
            <form class="d-inline" action="{{ route('categories.destroy', ['category' => $category]) }}" role="alert"
                method="POST" alert-title="{{ trans('categories.alert.delete.title') }}"
                alert-text="{{ trans('categories.alert.delete.message.confirm', ['title' => $category->title]) }}"
                alert-btn-cancel="{{ trans('categories.button.cancel.value') }}"
                alert-btn-yes="{{ trans('categories.button.delete.value') }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
        <!-- todo:show subcategory -->
        @if ($category->descendants && !trim(request()->get('keyword')))
            @include('categories._categories-list', [
                'categories' => $category->descendants,
                'count' => $count + 2,
            ])
        @endif
    </li>
    <!-- end  category list -->
@endforeach
