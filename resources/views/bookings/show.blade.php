<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journey Manifest #{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }} - Weird Hotel</title>
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

        @media print {
            body {
                background-color: white;
                color: black;
            }

            .no-print {
                display: none;
            }

            .print-border {
                border: 1px solid #ccc;
            }
        }
    </style>
</head>

<body class="antialiased">
    <div class="no-print">
        @include('layouts.navbar')
    </div>

    <main class="pt-32 pb-24 min-h-screen flex items-center justify-center p-4">
        <div class="max-w-3xl w-full mx-auto">
            <div
                class="bg-neutral-900 rounded-3xl shadow-2xl overflow-hidden border border-neutral-800 relative print-border">
                {{-- Decorative Top Border --}}
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-amber-600 to-purple-600"></div>

                <div
                    class="px-8 py-8 md:px-12 md:py-10 border-b border-neutral-800 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <h2 class="text-3xl font-extrabold text-amber-400 font-serif mb-1">Manifes Perjalanan</h2>
                        <p class="text-neutral-500 font-mono text-sm tracking-widest">ID:
                            #{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</p>
                    </div>
                    <span
                        class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-wider bg-green-900/30 text-green-400 border border-green-500/30">
                        {{ $booking->status }}
                    </span>
                </div>

                <div class="p-8 md:p-12">
                    {{-- Guest Info --}}
                    <div class="mb-10 relative">
                        <div class="absolute left-0 top-0 bottom-0 w-0.5 bg-neutral-800"></div>
                        <div class="pl-6">
                            <h3 class="text-neutral-500 uppercase tracking-widest text-xs font-bold mb-4">Identitas
                                Pelancong
                            </h3>
                            <div class="flex items-center">
                                <div
                                    class="w-12 h-12 rounded-full bg-neutral-800 flex items-center justify-center mr-4 border border-neutral-700">
                                    <i data-feather="user" class="text-amber-500 w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="text-xl font-bold text-neutral-200">{{ $booking->user->name }}</p>
                                    <p class="text-neutral-500 text-sm">{{ $booking->user->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Hotel Details --}}
                    <div class="mb-10 relative">
                        <div class="absolute left-0 top-0 bottom-0 w-0.5 bg-neutral-800"></div>
                        <div class="pl-6">
                            <h3 class="text-neutral-500 uppercase tracking-widest text-xs font-bold mb-4">Tempat
                                Perlindungan
                                Tujuan</h3>
                            <div class="flex gap-6 items-start">
                                <img src="{{ $booking->hotel->image ? asset('storage/' . $booking->hotel->image) : 'https://via.placeholder.com/150' }}"
                                    class="w-24 h-24 rounded-xl object-cover shadow-lg border border-neutral-700">
                                <div>
                                    <h4 class="text-2xl font-bold text-white font-serif mb-1">
                                        {{ $booking->hotel->name }}</h4>
                                    <p class="text-neutral-400 text-sm flex items-center">
                                        <i data-feather="map-pin" class="w-3 h-3 mr-1 text-amber-500"></i>
                                        {{ $booking->hotel->address }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Booking Grid --}}
                    <div
                        class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10 bg-neutral-950/50 p-6 rounded-2xl border border-neutral-800/50">
                        <div class="space-y-1">
                            <p class="text-neutral-500 text-xs uppercase font-bold tracking-wide">Check-in</p>
                            <p class="font-bold text-neutral-200 text-lg font-serif">
                                {{ \Carbon\Carbon::parse($booking->check_in)->translatedFormat('d F Y') }}
                            </p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-neutral-500 text-xs uppercase font-bold tracking-wide">Check-out</p>
                            <p class="font-bold text-neutral-200 text-lg font-serif">
                                {{ \Carbon\Carbon::parse($booking->check_out)->translatedFormat('d F Y') }}
                            </p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-neutral-500 text-xs uppercase font-bold tracking-wide">Tipe Tempat
                                Perlindungan</p>
                            <p class="font-bold text-neutral-200">{{ $booking->roomType->name }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-neutral-500 text-xs uppercase font-bold tracking-wide">Durasi</p>
                            <p class="font-bold text-neutral-200">
                                {{ \Carbon\Carbon::parse($booking->check_in)->diffInDays(\Carbon\Carbon::parse($booking->check_out)) }}
                                Malam
                            </p>
                        </div>
                    </div>

                    {{-- Total Price --}}
                    <div class="flex justify-between items-center pt-8 border-t border-neutral-800">
                        <span class="text-xl font-bold text-neutral-300">Total Upeti</span>
                        <span
                            class="text-4xl font-extrabold text-amber-400 font-serif shadow-amber-500/10 drop-shadow-lg">Rp
                            {{ number_format($booking->total_price, 0, ',', '.') }}</span>
                    </div>
                </div>

                {{-- Action Functions --}}
                <div
                    class="px-8 py-6 bg-neutral-950 border-t border-neutral-800 flex flex-col md:flex-row justify-between items-center gap-4 no-print">
                    <p class="text-neutral-600 text-sm">Terima kasih telah memilih jalan yang tidak konvensional.</p>
                    <div class="flex gap-4 w-full md:w-auto">
                        <a href="{{ route('booking.history') }}"
                            class="flex-1 md:flex-none px-6 py-3 border border-neutral-700 rounded-full text-neutral-400 font-bold hover:bg-neutral-800 hover:text-white transition text-center text-sm">
                            Kembali ke Riwayat
                        </a>
                        <button onclick="window.print()"
                            class="flex-1 md:flex-none px-6 py-3 bg-amber-500 text-neutral-900 rounded-full font-bold hover:bg-amber-400 transition shadow-lg shadow-amber-500/20 text-sm flex items-center justify-center gap-2">
                            <i data-feather="printer" class="w-4 h-4"></i> Cetak Manifes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        feather.replace();
    </script>
</body>

</html>
