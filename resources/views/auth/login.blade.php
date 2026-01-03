@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 pt-32 pb-24">
        <div
            class="max-w-4xl w-full bg-neutral-900 rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row border border-neutral-800">
            {{-- Left Side: Visual --}}
            <div
                class="w-full md:w-1/2 bg-neutral-950 p-12 flex flex-col justify-center text-neutral-200 relative overflow-hidden">
                <div
                    class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1590490360182-c87295ecc059?q=80&w=2070&auto=format&fit=crop')] opacity-20 bg-cover bg-center mix-blend-overlay">
                </div>
                <div class="relative z-10">
                    <h2 class="text-4xl font-extrabold mb-4 font-serif text-amber-400">Selamat Datang Kembali</h2>
                    <p class="text-neutral-400 text-lg mb-8 leading-relaxed">
                        Masuk untuk melanjutkan perjalanan surealis Anda. Tempat perlindungan menanti kedatangan Anda
                        kembali.
                    </p>
                    <div
                        class="flex items-center space-x-3 text-sm bg-neutral-900/50 w-fit px-5 py-3 rounded-xl backdrop-blur-md border border-neutral-700">
                        <i data-feather="key" class="w-5 h-5 text-amber-500"></i>
                        <span class="font-mono tracking-wide text-neutral-300">Akses Gerbang Utama</span>
                    </div>
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
                    <h3 class="text-2xl font-bold text-neutral-100 font-serif">Identifikasi Diri</h3>
                    <p class="text-neutral-500 text-sm mt-2">Silakan masukkan kredensial Anda untuk masuk.</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-neutral-500 mb-2 uppercase tracking-wider">Alamat
                            Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-feather="mail" class="w-5 h-5 text-neutral-600"></i>
                            </div>
                            <input type="email" name="email" required
                                class="block w-full pl-10 pr-3 py-3 border border-neutral-700 rounded-xl leading-5 bg-neutral-800 text-neutral-100 placeholder-neutral-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition sm:text-sm"
                                placeholder="nama@email.com">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-neutral-500 mb-2 uppercase tracking-wider">Kata
                            Sandi</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-feather="lock" class="w-5 h-5 text-neutral-600"></i>
                            </div>
                            <input type="password" name="password" required
                                class="block w-full pl-10 pr-3 py-3 border border-neutral-700 rounded-xl leading-5 bg-neutral-800 text-neutral-100 placeholder-neutral-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition sm:text-sm"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="h-4 w-4 text-amber-500 focus:ring-amber-500 border-neutral-700 rounded bg-neutral-800">
                            <label for="remember_me" class="ml-2 block text-sm text-neutral-400">
                                Ingat Saya
                            </label>
                        </div>

                        <div class="text-sm">
                            <a href="#" class="font-medium text-amber-500 hover:text-amber-400 transition">
                                Lupa Kata Sandi?
                            </a>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full flex justify-center py-4 px-4 border border-transparent rounded-full shadow-lg text-sm font-bold text-neutral-900 bg-amber-500 hover:bg-amber-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition transform hover:-translate-y-1 hover:shadow-amber-500/20">
                        Masuk ke Dalam
                    </button>
                </form>

                <div class="mt-8 pt-6 border-t border-neutral-800 text-center">
                    <p class="text-sm text-neutral-500">
                        Belum menjadi bagian dari kami?
                        <a href="{{ route('register') }}" class="font-bold text-amber-500 hover:text-amber-400 transition">
                            Bergabung Sekarang
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
