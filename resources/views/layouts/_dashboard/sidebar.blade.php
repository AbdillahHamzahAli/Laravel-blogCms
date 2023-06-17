<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link" href="{{ route('dashboard.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                {{ trans('dashboard.link.dashboard') }}
            </a>
            {{-- MENU MASTER --}}
            <div class="sb-sidenav-menu-heading">{{ trans('dashboard.menu.master') }}</div>
            {{-- POST --}}
            @can('manage_post')
                <a class="nav-link {{ set_active(['posts.create', 'posts.show', 'posts.edit']) }} "
                    href="{{ route('posts.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="far fa-newspaper"></i>
                    </div>
                    {{ trans('dashboard.link.posts') }}
                </a>
            @endcan
            {{-- CATEGORIES --}}
            @can('manage_categories')
                <a class="nav-link {{ set_active(['categories.index', 'categories.create', 'categories.edit', 'categories.show']) }} "
                    href="{{ route('categories.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-bookmark"></i>
                    </div>
                    {{ trans('dashboard.link.categories') }}
                </a>
            @endcan
            {{-- TAGS --}}
            @can('manage_tags')
                <a class="nav-link {{ set_active(['tags.create', 'tags.edit', 'tags.show']) }} "
                    href="{{ route('tags.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    {{ trans('dashboard.link.tags') }}
                </a>
            @endcan
            {{-- MENU USER PERMISSION --}}
            <div class="sb-sidenav-menu-heading">{{ trans('dashboard.menu.user_permission') }}</div>
            {{-- USERS --}}
            @can('manage_users')
                <a class="nav-link {{ set_active(['users.create', 'users.edit', 'users.show']) }}"
                    href="{{ route('users.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    {{ trans('dashboard.link.users') }}
                </a>
            @endcan
            {{-- ROLES --}}
            @can('manage_roles')
                <a class="nav-link {{ set_active(['roles.create', 'roles.edit', 'roles.show']) }}"
                    href="{{ route('roles.index') }} ">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    {{ trans('dashboard.link.roles') }}
                </a>
            @endcan
            {{-- MENU SETTING --}}
            <div class="sb-sidenav-menu-heading">{{ trans('dashboard.menu.setting') }}</div>
            <a class="nav-link" href="{{ route('filemanager.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-photo-video"></i>
                </div>
                {{ trans('dashboard.link.file_manager') }}
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">{{ trans('dashboard.label.logged_in_as') }}</div>
        <!-- show username -->
        {{ Auth::user()->name }}
    </div>
</nav>
