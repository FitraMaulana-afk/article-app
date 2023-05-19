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