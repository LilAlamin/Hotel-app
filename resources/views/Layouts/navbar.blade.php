<nav
    class="fixed w-full z-50 bg-neutral-950 bg-opacity-90 backdrop-blur-sm shadow-lg p-4 border-b border-neutral-800/50">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ url('/') }}"
            class="text-3xl font-extrabold text-amber-400 tracking-wide font-serif hover:text-amber-300 transition">Weird
            Hotel</a>
        <div class="hidden md:flex space-x-8 items-center">
            <a href="{{ url('/') }}"
                class="text-neutral-200 hover:text-amber-400 transition duration-300 text-lg font-medium">Beranda</a>
            <a href="{{ route('destinations') }}"
                class="text-neutral-200 hover:text-amber-400 transition duration-300 text-lg font-medium">Destinasi</a>

            @auth
                <a href="{{ route('booking.history') }}"
                    class="text-neutral-200 hover:text-amber-400 transition duration-300 text-lg font-medium">Pesanan
                    Saya</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                        class="px-6 py-2 bg-neutral-800 text-amber-400 rounded-full hover:bg-neutral-700 transition duration-300 font-semibold text-lg border border-amber-500/30 hover:border-amber-500/60">
                        Keluar
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="text-neutral-200 hover:text-amber-400 transition duration-300 text-lg font-medium">Masuk</a>
                <a href="{{ route('register') }}"
                    class="px-6 py-2 bg-amber-500 text-neutral-900 rounded-full hover:bg-amber-400 transition duration-300 font-semibold text-lg hover:shadow-lg hover:shadow-amber-500/20">Gabung</a>
            @endauth
        </div>
    </div>
</nav>
