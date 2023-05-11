<x-landing.base title="Article">
    <div class="w-full flex justify-between gap-8">
        <div class="w-3/4">
            <div>
                <x-landing.card class="w-full" :time="$post->created_at->formatLocalized('%A, %d %b %Y')" :title="$post->title" :description="$post->description" :image="$post->image"
                    :slug="$post" />
            </div>
        </div>

        <div class="w-1/4">
            <h2 class="text-xl font-bold">Topik Popular</h2>
        </div>
    </div>
</x-landing.base>
