<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

    <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.dropdown title="Post" :active="Str::startsWith(
        request()
            ->route()
            ->uri(),
        'buttons',
    )">
        <x-slot name="icon">
            <i class="fa-solid fa-layer-group mx-1"></i>
        </x-slot>

        <x-sidebar.sublink title="Posts" href="{{ route('post.index') }}" :active="request()->routeIs('post.index')" />
        <x-sidebar.sublink title="Post Category" href="{{ route('post-category.index') }}" :active="request()->routeIs('post-category.index')" />
    </x-sidebar.dropdown>

    <x-sidebar.link title="Comment" href="{{ route('dashboard') }}">
        <x-slot name="icon">
            <i class="fa-solid fa-comments mx-1"></i>
        </x-slot>
    </x-sidebar.link>

    {{-- <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-sm text-gray-500">
        Dummy Links
    </div> --}}

    {{-- @php
        $links = array_fill(0, 20, '');
    @endphp

    @foreach ($links as $index => $link)
        <x-sidebar.link title="Dummy link {{ $index + 1 }}" href="#" />
    @endforeach --}}

</x-perfect-scrollbar>
