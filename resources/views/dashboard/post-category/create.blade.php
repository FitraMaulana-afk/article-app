<x-app-layout title="Dashboard | Post Category">
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Post Category / Create') }}
            </h2>

        </div>
    </x-slot>

    <div class="relative overflow-x-auto shadow-md bg-white">
        <div class="px-6 py-3">
            <form action="{{ route('post-category.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('dashboard.post-category._form')
            </form>
        </div>
    </div>
</x-app-layout>
