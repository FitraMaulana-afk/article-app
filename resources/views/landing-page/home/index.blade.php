<x-landing.base title="Article">
    <div class="w-3/4">
        <div>
            @foreach ($posts as $post)
                @if ($post->post_status === 1)
                    <x-landing.card class="w-full" :time="$post->created_at->formatLocalized('%A, %d %b %Y')" :title="$post->title" :description="$post->description"
                        :image="$post->image" />
                @endif
            @endforeach
        </div>
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-gray-600">Terbaru</h2>
            <p>Lihat Semua</p>
        </div>
    </div>

    @foreach ($posts as $post)
        @if ($post->post_status === 0)
            <div class="carousel w-full">
                <div id="slide1" class="carousel-item relative w-full">
                    <x-landing.card class="w-1/4" :time="$post->created_at" :title="$post->title" :description="$post->description" />
                </div>
            </div>
        @endif
    @endforeach

</x-landing.base>
