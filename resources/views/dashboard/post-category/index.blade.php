<x-app-layout title="Dashboard | Post Category">
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Post Category') }}
            </h2>

        </div>
    </x-slot>

    <div>
        <div>
            <x-button variant="success" class="mb-3" size="sm" x-data=""
                href="{{ route('post-category.create') }}">
                {{ __('Add Post') }}
            </x-button>
        </div>
        <div class="relative overflow-x-auto shadow-md ">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created by
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($postCategories as $postCategory)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $no++ }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $postCategory->title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $postCategory->user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $postCategory->created_at }}
                            </td>
                            <td class="px-6 py-4 flex gap-1">
                                <x-button variant="blue" size="sm" x-data=""
                                    href="{{ route('post-category.edit', $postCategory) }}">
                                    {{ __('Edit') }}
                                </x-button>
                                <x-button variant="info" size="sm" x-data=""
                                    href="{{ route('post-category.show', $postCategory) }}">
                                    {{ __('Show') }}
                                </x-button>
                                <form action="{{ route('post-category.destroy', $postCategory) }}" method="post"
                                    class="flex ">
                                    @csrf
                                    @method('DELETE')
                                    <x-button variant="danger" size="sm" x-data="">
                                        {{ __('Delete') }}
                                    </x-button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td class="w-full py-4 text-center" colspan="5">
                                No Data
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
