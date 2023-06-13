@forelse($users as $user)
    <div class="col-md-4">
        <div class="card my-1">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <i class="fas fa-id-badge fa-5x"></i>
                    </div>
                    <div class="col-md-10">
                        <table>
                            <tr>
                                <th>
                                    {{ trans('users.label.name') }}
                                </th>
                                <td>:</td>
                                <td>
                                    <!-- show user name -->
                                    {{ $user->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('users.label.email') }}
                                </th>
                                <td>:</td>
                                <td>
                                    <!-- show user email -->
                                    {{ $user->email }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('users.label.role') }}
                                </th>
                                <td>:</td>
                                <td>
                                    <!-- Show user roles -->
                                    {{ $user->roles->first()->name }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="float-right">
                    <!-- edit -->
                    <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-sm btn-info" role="button">
                        <i class="fas fa-edit"></i>
                    </a>
                    <!-- delete -->
                    <form class="d-inline" role="alert"
                        alert-text="{{ trans('users.alert.delete.message.confirm', ['name' => $user->name]) }}"
                        action="{{ route('users.destroy', ['user' => $user]) }}"method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@empty
    <p>
        @if (request()->get('keyword'))
            {{ trans('users.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
        @else
            {{ trans('users.label.no_data.fetch') }}
        @endif
    </p>
@endforelse
