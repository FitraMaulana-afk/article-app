<div class="mb-2">
    <x-form.label class="font-semibold text-lg">Title <span class="text-red-500">*</span></x-form.label>
    <x-form.input class="w-full mt-1" :disabled="request()->routeIs('post-category.show')" type="text" name="title" id="title" :value="old('title', $postCategory ?? null)"
        placeholder="Enter Title" />
    @error('title')
        <x-form.error :messages="$message" />
    @enderror
</div>
<div class="my-2">
    <x-form.label class="font-semibold text-lg" for="link">Link</x-form.label>
    <x-form.input class="w-full mt-1" :disabled="request()->routeIs('post-category.show')" type="text" name="link" id="link" :value="old('link', $postCategory ?? null)"
        placeholder="Enter Link" />
    @error('link')
        <x-form.error :messages="$message" />
    @enderror
</div>

<div class="my-2">
    <x-form.label class="font-semibold text-lg" for="description">Descirption</x-form.label>
    <x-form.textarea-input :text="$postCategory->description ?? null" class="w-full mt-1" :disabled="request()->routeIs('post-category.show')" type="text" name="description"
        id="description" :value="old('description', $postCategory ?? null)" placeholder="Enter Description" />
    @error('description')
        <x-form.error :messages="$message" />
    @enderror
</div>

@if (request()->routeIs('post-category.edit') || request()->routeIs('post-category.create'))
    <div class="mt-2">
        <x-button variant="success" class="mb-3" size="sm" x-data="" type="submit">
            {{ __('Save') }}
        </x-button>
        <x-button variant="blue" type="reset" class="mb-3" size="sm" x-data="">
            {{ __('Reset') }}
        </x-button>
@endif

@if (request()->routeIs('post-category.show'))
    <div class="my-2">
        <x-form.label class="font-semibold text-lg" for="link">Created by</x-form.label>
        <x-form.input class="w-full mt-1" :disabled="request()->routeIs('post-category.show')" :value="$postCategory->user->name" />
    </div>
    <div class="my-2">
        <x-form.label class="font-semibold text-lg" for="link">Created at</x-form.label>
        <x-form.input class="w-full mt-1" :disabled="request()->routeIs('post-category.show')" :value="old('created_at', $postCategory ?? null)" />
    </div>
    <div class="my-2">
        <x-form.label class="font-semibold text-lg" for="link">Updated at</x-form.label>
        <x-form.input class="w-full mt-1" :disabled="request()->routeIs('post-category.show')" :value="old('updated_at', $postCategory ?? null)" />
    </div>
@endif

<x-button variant="warning" class="mb-3" size="sm" :href="route('post-category.index')" x-data="">
    {{ __('Back') }}
</x-button>


</div>
