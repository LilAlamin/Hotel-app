@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 pt-32 pb-24">
        <div
            class="max-w-4xl w-full bg-neutral-900 rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row border border-neutral-800">
            {{-- Left Side: Visual --}}
            <div
                class="w-full md:w-1/2 bg-neutral-950 p-12 flex flex-col justify-center text-neutral-200 relative overflow-hidden">
                <div
                    class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=2070&auto=format&fit=crop')] opacity-20 bg-cover bg-center mix-blend-overlay">
                </div>
                <div class="relative z-10">
                    <h2 class="text-4xl font-extrabold mb-4 font-serif text-amber-400">Bergabung dengan Kolektif</h2>
                    <p class="text-neutral-400 text-lg mb-8 leading-relaxed">
                        Mulai inisiasi Anda dan buka akses ke alam lain. Pengalaman yang tak terbayangkan menanti.
                    </p>
                    <ul class="space-y-4 text-sm font-medium text-neutral-300">
                        <li class="flex items-center">
                            <div class="bg-neutral-800 p-2 rounded-lg mr-3 border border-neutral-700">
                                <i data-feather="star" class="w-4 h-4 text-amber-500"></i>
                            </div>
                            Akses Penawaran Tersembunyi
                        </li>
                        <li class="flex items-center">
                            <div class="bg-neutral-800 p-2 rounded-lg mr-3 border border-neutral-700">
                                <i data-feather="compass" class="w-4 h-4 text-amber-500"></i>
                            </div>
                            Jejak Perjalanan Abadi
                        </li>
                        <li class="flex items-center">
                            <div class="bg-neutral-800 p-2 rounded-lg mr-3 border border-neutral-700">
                                <i data-feather="shield" class="w-4 h-4 text-amber-500"></i>
                            </div>
                            Upeti yang Aman & Terjamin
                        </li>
                    </ul>
                </div>

                {{-- Decorative Elements --}}
                <div
                    class="absolute -bottom-24 -left-24 w-64 h-64 bg-amber-600/10 rounded-full mix-blend-screen filter blur-3xl">
                </div>
                <div
                    class="absolute -top-24 -right-24 w-64 h-64 bg-purple-900/20 rounded-full mix-blend-screen filter blur-3xl">
                </div>
            </div>

            {{-- Right Side: Form --}}
            <div class="w-full md:w-1/2 p-8 md:p-12 bg-neutral-900">
                <div class="text-center md:text-left mb-8">
                    <h3 class="text-2xl font-bold text-neutral-100 font-serif">Formulir Inisiasi</h3>
                    <p class="text-neutral-500 text-sm mt-2">Lengkapi data diri Anda untuk mendaftar.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-neutral-500 mb-2 uppercase tracking-wider">Nama
                            Lengkap</label>
                        <input type="text" name="name" required
                            class="block w-full px-4 py-3 border border-neutral-700 rounded-xl bg-neutral-800 text-neutral-100 placeholder-neutral-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition sm:text-sm"
                            placeholder="John Doe">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-neutral-500 mb-2 uppercase tracking-wider">Alamat
                            Email</label>
                        <input type="email" name="email" required
                            class="block w-full px-4 py-3 border border-neutral-700 rounded-xl bg-neutral-800 text-neutral-100 placeholder-neutral-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition sm:text-sm"
                            placeholder="nama@email.com">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-neutral-500 mb-2 uppercase tracking-wider">Kata
                            Sandi</label>
                        <input type="password" name="password" required
                            class="block w-full px-4 py-3 border border-neutral-700 rounded-xl bg-neutral-800 text-neutral-100 placeholder-neutral-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition sm:text-sm"
                            placeholder="••••••••">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-neutral-500 mb-2 uppercase tracking-wider">Konfirmasi
                            Kata Sandi</label>
                        <input type="password" name="password_confirmation" required
                            class="block w-full px-4 py-3 border border-neutral-700 rounded-xl bg-neutral-800 text-neutral-100 placeholder-neutral-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition sm:text-sm"
                            placeholder="••••••••">
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                            class="w-full flex justify-center py-4 px-4 border border-transparent rounded-full shadow-lg text-sm font-bold text-neutral-900 bg-amber-500 hover:bg-amber-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition transform hover:-translate-y-1 hover:shadow-amber-500/20">
                            Selesaikan Inisiasi
                        </button>
                    </div>
                </form>

                <div class="mt-8 pt-6 border-t border-neutral-800 text-center">
                    <p class="text-sm text-neutral-500">
                        Sudah memiliki identitas?
                        <a href="{{ route('login') }}" class="font-bold text-amber-500 hover:text-amber-400 transition">
                            Masuk di Sini
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
@endsection
