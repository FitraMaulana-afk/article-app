<x-app-layout title="Dashboard | Post">
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Post') }}
            </h2>

        </div>
    </x-slot>

    <div>
        <div>
            <x-button variant="success" class="mb-3" size="sm" x-data=""
                href="{{ route('post.create') }}">
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
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Post Status
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
                    @forelse ($posts as $post)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $no++ }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $post->title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $post->user->name }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($post->IsPublish)
                                    <span
                                        class="text-xs font-bold inline-block py-1 px-2 rounded-full text-emerald-600 bg-emerald-200 uppercase last:mr-0 mr-1">{{ __('Publish') }}</span>
                                @elseif ($post->is_draft)
                                    <span
                                        class="text-xs font-bold inline-block py-1 px-2  rounded-full text-red-600 bg-red-200 text-blueGray-600 bg-blueGray-200 uppercase last:mr-0 mr-1">{{ __('Draft') }}</span>
                                @else
                                    <span
                                        class="text-xs font-bold inline-block py-1 px-2  rounded-full text-yellow-600 bg-yellow-200 text-blueGray-600 bg-blueGray-200 uppercase last:mr-0 mr-1">{{ __('Pending') }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($post->post_status === 1)
                                    <span
                                        class="text-xs font-bold inline-block py-1 px-2 rounded-full text-blue-600 bg-blue-200 uppercase last:mr-0 mr-1">{{ __('Main') }}</span>
                                @else
                                    <span
                                        class="text-xs font-bold inline-block py-1 px-2  rounded-full text-lime-500 bg-lime-200 text-blueGray-600 bg-blueGray-200 uppercase last:mr-0 mr-1">{{ __('Normal') }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 flex gap-1">
                                <x-button variant="blue" size="sm" x-data=""
                                    href="{{ route('post.edit', $post) }}">
                                    {{ __('Edit') }}
                                </x-button>
                                <x-button variant="info" size="sm" x-data=""
                                    href="{{ route('post.show', $post) }}">
                                    {{ __('Detail') }}
                                </x-button>
                                <form action="{{ route('post.destroy', $post) }}" method="post" class="flex ">
                                    @csrf
                                    @method('DELETE')
                                    <x-button variant="danger" size="sm" data-confirm-delete="true">
                                        {{ __('Delete') }}
                                    </x-button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td class="w-full py-4 text-center" colspan="6">
                                No Data
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
