<x-landing.base title="Article">

    <div class="w-full flex justify-between gap-8">
        <div class="w-3/4">
            <div>
                <h2 class="text-4xl font-bold">Berita Utama</h2>
                @foreach ($posts->take(1) as $post)
                    <x-landing.card class="w-full line-clamp-3" :time="$post->updated_at->diffForHumans()" :title="$post->title" :description="$post->description"
                        :image="$post->image" :slug="$post" />
                @endforeach
            </div>
        </div>
        <div class="w-1/4">
            <h2 class="text-2xl font-bold">Topik Popular</h2>
            @foreach ($categories as $category)
                <p class="text-xl mt-4 font-semibold">
                    <span class="text-orange-500 font-bold mr-2">#</span>{{ $category->title }}
                </p>
            @endforeach
        </div>
    </div>

    @include('landing-page.home.content')


</x-landing.base>
