<div class="mb-2">
    <x-form.label class="font-semibold text-lg">Title <span class="text-red-500">*</span></x-form.label>
    <x-form.input class="w-full mt-1" :disabled="request()->routeIs('post.show')" type="text" name="title" id="title" :value="old('title', $post ?? null)"
        placeholder="Enter Title" />
    @error('title')
        <x-form.error :messages="$message" />
    @enderror
</div>
<div class="my-2">
    <x-form.label class="font-semibold text-lg" for="link">Link</x-form.label>
    <x-form.input class="w-full mt-1" :disabled="request()->routeIs('post.show')" type="text" name="link" id="link" :value="old('link', $post ?? null)"
        placeholder="Enter Link" />
    @error('link')
        <x-form.error :messages="$message" />
    @enderror
</div>

<div class="my-2">
    <x-form.label class="font-semibold text-lg" for="description">Descirption</x-form.label>
    <x-form.textarea-input :text="$post->description ?? null" class="w-full mt-1" :disabled="request()->routeIs('post.show')" type="text" name="description"
        id="description" :value="old('description', $post ?? null)" placeholder="Enter Description" />
    @error('link')
        <x-form.error :messages="$message" />
    @enderror
</div>



<x-form.label class="font-semibold text-lg " value="Category" for="post_category_id" />
<x-form.select name="post_category_id" id="post_category_id" :disabled="request()->routeIs('post.show')">
    <option disabled hidden {{ old('category') != null ?: 'selected' }}>
        {{ __('Select Category') }}
    </option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}" @selected(!empty($post) && $category->id == $post->post_category_id)>
            {{ $category->title }}
        </option>
    @endforeach
</x-form.select>
@error('post_category_id')
    <x-form.error messages="{{ $message }}" />
@enderror


<x-form.label class="font-semibold text-lg" value="Status" for="status" />
<x-form.select name="status" id="status" :disabled="request()->routeIs('post.show')">
    <option disabled hidden {{ old('status') != null ?: 'selected' }}>
        {{ __('Select Status') }}
    </option>
    @foreach (\App\Enums\PublishStatusEnum::status as $key => $value)
        <option value="{{ $value }}"
            @if (request()->routeIs('post.edit') || request()->routeIs('post.show')) {{ old('status', $post->status) != $value ?: 'selected' }} @endif>
            {{ $key }}
        </option>
    @endforeach
</x-form.select>

<x-form.label class="font-semibold text-lg" value="Post Status" for="post_status" />
<x-form.select name="post_status" id="post_status" :disabled="request()->routeIs('post.show')">
    <option disabled hidden {{ old('status') != null ?: 'selected' }}>
        {{ __('Select Status') }}
    </option>
    @foreach (\App\Enums\PostStatusEnum::post_status as $key => $value)
        <option value="{{ $value }}"
            @if (request()->routeIs('post.edit') || request()->routeIs('post.show')) {{ old('post_status', $post->post_status) != $value ?: 'selected' }} @endif>
            {{ $key }}
        </option>
    @endforeach
</x-form.select>

@if (!empty(request()->routeIs('posts.edit') || request()->routeIs('posts.show')))
    @if (request()->routeIs('posts.show'))
        <x-form.label value="Image" />
    @else
        <x-form.label value="Old Image" />
    @endif
    <img src="{{ asset('storage/' . $post->image) }}" width="100px">
@endif


@if (!empty(request()->routeIs('post.edit') || request()->routeIs('post.show')))
    @if (request()->routeIs('post.show'))
        <x-form.label value="Image" />
    @else
        <x-form.label value="Old Image" />
    @endif
    <img src="{{ asset('storage/' . $post->image) }}" class="my-3" width="100px">
@endif

@if (request()->routeIs('post.edit') || request()->routeIs('post.create'))
    <div class="my-2">
        <x-form.label class="font-semibold text-lg" for="image">Image</x-form.label>
        <x-form.file-input class="w-full mt-1" type="image" name="image" id="image" :value="old('image', $post ?? null)"
            alert="SVG, PNG, JPG or GIF (MAX. 800x 400px)." />
        @error('image')
            <x-form.error :messages="$message" />
        @enderror
    </div>

    <div class="mt-6">
        <x-button variant="success" class="mb-3" size="sm" x-data="" type="submit">
            {{ __('Save') }}
        </x-button>
        <x-button variant="blue" type="reset" class="mb-3" size="sm" x-data="">
            {{ __('Reset') }}
        </x-button>
    @else
@endif

@if (request()->routeIs('post.show'))
    <div class="my-2">
        <x-form.label class="font-semibold text-lg" for="link">Created by</x-form.label>
        <x-form.input class="w-full mt-1" :disabled="request()->routeIs('post.show')" :value="$post->user->name" />
    </div>
    <div class="my-2">
        <x-form.label class="font-semibold text-lg" for="link">Created at</x-form.label>
        <x-form.input class="w-full mt-1" :disabled="request()->routeIs('post.show')" :value="old('created_at', $post ?? null)" />
    </div>
    <div class="my-2">
        <x-form.label class="font-semibold text-lg" for="link">Updated at</x-form.label>
        <x-form.input class="w-full mt-1" :disabled="request()->routeIs('post.show')" :value="old('updated_at', $post ?? null)" />
    </div>
@endif

<x-button variant="danger" class="mb-3" size="sm" :href="route('post.index')" x-data="">
    {{ __('Back') }}
</x-button>


</div>
