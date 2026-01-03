<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Journeys - Weird Hotel</title>
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

    <main class="pt-32 pb-24 min-h-screen">
        <div class="container mx-auto px-6 lg:px-8 max-w-5xl">
            <h2 class="text-4xl font-extrabold text-amber-400 mb-10 font-serif border-b border-neutral-800 pb-6">
                Perjalanan
                Masa Lalu Anda</h2>

            @if (session('success'))
                <div class="bg-green-900/30 border border-green-500/50 text-green-400 p-6 rounded-xl mb-8 flex items-center"
                    role="alert">
                    <i data-feather="check-circle" class="w-6 h-6 mr-4"></i>
                    <p class="text-lg font-medium">{{ session('success') }}</p>
                </div>
            @endif

            @if ($bookings->isEmpty())
                <div class="text-center py-20 bg-neutral-900 rounded-3xl shadow-xl border border-neutral-800">
                    <i data-feather="compass" class="w-24 h-24 mx-auto text-neutral-700 mb-6"></i>
                    <p class="text-neutral-500 text-xl font-medium mb-8">Anda belum memulai perjalanan apa pun.</p>
                    <a href="{{ route('home') }}"
                        class="inline-block px-8 py-3 bg-amber-500 text-neutral-900 font-bold rounded-full hover:bg-amber-400 transition">Mulai
                        Petualangan Anda</a>
                </div>
            @else
                <div class="space-y-8">
                    @foreach ($bookings as $booking)
                        <div
                            class="bg-neutral-900 rounded-2xl shadow-xl overflow-hidden border border-neutral-800 hover:border-amber-500/50 transition duration-300 group">
                            <div class="md:flex">
                                <div class="md:w-1/3 relative overflow-hidden">
                                    <div
                                        class="absolute inset-0 bg-neutral-900/20 group-hover:bg-transparent transition duration-500 z-10">
                                    </div>
                                    <img src="{{ $booking->hotel->image ? asset('storage/' . $booking->hotel->image) : 'https://via.placeholder.com/400x250' }}"
                                        class="h-full w-full object-cover transform group-hover:scale-110 transition duration-700">
                                </div>
                                <div class="md:w-2/3 p-8">
                                    <div class="flex flex-col md:flex-row justify-between items-start mb-6">
                                        <div>
                                            <h3 class="text-2xl font-bold text-neutral-100 font-serif mb-1">
                                                {{ $booking->hotel->name }}</h3>
                                            <p class="text-neutral-500 text-sm flex items-center">
                                                <i data-feather="map-pin" class="w-3 h-3 mr-1"></i>
                                                {{ $booking->hotel->address }}
                                            </p>
                                        </div>
                                        <span
                                            class="mt-4 md:mt-0 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-green-900/30 text-green-400 border border-green-500/30">
                                            {{ $booking->status }}
                                        </span>
                                    </div>

                                    <div class="grid grid-cols-2 gap-y-4 gap-x-8 mb-6 text-sm">
                                        <div>
                                            <p class="text-neutral-500 uppercase text-xs font-bold tracking-wide mb-1">
                                                Kedatangan</p>
                                            <p class="text-neutral-200 font-medium">
                                                {{ \Carbon\Carbon::parse($booking->check_in)->translatedFormat('d F Y') }}
                                            </p>
                                        </div>
                                        <div>
                                            <p class="text-neutral-500 uppercase text-xs font-bold tracking-wide mb-1">
                                                Keberangkatan</p>
                                            <p class="text-neutral-200 font-medium">
                                                {{ \Carbon\Carbon::parse($booking->check_out)->translatedFormat('d F Y') }}
                                            </p>
                                        </div>
                                        <div>
                                            <p class="text-neutral-500 uppercase text-xs font-bold tracking-wide mb-1">
                                                Tempat Perlindungan</p>
                                            <p class="text-neutral-200 font-medium">{{ $booking->roomType->name }}</p>
                                        </div>
                                        <div>
                                            <p class="text-neutral-500 uppercase text-xs font-bold tracking-wide mb-1">
                                                Upeti</p>
                                            <p class="text-amber-400 font-bold text-lg">Rp
                                                {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                                        </div>
                                    </div>

                                    <div class="border-t border-neutral-800 pt-6 flex justify-between items-center">
                                        <span class="text-xs text-neutral-600">Dipesan pada
                                            {{ $booking->created_at->translatedFormat('d F Y') }}</span>
                                        <a href="{{ route('booking.show', $booking->id) }}"
                                            class="inline-block px-6 py-2 border border-neutral-600 text-neutral-300 text-sm font-bold rounded-full hover:bg-neutral-800 hover:text-white hover:border-neutral-500 transition">
                                            Lihat Manifes
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
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
