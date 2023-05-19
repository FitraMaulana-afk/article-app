@push('css')
    @livewireStyles
@endpush

@push('js')
    @livewireScripts
    <script>
        Livewire.on('comment_store', commentId => {
            var helloScroll = document.getElementById('comment-' + commentId);
            helloScroll.scrollIntoView({
                behavior: 'smooth'
            }, true);
        })
    </script>
@endpush

<x-landing.base title="Article">
    {{ $post->id }}
    <div class="flex mb-4">
        <p class="items-center text-base font-medium">
            <a href="{{ route('landing.index') }}">
                Home
            </a>
            <span class="text-orange-500">
                <i class="fa-solid fa-chevron-right text-xs">
                    <a href="" class="text-orange-500 font-medium text-base">
                        {{ $post->category->title }}
                    </a>
                </i>
            </span>
        </p>
    </div>
    <div class="w-full flex justify-between gap-8">
        <div class="w-3/4">
            <x-landing.detail-card class="w-full" :time="$post->created_at->formatLocalized('%A, %d %b %Y')" :title="$post->title" :description="$post->description"
                :image="$post->image" />
        </div>
        <div class="w-1/4">
            <h2 class="text-xl font-bold">Topik Popular</h2>
            @foreach ($categories as $category)
                <p class="text-xl mt-4 font-semibold">
                    <span class="text-orange-500 font-bold mr-2">#</span>{{ $category->title }}
                </p>
            @endforeach
        </div>
    </div>

    <div class="mt-10">
        <h2 class="text-xl font-bold">Berita Lainnya</h2>
        <x-landing.slide-content>
            @foreach ($posts as $post)
                <x-landing.slidebar-card :time="$post->created_at->diffForHumans()" :title="$post->title" :image="$post->image" />
            @endforeach
        </x-landing.slide-content>
    </div>

    <div class="mt-10 w-full">
        <div class="w-full flex flex-col ">
            @foreach ($posts as $post)
                <x-landing.card-down :time="$post->created_at->diffForHumans()" :title="$post->title" :image="$post->image" :description="$post->description"
                    :link="$post" :category="$post->category->title" />
            @endforeach
        </div>
    </div>

    @livewire('posts.comment', ['id' => $post->id])
</x-landing.base>
