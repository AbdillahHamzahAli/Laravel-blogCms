<nav
    class="z-10 w-full bg-white flex px-8 border-b md:py-4 justify-between md:border-b-2 border-black items-center fixed">
    <a class="text-lg font-bold md:py-0 py-4" href="{{ route('blog.home') }}">{{ config('app.name') }}</a>
    <ul id="navbar" class="hidden bg-white md:px-2 md:flex md:space-x-2 absolute md:relative top-full left-0 right-0">
        <li>
            <form action="{{ route('blog.search') }}" method="GET"
                class="flex md:inline-flex p-4 items-center bg-gray-50">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 pt-0.5 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
                <input
                    class="ml-2 text-base text-slate-900 placeholder:text-slate-600 focus:outline-none outline-none bg-transparent font-light"
                    name="keyword" value="{{ request()->get('keyword') }}" type="search" id="search"
                    placeholder="{{ trans('blog.form_control.input.search.placeholder') }}" />
            </form>
        </li>
        <li>
            <a href="{{ route('blog.home') }}" class="flex md:inline-flex p-4 items-center hover:bg-gray-50">
                <span>{{ trans('blog.menu.home') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('blog.categories') }}" class="flex md:inline-flex p-4 items-center hover:bg-gray-50">
                <span>{{ trans('blog.menu.categories') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('blog.tags') }}" class="flex md:inline-flex p-4 items-center hover:bg-gray-50">
                <span>{{ trans('blog.menu.tags') }}</span>
            </a>
        </li>
        {{-- Lang Start --}}
        <li class="relative parent" onclick="dropdown('lang')">
            <a href="#" class="flex justify-between md:inline-flex p-4 items-center hover:bg-gray-50 space-x-2">
                <span>
                    @switch(app()->getLocale())
                        @case('id')
                            <i class="flag-icon flag-icon-id"></i>
                        @break

                        @case('en')
                            <i class="flag-icon flag-icon-gb"></i>
                        @break

                        @default
                    @endswitch
                    {{ strtoupper(app()->getLocale()) }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current pt-1" viewBox="0 0 24 24">
                    <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z" />
                </svg>
            </a>
            <ul id="lang-dropdown"
                class="hidden child transition duration-300 md:absolute top-full right-0 md:w-48 bg-white md:shadow-lg md:rounded-b">
                <li>
                    <a href="{{ route('localization.switch', ['language' => 'id']) }}"
                        class="flex px-4 py-3 hover:bg-gray-50"> {{ trans('localization.id') }}</a>
                </li>
                <li>
                    <a href="{{ route('localization.switch', ['language' => 'en']) }}"
                        class="flex px-4 py-3 hover:bg-gray-50"> {{ trans('localization.en') }} </a>
                </li>
            </ul>
        </li>
        {{-- Lang End --}}

        {{-- Auth Start --}}
        @auth()
            <li class="relative parent" onclick="dropdown('user')">
                <a href="#" class="flex justify-between md:inline-flex p-4 items-center hover:bg-gray-50 space-x-2">
                    <span>{{ Auth::user()->name }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current pt-1" viewBox="0 0 24 24">
                        <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z" />
                    </svg>
                </a>
                <ul id="user-dropdown"
                    class="hidden child transition duration-300 md:absolute top-full right-0 md:w-48 bg-white md:shadow-lg md:rounded-b">
                    <li>
                        <a href="{{ route('dashboard.index') }}" class="flex px-4 py-3 hover:bg-gray-50">
                            {{ trans('blog.menu.dashboard') }} </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                            class="flex px-4 py-3 hover:bg-gray-50"> {{ trans('blog.menu.logout') }} </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        <!-- csrf -->
                        @csrf
                    </form>
                </ul>
            </li>
        @else
            <li>
                <a href="{{ route('login') }}" class="flex md:inline-flex p-4 items-center hover:bg-gray-50">
                    <span>Login</span>
                </a>
            </li>
        @endauth
        {{-- Auth End --}}
    </ul>
    <div class="ml-auto md:hidden text-gray-500 cursor-pointer" onclick="navbarToogle()">
        <svg xmlns="http://www.w3.org/2000/svg" id="close" class="hidden w-5 h-5 fill-current humbuger"
            viewBox="0 0 24 24">
            <path
                d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" />
        </svg>
        <svg id="open" class="w-5 h-5 fill-current" stroke="currentColor" fill="currentColor" stroke-width="0"
            viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
            </path>
        </svg>
    </div>
</nav>

@push('javascript-internal')
    <script>
        function navbarToogle() {
            const navbarUl = document.getElementById("navbar");
            const icClose = document.getElementById("close");
            const icOpen = document.getElementById("open");
            navbarUl.classList.toggle("hidden");
            icClose.classList.toggle("hidden");
            icOpen.classList.toggle("hidden");
        }

        function dropdown(name) {
            const element = document.getElementById(`${name}-dropdown`);
            element.classList.toggle("hidden");
        }
    </script>
@endpush

@push('css-internal')
    <style>
        @media only screen and (min-width: 768px) {
            .parent:hover .child {
                opacity: 1;
                height: auto;
                overflow: none;
                transform: translateY(0);
            }

            .child {
                opacity: 0;
                height: 0;
                overflow: hidden;
                transform: translateY(-10%);
            }
        }
    </style>
@endpush
