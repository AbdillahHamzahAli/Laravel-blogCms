@foreach ($tags as $tag)
    <!-- tag list -->
    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
        <label class="mt-auto mb-auto">
            <!-- todo: show tag title -->
            {{ $tag->title }}
        </label>
        <div>
            @can('tag_update')
                <!-- edit -->
                <a class="btn btn-sm btn-info" href="{{ route('tags.edit', ['tag' => $tag]) }}" role="button">
                    <i class="fas fa-edit"></i>
                </a>
            @endcan
            @can('tag_delete')
                <!-- delete -->
                <form class="d-inline" role="alert"
                    alert-text="{{ trans('tags.alert.delete.message.confirm', ['title' => $tag->title]) }}"
                    action="{{ route('tags.destroy', ['tag' => $tag]) }}"method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            @endcan
        </div>
    </li>
    <!-- end  tag list -->
@endforeach
