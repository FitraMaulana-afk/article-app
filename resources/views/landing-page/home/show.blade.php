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
        <div class="w-full flex flex-col ">
            @foreach ($posts as $post)
                <x-landing.card-down :time="$post->created_at->diffForHumans()" :title="$post->title" :image="$post->image" :description="$post->description"
                    :link="$post" :category="$post->category->title" />
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
        <div class="w-3/4 bg-gray-300/25 flex items-center  flex-col py-10 rounded-lg mt-10 gap-3">
            @forelse (range(1,10) as $item)
                <div class="flex justify-between gap-4 mx-8">
                    <div class="rounded-full">
                        <img src="{{ asset('assets/content/content1.jpeg') }}" class="rounded-full w-96" alt="">
                    </div>
                    <div>
                        <h2 class="text-md font-bold">Fitra Maulana</h2>
                        <p class="text-sm text-gray-600/75">1 jam yang lalu</p>
                        <p class="text-gray-800">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas
                            asperiores reiciendis porro
                            ducimus, animi, sunt facere architecto nam officiis laboriosam et. Doloribus odit corrupti
                            nemo ea optio cumque! Repudiandae dignissimos in consequatur explicabo sed molestias,
                            inventore est voluptatibus ipsam amet? Dolorem, eligendi debitis assumenda explicabo error
                            fuga voluptates pariatur possimus ipsum recusandae perspiciatis corporis maiores veritatis
                            provident earum enim repudiandae temporibus. Ut sequi amet culpa veniam iusto alias, dicta
                            iste earum debitis molestias nesciunt ipsa! Reiciendis voluptate delectus in placeat
                            tempora, voluptatum dolores natus porro, quas laudantium vel expedita ducimus iusto at magni
                            velit suscipit. Perferendis, ad sit! Eligendi, asperiores?</p>
                        <div class="flex justify-normal gap-8 mt-2 mb-4">
                            <button class="bg-transparant text-base text-gray-500  hover:text-gray-800 font-medium">
                                Edit
                            </button>
                            <button class="bg-transparant text-base text-gray-500  hover:text-gray-800 font-medium">
                                Hapus
                            </button>
                            <button class="bg-transparant text-base text-gray-500  hover:text-gray-800 font-medium">
                                Balas
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <i class="fa-solid fa-comments text-8xl"></i>
                <h2 class="font-bold text-xl">Belum ada Komentar</h2>
            @endforelse
        </div>
    </div>
</x-landing.base>
