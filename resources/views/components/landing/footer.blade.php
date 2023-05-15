@props([
    'kategori' => '',
])

<footer class="w-full py-24 border-t-orange-800 border mt-4 flex justify-center items-center">
    <div class="px-20 container flex justify-center">
        <div class="flex gap-1 text-center items-center mx-10">
            <h2 class=" text-gray-800 p-4 font-bold rounded-full text-lg">FM </h2>
            <h3 class=" text-gray-800 p-2 -m-3 rounded-e-xl font-bold ">Information.com</h3>
        </div>
        <div class="flex flex-col items-start mx-10">
            <h2 class=" text-gray-800 p-2 font-bold text-lg">Kategori</h2>
            @foreach ($categories as $category)
                <h3 class=" text-gray-800 p-2  ">{{ $category->title }}</h3>
            @endforeach
        </div>
        <div class="flex flex-col items-start mx-10">
            <h2 class=" text-gray-800 p-2 font-bold text-lg">Kategori</h2>
            @foreach ($categories as $category)
                <h3 class=" text-gray-800 p-2  ">{{ $category->title }}</h3>
            @endforeach
        </div>
        <div class="flex flex-col items-start mx-10">
            <h2 class=" text-gray-800 p-2 font-bold text-lg">Kategori</h2>
            @foreach ($categories as $category)
                <h3 class=" text-gray-800 p-2  ">{{ $category->title }}</h3>
            @endforeach
        </div>
        <div class="flex flex-col items-start mx-10">
            <h2 class=" text-gray-800 p-2 font-bold text-lg">Kategori</h2>
            @foreach ($categories as $category)
                <h3 class=" text-gray-800 p-2  ">{{ $category->title }}</h3>
            @endforeach
        </div>

    </div>
</footer>
