<x-landing.base title="Article">
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
        <h2 class="text-xl font-bold">Berita Olahraga</h2>
        <div class="w-full flex flex-col ">
            @foreach ($posts->take(5) as $post)
                <div class="p-4 my-1 flex">
                    <img src="{{ asset('storage/' . $post->image) }}" class="rounded-lg gambar-hover w-1/5"
                        alt="img" draggable="false">
                    <div class="ml-3">
                        <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                        <h2 class="text-lg font-bold">{{ $post->title }}</h2>
                        <p class="text-base text-gray-500 line-clamp-2">{{ $post->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div class="w-full flex justify-between gap-8">
        <div class="w-3/4 bg-gray-300/25 flex flex-col p-4 rounded-lg mt-10 gap-3">
            <h2 class="font-bold text-xl">Komentar</h2>
            <form action="" method="post" class="w-full">
                <x-form.textarea-input class="w-full border-none shadow-md" placeholder="Tulis Komentar..." />
                <x-button variant="orange" size="sm" class="float-right mt-3">
                    <span>Kirim</span>

                </x-button>
            </form>
        </div>
        <div class="w-1/4">
            <h2 class="text-xl font-bold"></h2>
        </div>
    </div>

    <div class="w-full flex justify-between gap-8">
        <div class="w-3/4 bg-gray-300/25 flex items-center  flex-col py-32 rounded-lg mt-10 gap-3">
            <i class="fa-solid fa-comments text-8xl"></i>
            <h2 class="font-bold text-xl">Belum ada Komentar</h2>
        </div>
    </div>
</x-landing.base>
