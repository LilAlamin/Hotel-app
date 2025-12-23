@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 border-b pb-4">Riwayat Pesanan Saya</h2>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if ($bookings->isEmpty())
            <div class="text-center py-12 bg-white rounded-xl shadow-sm">
                <p class="text-gray-500 text-lg">Belum ada riwayat pesanan.</p>
                <a href="{{ route('home') }}" class="inline-block mt-4 text-purple-600 font-bold hover:underline">Cari Hotel
                    Sekarang</a>
            </div>
        @else
            <div class="space-y-6">
                @foreach ($bookings as $booking)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                        <div class="md:flex">
                            <div class="md:w-1/3">
                                <img src="{{ $booking->hotel->image ? asset('storage/' . $booking->hotel->image) : 'https://via.placeholder.com/400x250' }}"
                                    class="h-full w-full object-cover">
                            </div>
                            <div class="md:w-2/3 p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-800">{{ $booking->hotel->name }}</h3>
                                        <p class="text-gray-500 text-sm">{{ $booking->hotel->address }}</p>
                                    </div>
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-bold uppercase bg-green-100 text-green-800">
                                        {{ $booking->status }}
                                    </span>
                                </div>

                                <div class="grid grid-cols-2 gap-4 mb-4 text-sm text-gray-600">
                                    <div>
                                        <p class="font-bold">Check-in</p>
                                        <p>{{ \Carbon\Carbon::parse($booking->check_in)->translatedFormat('d F Y') }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Check-out</p>
                                        <p>{{ \Carbon\Carbon::parse($booking->check_out)->translatedFormat('d F Y') }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Tipe Kamar</p>
                                        <p>{{ $booking->roomType->name }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Total Harga</p>
                                        <p class="text-purple-600 font-bold">Rp
                                            {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                                    </div>
                                </div>

                                <div class="border-t pt-4 text-right">
                                    <span class="text-xs text-gray-400">Dipesan pada
                                        {{ $booking->created_at->translatedFormat('d F Y H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
