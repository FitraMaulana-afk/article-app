<x-landing.base title="Article">

    <div class="w-full flex justify-between gap-8">
        <div class="lg:w-3/4 w-full">
            <div>
                <h2 class="text-lg lg:text-4xl font-bold">Berita Utama</h2>
                @foreach ($posts->take(1) as $post)
                    <x-landing.card class="w-full line-clamp-3" :time="$post->updated_at->diffForHumans()" :title="$post->title" :description="$post->description"
                        :image="$post->image" :slug="$post" />
                @endforeach
            </div>
        </div>
        <div class="hidden lg:w-1/4 lg:flex lg:flex-col">
            <h2 class="text-2xl font-bold">Topik Popular</h2>
            @foreach ($categories as $category)
                <p class="text-xl mt-4 font-semibold">
                    <span class="text-primaryRed font-bold mr-2">#</span>{{ $category->title }}
                </p>
            @endforeach
        </div>
    </div>

    @include('landing-page.home.content')


</x-landing.base>
