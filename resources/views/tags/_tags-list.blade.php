@if (count($tags))
    @foreach ($tags as $tag)
        <!-- tag list -->
        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
            <label class="mt-auto mb-auto">
                <!-- todo: show tag title -->
                {{ $tag->title }}
            </label>
            <div>
                <!-- edit -->
                <a class="btn btn-sm btn-info" href="{{ route('tags.edit', ['tag' => $tag]) }}" role="button">
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
        <!-- end  tag list -->
    @endforeach
@endif
