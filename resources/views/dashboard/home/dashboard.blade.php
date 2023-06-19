<x-app-layout title="Dashboard">
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>

        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        {{ __("You're logged in!") }} <span class="font-semibold">{{ auth()->user()->name }}</span>
    </div>


    <div class="grid grid-rows-6 lg:grid-cols-4 gap-4 mt-4">
        <x-total-card icon="fa-solid fa-layer-group" title="Post" :count="$posts" />
        <x-total-card icon="fa-solid fa-users" title="Users" :count="auth()
            ->user()
            ->count()" />
    </div>
</x-app-layout>
