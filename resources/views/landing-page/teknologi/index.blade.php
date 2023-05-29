<x-landing.base title="Teknologi">
    <div class="w-full flex justify-between gap-8">
        <div class="w-3/4">
            <div>
                <h2 class="text-4xl font-bold">Berita Teknologi</h2>
                @foreach ($posts->take(1) as $post)
                    <x-landing.card class="w-full line-clamp-3" :time="$post->updated_at->diffForHumans()" :title="$post->title" :description="$post->description"
                        :image="$post->image" :slug="$post" />
                @endforeach
            </div>
        </div>
    </div>
</x-landing.base>
