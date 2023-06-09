<x-app-layout title="Dashboard | Post">
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Post / Edit') }}
            </h2>

        </div>
    </x-slot>

    <div class="relative overflow-x-auto shadow-md bg-white dark:bg-dark-eval-3">
        <div class="px-6 py-3">
            <form action="{{ route('post.update', $post) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('dashboard.post._form')
            </form>
        </div>
    </div>
</x-app-layout>
