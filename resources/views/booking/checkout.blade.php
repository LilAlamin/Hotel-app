<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Weird Hotel</title>
    <link rel="icon" type="image/x-icon" href="http://static.photos/minimal/200x200/50">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <style>
        body {
            background-color: #0a0a0a;
            color: #e0e0e0;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    @include('layouts.navbar')

    <main class="pt-32 pb-24 min-h-screen flex items-center justify-center">
        <div class="container mx-auto px-6 lg:px-8">
            <div class="max-w-3xl mx-auto">
                {{-- Steps Indicator (Visual Only) --}}
                <div class="flex justify-center mb-12">
                    <div class="flex items-center space-x-4">
                        <div
                            class="w-10 h-10 rounded-full bg-amber-500 text-neutral-900 flex items-center justify-center font-bold">
                            1</div>
                        <div class="w-16 h-1 bg-amber-500 rounded-full"></div>
                        <div
                            class="w-10 h-10 rounded-full bg-amber-500 text-neutral-900 flex items-center justify-center font-bold ring-4 ring-amber-500/30">
                            2</div> <!-- Current Step -->
                        <div class="w-16 h-1 bg-neutral-800 rounded-full"></div>
                        <div
                            class="w-10 h-10 rounded-full bg-neutral-800 text-neutral-500 flex items-center justify-center font-bold">
                            3</div>
                    </div>
                </div>

                <div class="bg-neutral-900 rounded-3xl shadow-2xl overflow-hidden border border-neutral-800 relative">
                    {{-- Decorative Top Border --}}
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-amber-600 to-purple-600"></div>

                    <div class="p-10 md:p-14">
                        <h2 class="text-4xl font-extrabold text-center text-amber-400 mb-2 font-serif">Konfirmasi
                            Penginapan Anda
                        </h2>
                        <p class="text-center text-neutral-400 mb-10">Tinjau ulang detail perjalanan Anda sebelum
                            melintasi
                            ambang batas.</p>

                        <div class="space-y-6 mb-10 text-lg">
                            <div class="flex justify-between border-b border-neutral-800 pb-4">
                                <span class="text-neutral-400">Destinasi</span>
                                <span class="font-bold text-neutral-200">{{ $hotel->name }}</span>
                            </div>
                            <div class="flex justify-between border-b border-neutral-800 pb-4">
                                <span class="text-neutral-400">Tipe Tempat Perlindungan</span>
                                <span class="font-bold text-neutral-200">{{ $roomType->name }}</span>
                            </div>
                            <div class="flex justify-between border-b border-neutral-800 pb-4">
                                <span class="text-neutral-400">Kedatangan</span>
                                <span
                                    class="font-bold text-neutral-200">{{ \Carbon\Carbon::parse($checkIn)->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="flex justify-between border-b border-neutral-800 pb-4">
                                <span class="text-neutral-400">Keberangkatan</span>
                                <span
                                    class="font-bold text-neutral-200">{{ \Carbon\Carbon::parse($checkOut)->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="flex justify-between border-b border-neutral-800 pb-4">
                                <span class="text-neutral-400">Durasi</span>
                                <span class="font-bold text-neutral-200">{{ $nights }} Malam</span>
                            </div>
                            <div class="flex justify-between border-b border-neutral-800 pb-4 items-center">
                                <span class="text-neutral-400">Harga per Malam</span>
                                <span class="font-medium text-neutral-300">Rp
                                    {{ number_format($roomType->price, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <div
                            class="bg-neutral-950 p-8 rounded-2xl flex flex-col md:flex-row justify-between items-center mb-10 border border-neutral-800 shadow-inner">
                            <span class="text-xl font-bold text-neutral-400 mb-2 md:mb-0">Total Biaya Ritual</span>
                            <span class="text-4xl font-extrabold text-amber-400">
                                Rp {{ number_format($totalPrice, 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="flex flex-col-reverse md:flex-row gap-6">
                            <a href="{{ url()->previous() }}"
                                class="w-full md:w-1/2 block text-center py-4 border border-neutral-600 rounded-full text-neutral-400 font-bold hover:bg-neutral-800 hover:text-white transition">
                                Kembali
                            </a>
                            <form action="{{ route('booking.store') }}" method="POST" class="w-full md:w-1/2">
                                @csrf
                                <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                                <input type="hidden" name="room_type_id" value="{{ $roomType->id }}">
                                <input type="hidden" name="check_in" value="{{ $checkIn }}">
                                <input type="hidden" name="check_out" value="{{ $checkOut }}">
                                <input type="hidden" name="total_price" value="{{ $totalPrice }}">

                                <button type="submit"
                                    class="w-full block text-center py-4 bg-amber-500 text-neutral-900 rounded-full font-bold hover:bg-amber-400 shadow-xl shadow-amber-500/20 transition transform hover:-translate-y-1 text-lg">
                                    Segel Kesepakatan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-neutral-950 py-16 text-neutral-400 text-center border-t border-neutral-900">
        <div class="container mx-auto px-6 lg:px-8">
            <p class="text-lg">&copy; {{ date('Y') }} Weird Hotel. All rights reserved.</p>
        </div>
    </footer>

    <script>
        feather.replace();
    </script>
</body>

</html>
