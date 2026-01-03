<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $hotel->name }} - Weird Hotel</title>
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
    @include('layouts.navbar')

    <main class="pt-32 pb-24">
        <div class="container mx-auto px-6 lg:px-8">
            <div
                class="max-w-6xl mx-auto bg-neutral-900 rounded-3xl shadow-2xl overflow-hidden border border-neutral-800">
                <div class="grid md:grid-cols-2">
                    <div class="relative h-96 md:h-auto">
                        <img src="{{ $hotel->image ? asset('storage/' . $hotel->image) : 'https://via.placeholder.com/600x800' }}"
                            class="absolute inset-0 w-full h-full object-cover">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-neutral-900 via-transparent to-transparent opacity-80 md:hidden">
                        </div>
                    </div>

                    <div class="p-10 bg-neutral-900 relative">
                        <div class="mb-8">
                            <h1
                                class="text-4xl md:text-5xl font-extrabold text-amber-400 mb-4 font-serif leading-tight">
                                {{ $hotel->name }}</h1>
                            <p class="text-neutral-400 text-lg flex items-center mb-3">
                                <i data-feather="map-pin" class="w-5 h-5 mr-2 text-amber-500"></i>
                                {{ $hotel->address }}
                            </p>
                            <p class="text-neutral-500 flex items-center text-sm font-bold uppercase tracking-wider">
                                <i data-feather="grid" class="w-4 h-4 mr-2 text-neutral-600"></i>
                                {{ $hotel->roomTypes->count() }} Tipe Kamar Tersedia
                            </p>
                        </div>

                        <form action="{{ route('checkout.process') }}" method="POST">
                            @csrf
                            <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

                            <div class="grid grid-cols-2 gap-6 mb-8">
                                <div>
                                    <label
                                        class="block text-sm font-bold text-neutral-400 mb-2 uppercase tracking-wide">Check-in</label>
                                    <input type="date" name="check_in" required
                                        class="w-full bg-neutral-800 text-neutral-100 px-4 py-3 rounded-xl border border-neutral-700 focus:ring-2 focus:ring-amber-500 focus:outline-none focus:border-transparent transition">
                                </div>

                                <div>
                                    <label
                                        class="block text-sm font-bold text-neutral-400 mb-2 uppercase tracking-wide">Check-out</label>
                                    <input type="date" name="check_out" required
                                        class="w-full bg-neutral-800 text-neutral-100 px-4 py-3 rounded-xl border border-neutral-700 focus:ring-2 focus:ring-amber-500 focus:outline-none focus:border-transparent transition">
                                </div>
                            </div>

                            <div class="mb-10">
                                <label
                                    class="block text-sm font-bold text-neutral-400 mb-4 uppercase tracking-wide">Pilih
                                    Tempat Perlindungan Anda</label>
                                <div class="space-y-4">
                                    @foreach ($hotel->roomTypes as $room)
                                        @if ($room->total_rooms > 0)
                                            <label
                                                class="flex items-center p-5 border rounded-2xl cursor-pointer hover:bg-neutral-800 transition border-neutral-700 has-[:checked]:border-amber-500 has-[:checked]:bg-neutral-800/50 has-[:checked]:ring-1 has-[:checked]:ring-amber-500 group">
                                                <input type="radio" name="room_type_id" value="{{ $room->id }}"
                                                    required
                                                    class="h-5 w-5 text-amber-500 border-neutral-600 focus:ring-amber-500 bg-neutral-800">
                                                <div class="ml-4 w-full flex justify-between items-center">
                                                    <span
                                                        class="font-medium text-lg text-neutral-200 group-hover:text-amber-400 transition">{{ $room->name }}</span>
                                                    <span class="text-amber-400 font-bold text-lg">Rp
                                                        {{ number_format($room->price, 0, ',', '.') }}<span
                                                            class="text-sm text-neutral-500 font-normal">/malam</span></span>
                                                </div>
                                            </label>
                                        @else
                                            <div
                                                class="flex items-center p-5 border rounded-2xl border-neutral-800 bg-neutral-900/50 opacity-60 cursor-not-allowed relative overflow-hidden">
                                                <div
                                                    class="absolute inset-0 bg-neutral-950/20 backdrop-blur-[1px] z-10 flex items-center justify-center">
                                                    <span
                                                        class="bg-red-900/80 text-red-200 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest border border-red-500/30 shadow-lg transform -rotate-2">Habis
                                                        Terjual</span>
                                                </div>
                                                <input type="radio" disabled
                                                    class="h-5 w-5 text-neutral-600 border-neutral-700 bg-neutral-800 cursor-not-allowed">
                                                <div class="ml-4 w-full flex justify-between items-center blur-[1px]">
                                                    <span
                                                        class="font-medium text-lg text-neutral-500">{{ $room->name }}</span>
                                                    <span class="text-neutral-600 font-bold text-lg">Rp
                                                        {{ number_format($room->price, 0, ',', '.') }}<span
                                                            class="text-sm text-neutral-700 font-normal">/malam</span></span>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full bg-amber-500 text-neutral-900 font-bold text-xl py-5 rounded-full shadow-lg hover:bg-amber-400 transition transform hover:-translate-y-1 hover:shadow-amber-500/20">
                                Lanjutkan ke Ritual (Checkout) ➝
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
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
