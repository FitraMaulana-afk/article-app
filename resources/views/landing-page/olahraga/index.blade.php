<x-landing.base title="Olahraga">
    <div class="w-full flex justify-between gap-8">
        <div class="lg:w-3/4 w-full">
            <div>
                <h2 class="lg:text-4xl text-xl font-bold">Berita Olahraga</h2>
                @foreach ($posts->take(1) as $post)
                    <x-landing.card class="w-full line-clamp-3" :time="$post->updated_at->diffForHumans()" :title="$post->title" :description="$post->description"
                        :image="$post->image" :slug="$post" />
                @endforeach
            </div>
        </div>

    </div>
</x-landing.base>
