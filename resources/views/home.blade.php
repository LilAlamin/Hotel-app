<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weird Hotel - An Experience Beyond the Ordinary</title>
    <link rel="icon" type="image/x-icon" href="http://static.photos/minimal/200x200/50">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <!-- Vanta.js for hero background -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.globe.min.js"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: #0a0a0a;
            /* Very dark background */
            color: #e0e0e0;
            /* Light text */
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        .vanta-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
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

        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
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
                <a href="#hero"
                    class="text-neutral-200 hover:text-amber-400 transition duration-300 text-lg">Beranda</a>
                <a href="#about"
                    class="text-neutral-200 hover:text-amber-400 transition duration-300 text-lg">Tentang</a>
                <a href="{{ route('destinations') }}"
                    class="text-neutral-200 hover:text-amber-400 transition duration-300 text-lg">Destinasi</a>

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
        <div id="mobile-menu"
            class="hidden md:hidden flex flex-col items-center bg-neutral-900 py-4 mt-2 rounded-lg mx-4 shadow-xl">
            <a href="#hero"
                class="block py-3 text-neutral-200 hover:text-amber-400 transition duration-300 text-xl font-medium">Beranda</a>
            <a href="{{ route('destinations') }}"
                class="block py-3 text-neutral-200 hover:text-amber-400 transition duration-300 text-xl font-medium">Destinasi</a>
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

    <main>
        <!-- Hero Section with Vanta.js Background -->
        <section id="hero" class="relative h-screen flex items-center justify-center text-center overflow-hidden">
            <div id="vanta-background" class="vanta-container"></div>
            <div class="relative z-10 p-6 md:p-8" data-aos="fade-up" data-aos-duration="1500">
                <h1 class="text-6xl md:text-8xl font-extrabold text-amber-400 mb-6 drop-shadow-lg font-serif">Weird
                    Hotel</h1>
                <p class="text-xl md:text-3xl text-neutral-200 max-w-3xl mx-auto mb-10 leading-relaxed drop-shadow-md">
                    Sebuah pengalaman di luar kebiasaan. Temukan tempat perlindungan di mana seni, misteri, dan
                    kenyamanan saling terkait.
                </p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                    <a href="#catalog"
                        class="px-8 py-4 bg-amber-500 text-neutral-900 font-semibold text-lg rounded-full hover:bg-amber-400 transition duration-300 shadow-xl transform hover:-translate-y-1">Jelajahi
                        Kamar</a>
                    @guest
                        <a href="{{ route('login') }}"
                            class="px-8 py-4 border-2 border-amber-500 text-amber-500 font-semibold text-lg rounded-full hover:bg-amber-500 hover:text-neutral-900 transition duration-300 shadow-xl transform hover:-translate-y-1">Masuk
                            untuk Memesan</a>
                    @endguest
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="relative py-24 bg-neutral-900 text-center overflow-hidden">
            <div
                class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=2070&auto=format&fit=crop')] bg-cover bg-center bg-fixed opacity-10">
            </div>
            <div class="relative z-10 container mx-auto px-6 lg:px-8">
                <h2 class="text-5xl md:text-6xl font-extrabold text-amber-400 mb-16 font-serif" data-aos="fade-up">
                    Tempat
                    Perlindungan bagi yang Penasaran</h2>
                <div class="grid md:grid-cols-2 gap-16 items-center">
                    <div data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-out-back"
                        class="relative group">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-amber-600 to-purple-600 rounded-xl blur opacity-25 group-hover:opacity-75 transition duration-1000 group-hover:duration-200">
                        </div>
                        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070&auto=format&fit=crop"
                            alt="Interior Weird Hotel"
                            class="relative rounded-xl shadow-2xl w-full h-80 object-cover object-center border border-neutral-700">
                    </div>
                    <div class="text-left" data-aos="fade-left" data-aos-duration="1000"
                        data-aos-easing="ease-out-back">
                        <p class="text-xl text-neutral-300 mb-8 leading-relaxed font-light">
                            <span class="text-amber-400 font-bold text-2xl">Weird Hotel</span> bukan sekadar tempat
                            untuk
                            merebahkan kepala; ini adalah kanvas pengalaman. Kami menantang standar perhotelan yang
                            biasa
                            dengan memadukan <strong class="text-neutral-100">seni avant-garde</strong>, <strong
                                class="text-neutral-100">penceritaan imersif</strong>, dan <strong
                                class="text-neutral-100">kemewahan tanpa kompromi</strong>.
                        </p>
                        <p class="text-xl text-neutral-300 leading-relaxed font-light">
                            Terletak di persimpangan antara kenyataan dan mimpi, ruang kami dirancang untuk memancing
                            pemikiran dan menginspirasi keajaiban. Baik Anda mencari ketenangan di Dreamscape Suites
                            atau petualangan di
                            Mystic Dining kami, bersiaplah untuk meninggalkan hal-hal biasa.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="relative py-24 bg-neutral-950 overflow-hidden">
            <!-- Floating Elements Animation -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
                <div
                    class="absolute top-10 left-10 w-32 h-32 bg-amber-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob">
                </div>
                <div
                    class="absolute top-10 right-10 w-32 h-32 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000">
                </div>
                <div
                    class="absolute -bottom-8 left-20 w-32 h-32 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-4000">
                </div>
            </div>

            <div class="container mx-auto px-6 lg:px-8 text-center relative z-10">
                <h2 class="text-5xl md:text-6xl font-extrabold text-amber-400 mb-20 font-serif" data-aos="fade-up">
                    Lebih dari Sekadar Akomodasi</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12">
                    <div class="bg-gradient-to-br from-neutral-900 to-neutral-800 rounded-2xl shadow-xl p-8 transform hover:scale-105 transition duration-500 ease-in-out border border-neutral-700 hover:border-amber-500/50 group"
                        data-aos="zoom-in" data-aos-delay="100">
                        <div
                            class="w-20 h-20 bg-neutral-950 rounded-full flex items-center justify-center mx-auto mb-8 shadow-inner group-hover:shadow-amber-500/20 transition duration-500">
                            <i data-feather="moon" class="w-10 h-10 text-amber-400"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-neutral-100 mb-4 font-serif">Dreamscape Suites</h3>
                        <p class="text-neutral-400 leading-relaxed">
                            Tidur di dalam sebuah mahakarya. Setiap kamar menceritakan kisah yang berbeda, dikurasi
                            dengan
                            furnitur pesanan khusus dan pencahayaan ambien.
                        </p>
                    </div>
                    <div class="bg-gradient-to-br from-neutral-900 to-neutral-800 rounded-2xl shadow-xl p-8 transform hover:scale-105 transition duration-500 ease-in-out border border-neutral-700 hover:border-amber-500/50 group"
                        data-aos="zoom-in" data-aos-delay="300">
                        <div
                            class="w-20 h-20 bg-neutral-950 rounded-full flex items-center justify-center mx-auto mb-8 shadow-inner group-hover:shadow-amber-500/20 transition duration-500">
                            <i data-feather="coffee" class="w-10 h-10 text-amber-400"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-neutral-100 mb-4 font-serif">Mystic Dining</h3>
                        <p class="text-neutral-400 leading-relaxed">
                            Teater gastronomi. Cicipi rasa yang sulit dijelaskan dalam suasana yang merangsang semua
                            indra Anda.
                        </p>
                    </div>
                    <div class="bg-gradient-to-br from-neutral-900 to-neutral-800 rounded-2xl shadow-xl p-8 transform hover:scale-105 transition duration-500 ease-in-out border border-neutral-700 hover:border-amber-500/50 group"
                        data-aos="zoom-in" data-aos-delay="500">
                        <div
                            class="w-20 h-20 bg-neutral-950 rounded-full flex items-center justify-center mx-auto mb-8 shadow-inner group-hover:shadow-amber-500/20 transition duration-500">
                            <i data-feather="zap" class="w-10 h-10 text-amber-400"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-neutral-100 mb-4 font-serif">Neon Lounge</h3>
                        <p class="text-neutral-400 leading-relaxed">
                            Detak jantung malam hari. Nikmati koktail khas dan irama halus di lounge bawah tanah
                            eksklusif kami.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Dynamic Catalog Section (Added) -->
        <section id="catalog" class="relative py-24 bg-neutral-900 text-center overflow-hidden text-neutral-100">
            <div class="container mx-auto px-6 lg:px-8">
                <h2 class="text-5xl md:text-6xl font-extrabold text-amber-400 mb-8 font-serif" data-aos="fade-up">
                    Jelajahi Dunia Kami</h2>
                <p class="text-xl text-neutral-400 mb-16 max-w-2xl mx-auto">Pilih tempat perlindungan Anda dari pilihan
                    destinasi yang telah dikurasi secara unik.</p>

                @if ($hotels->isEmpty())
                    <div class="p-12 border border-dashed border-neutral-700 rounded-2xl bg-neutral-950/50">
                        <p class="text-neutral-500 text-xl font-medium">Belum ada destinasi yang tersedia saat ini.
                            Kekosongan
                            ini hampa.</p>
                    </div>
                @else
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12 mb-16">
                        @foreach ($hotels as $hotel)
                            <div class="bg-neutral-950 rounded-xl shadow-2xl transform hover:scale-105 transition duration-500 ease-in-out border border-neutral-800 overflow-hidden group flex flex-col"
                                data-aos="fade-up">
                                <div class="relative h-64 overflow-hidden">
                                    <img src="{{ $hotel->image ? asset('storage/' . $hotel->image) : 'https://via.placeholder.com/400x300?text=Weird+Hotel' }}"
                                        alt="{{ $hotel->name }}"
                                        class="w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-80 group-hover:opacity-100">
                                    <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 to-transparent">
                                    </div>
                                </div>
                                <div class="p-8 relative flex-grow flex flex-col justify-between">
                                    <div>
                                        <h3 class="text-3xl font-semibold text-neutral-100 mb-2 font-serif">
                                            {{ $hotel->name }}</h3>
                                        <p class="text-neutral-400 mb-3 flex items-center justify-center text-sm">
                                            <i data-feather="map-pin" class="w-4 h-4 mr-2 text-amber-500"></i>
                                            {{ Str::limit($hotel->address, 50) }}
                                        </p>
                                        <p
                                            class="text-neutral-500 mb-6 flex items-center justify-center text-xs font-bold uppercase tracking-wider">
                                            <i data-feather="grid" class="w-3 h-3 mr-2 text-neutral-600"></i>
                                            {{ $hotel->roomTypes->count() }} Tipe Kamar Tersedia
                                        </p>
                                    </div>
                                    <a href="{{ route('hotels.show', $hotel->id) }}"
                                        class="inline-block px-8 py-3 border border-amber-500 text-amber-500 rounded-full hover:bg-amber-500 hover:text-neutral-900 transition duration-300 font-semibold uppercase tracking-wider text-sm">
                                        Masuki Alam Ini
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center" data-aos="fade-up">
                        <a href="{{ route('destinations') }}"
                            class="inline-block px-10 py-4 bg-transparent border-2 border-neutral-700 text-neutral-300 rounded-full hover:border-amber-500 hover:text-amber-500 transition duration-300 font-semibold text-lg">
                            Lihat Semua Alam
                        </a>
                    </div>
                @endif
            </div>
        </section>


        <!-- Call to Action Section -->
        <section id="cta" class="relative py-24 bg-neutral-800 text-center overflow-hidden" data-aos="fade-up"
            data-aos-duration="1200">
            {{-- <div
                class="absolute inset-0 bg-[url('http://static.photos/technology/1200x630/602')] bg-cover bg-center bg-fixed opacity-8">
            </div> --}}
            <div class="container mx-auto px-6 lg:px-8">
                <h2 class="text-5xl md:text-6xl font-extrabold text-amber-400 mb-10 font-serif">Siap untuk yang
                    Tidak Konvensional?</h2>
                <p class="text-xl md:text-2xl text-neutral-200 max-w-4xl mx-auto mb-12 leading-relaxed">
                    Selami pengalaman yang tak terlupakan. Pesan penginapan Anda di Weird Hotel dan definisikan ulang
                    ide
                    kemewahan Anda.
                </p>
                @guest
                    <a href="{{ route('register') }}"
                        class="px-10 py-5 bg-amber-500 text-neutral-900 font-bold text-xl rounded-full hover:bg-amber-400 transition duration-300 shadow-xl transform hover:scale-105 hover:-translate-y-1">Mulai
                        Perjalanan Anda</a>
                @else
                    <a href="#catalog"
                        class="px-10 py-5 bg-amber-500 text-neutral-900 font-bold text-xl rounded-full hover:bg-amber-400 transition duration-300 shadow-xl transform hover:scale-105 hover:-translate-y-1">Pilih
                        Kamar</a>
                @endguest
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-neutral-950 py-16 text-neutral-400 text-center">
        <div class="container mx-auto px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-12 mb-12">
                <div class="text-left md:text-center" data-aos="fade-up" data-aos-delay="100">
                    <h4 class="text-3xl font-bold text-amber-400 mb-6 font-serif">Weird Hotel</h4>
                    <p class="mb-3 text-lg">123 Peculiar Lane, Mystery City</p>
                    <p class="mb-3 text-lg">The Unknown, 90210, Indonesia</p>
                    <p class="mb-3 text-lg">Telepon: <a href="tel:+1555WEIRDHTL"
                            class="hover:text-amber-400 transition duration-300">+1 (555) WEIRD-HTL</a></p>
                    <p class="text-lg">Email: <a href="mailto:info@weirdhotel.com"
                            class="hover:text-amber-400 transition duration-300">info@weirdhotel.com</a></p>
                </div>
                <div data-aos="fade-up" data-aos-delay="300">
                    <h4 class="text-3xl font-bold text-amber-400 mb-6 font-serif">Tautan Cepat</h4>
                    <ul>
                        <li class="mb-3"><a href="#hero"
                                class="hover:text-amber-400 transition duration-300 text-lg">Beranda</a></li>
                        <li class="mb-3"><a href="#about"
                                class="hover:text-amber-400 transition duration-300 text-lg">Tentang</a></li>
                        <li class="mb-3"><a href="#catalog"
                                class="hover:text-amber-400 transition duration-300 text-lg">Destinasi</a></li>
                    </ul>
                </div>
                <div data-aos="fade-up" data-aos-delay="500">
                    <h4 class="text-3xl font-bold text-amber-400 mb-6 font-serif">Terhubung Dengan Kami</h4>
                    <div class="flex justify-center space-x-8">
                        <a href="#"
                            class="text-neutral-400 hover:text-amber-400 transition duration-300 transform hover:scale-110"><i
                                data-feather="facebook" class="w-10 h-10"></i></a>
                        <a href="#"
                            class="text-neutral-400 hover:text-amber-400 transition duration-300 transform hover:scale-110"><i
                                data-feather="instagram" class="w-10 h-10"></i></a>
                        <a href="#"
                            class="text-neutral-400 hover:text-amber-400 transition duration-300 transform hover:scale-110"><i
                                data-feather="twitter" class="w-10 h-10"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-neutral-700 pt-10 mt-10">
                <p class="text-lg">&copy; <span id="current-year"></span> Weird Hotel. Hak cipta dilindungi
                    undang-undang.</p>
            </div>
        </div>
    </footer>

    <script>
        AOS.init({
            duration: 1200,
            once: true,
            offset: 50,
        });
        feather.replace();

        // Vanta.js initialization
        VANTA.GLOBE({
            el: "#vanta-background",
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 200.00,
            minWidth: 200.00,
            scale: 1.00,
            scaleMobile: 1.00,
            color: 0x1a1a1a,
            /* Lines color */
            color2: 0x222222,
            /* Secondary lines color (if applicable) */
            backgroundColor: 0x0a0a0a,
            /* Background color */
            size: 0.90,
            /* Globe size */
            maxDistance: 20.00,
            /* Max distance for lines */
        });

        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu when a link is clicked
        const mobileMenuLinks = mobileMenu.querySelectorAll('a');
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });

        // Set current year in footer
        document.getElementById('current-year').textContent = new Date().getFullYear();
    </script>
</body>

</html>
