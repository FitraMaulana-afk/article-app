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
    <div class="flex mb-4">
        <p class="items-center text-base font-medium">
            <a href="{{ route('landing.index') }}">
                Home
            </a>
            <span class="text-primaryRed">
                <i class="fa-solid fa-chevron-right text-xs">
                    <a href="" class="text-primaryRed font-medium text-base">
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
                    <span class="text-primaryRed font-bold mr-2">#</span>{{ $category->title }}
                </p>
            @endforeach
        </div>
    </div>
    @include('landing-page.home.content')

    @livewire('posts.comment', ['id' => $post->id])
</x-landing.base>
