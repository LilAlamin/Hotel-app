<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations - Weird Hotel</title>
    <link rel="icon" type="image/x-icon" href="http://static.photos/minimal/200x200/50">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: #0a0a0a;
            color: #e0e0e0;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
        }

        /* Override Tailwind default for better scrollbar aesthetics in dark mode */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #1a1a1a;
        }

        ::-webkit-scrollbar-thumb {
            background: #4a4a4a;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #6a6a6a;
        }
    </style>
</head>

<body class="antialiased">
    <!-- Navbar -->
    <nav class="fixed w-full z-50 bg-neutral-950 bg-opacity-90 backdrop-blur-sm shadow-lg p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-3xl font-extrabold text-amber-400 tracking-wide font-serif">Weird
                Hotel</a>
            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ url('/') }}"
                    class="text-neutral-200 hover:text-amber-400 transition duration-300 text-lg">Beranda</a>
                <a href="{{ route('destinations') }}"
                    class="text-amber-400 font-bold transition duration-300 text-lg border-b-2 border-amber-400">Destinasi</a>

                @auth
                    <a href="{{ route('booking.history') }}"
                        class="text-neutral-200 hover:text-amber-400 transition duration-300 text-lg">Pesanan Saya</a>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="px-6 py-3 bg-neutral-800 text-amber-400 rounded-full hover:bg-neutral-700 transition duration-300 font-semibold text-lg border border-amber-500/30">
                            Keluar
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="text-neutral-200 hover:text-amber-400 transition duration-300 text-lg">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="px-6 py-3 bg-amber-500 text-neutral-900 rounded-full hover:bg-amber-400 transition duration-300 font-semibold text-lg">Gabung</a>
                @endauth
            </div>
            <button id="mobile-menu-button" class="md:hidden text-neutral-200 focus:outline-none">
                <i data-feather="menu" class="w-8 h-8"></i>
            </button>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu"
            class="hidden md:hidden flex flex-col items-center bg-neutral-900 py-4 mt-2 rounded-lg mx-4 shadow-xl">
            <a href="{{ url('/') }}"
                class="block py-3 text-neutral-200 hover:text-amber-400 transition duration-300 text-xl font-medium">Beranda</a>
            <a href="{{ route('destinations') }}" class="block py-3 text-amber-400 font-medium text-xl">Destinasi</a>
            @auth
                <a href="{{ route('booking.history') }}"
                    class="block py-3 text-neutral-200 hover:text-amber-400 transition duration-300 text-xl font-medium">Pesanan
                    Saya</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="block py-3 text-red-400 font-medium">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="block py-3 text-neutral-200 hover:text-amber-400 transition duration-300 text-xl font-medium">Masuk</a>
                <a href="{{ route('register') }}"
                    class="block py-3 mt-4 px-8 bg-amber-500 text-neutral-900 rounded-full hover:bg-amber-400 transition duration-300 font-semibold text-xl">Daftar</a>
            @endauth
        </div>
    </nav>

    <main class="pt-32 pb-24">
        <div class="container mx-auto px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-down">
                <h1 class="text-5xl md:text-6xl font-extrabold text-amber-400 mb-6 font-serif">Semua Destinasi</h1>
                <p class="text-xl text-neutral-400 max-w-2xl mx-auto">Jelajahi setiap sudut dari koleksi unik kami.
                    Temukan pengalaman aneh yang sempurna untuk Anda.</p>
            </div>

            @if ($hotels->isEmpty())
                <div class="text-center py-20 border border-dashed border-neutral-700 rounded-2xl bg-neutral-950/50">
                    <p class="text-neutral-500 text-xl font-medium">Tidak ada destinasi yang tersedia saat ini.</p>
                </div>
            @else
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12">
                    @foreach ($hotels as $hotel)
                        <div class="bg-neutral-950 rounded-xl shadow-2xl transform hover:scale-105 transition duration-500 ease-in-out border border-neutral-800 overflow-hidden group flex flex-col"
                            data-aos="fade-up">
                            <div class="relative h-64 overflow-hidden">
                                <img src="{{ $hotel->image ? asset('storage/' . $hotel->image) : 'https://via.placeholder.com/400x300?text=Weird+Hotel' }}"
                                    alt="{{ $hotel->name }}"
                                    class="w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-80 group-hover:opacity-100">
                                <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 to-transparent"></div>
                            </div>
                            <div class="p-8 relative flex-grow flex flex-col justify-between">
                                <div>
                                    <h3 class="text-3xl font-semibold text-neutral-100 mb-2 font-serif">
                                        {{ $hotel->name }}</h3>
                                    <p class="text-neutral-400 mb-6 flex items-center justify-center text-sm">
                                        <i data-feather="map-pin" class="w-4 h-4 mr-2 text-amber-500"></i>
                                        {{ Str::limit($hotel->address, 50) }}
                                    </p>
                                </div>
                                <a href="{{ route('hotels.show', $hotel->id) }}"
                                    class="inline-block px-8 py-3 border border-amber-500 text-amber-500 rounded-full hover:bg-amber-500 hover:text-neutral-900 transition duration-300 font-semibold uppercase tracking-wider text-sm text-center">
                                    Masuki Alam Ini
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-neutral-950 py-16 text-neutral-400 text-center border-t border-neutral-900">
        <div class="container mx-auto px-6 lg:px-8">
            <p class="text-lg">&copy; {{ date('Y') }} Weird Hotel. All rights reserved.</p>
        </div>
    </footer>

    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 50,
        });
        feather.replace();

        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>
