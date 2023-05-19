@props([
    'title' => '',
])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&family=Poppins&display=swap"
        rel="stylesheet">

    {{-- icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    {{-- sweetaelrt --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/slider.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    {{-- livewire --}}
    @stack('css')
</head>

<body>
    @if (session('success'))
        <div class="mb-4 rounded-lg bg-info-100 px-6 py-5 text-base text-info-800 border border-info-300"
            role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('danger'))
        <div class="mb-4 rounded-lg bg-info-100 px-6 py-5 text-base text-info-800 border border-info-300"
            role="alert">
            {{ session('danger') }}
        </div>
    @endif
    <x-landing.navbar />
    <div class="flex flex-col justify-center items-center top-0">
        <div class="container">
            <main class="px-20 min-h-screen">
                {{ $slot }}
            </main>
        </div>
    </div>
    <x-landing.footer />



    <script>
        const btn = document.querySelector('button[aria-controls="mobile-menu"]');
        const menu = document.querySelector('#mobile-menu');
        btn.addEventListener('click', () => {
            const expanded = btn.getAttribute('aria-expanded') === 'true' || false;
            btn.setAttribute('aria-expanded', !expanded);
            menu.classList.toggle('hidden');
        });
    </script>

    <script src="{{ asset('assets/js/slider.js') }}"></script>
    @stack('js')
</body>

</html>
