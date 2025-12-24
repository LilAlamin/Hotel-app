@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border-t-8 border-purple-600">
            <div class="px-8 py-6 bg-purple-50 flex justify-between items-center border-b border-purple-100">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Invoice Pemesanan</h2>
                    <p class="text-purple-600 font-medium">ID: #{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</p>
                </div>
                <span class="px-4 py-2 rounded-full text-sm font-bold uppercase bg-green-500 text-white shadow-md">
                    {{ $booking->status }}
                </span>
            </div>

            <div class="p-8">
                {{-- Bagian Info Pemesan (Diminta User) --}}
                <div class="mb-8 border-b pb-6">
                    <h3 class="text-gray-500 uppercase tracking-wide text-xs font-bold mb-3">Informasi Pemesan</h3>
                    <div class="flex items-center">
                        <div class="bg-purple-100 p-3 rounded-full mr-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-lg font-bold text-gray-900">{{ $booking->user->name }}</p>
                            <p class="text-gray-500 text-sm">{{ $booking->user->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-gray-500 uppercase tracking-wide text-xs font-bold mb-3">Detail Hotel</h3>
                    <div class="flex gap-4">
                        <img src="{{ $booking->hotel->image ? asset('storage/' . $booking->hotel->image) : 'https://via.placeholder.com/150' }}"
                            class="w-24 h-24 rounded-lg object-cover shadow-sm">
                        <div>
                            <h4 class="text-xl font-bold text-gray-800">{{ $booking->hotel->name }}</h4>
                            <p class="text-gray-600">{{ $booking->hotel->address }}</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6 mb-8 bg-gray-50 p-6 rounded-xl border border-gray-100">
                    <div>
                        <p class="text-gray-500 text-sm">Check-in</p>
                        <p class="font-bold text-gray-800 text-lg">
                            {{ \Carbon\Carbon::parse($booking->check_in)->translatedFormat('d F Y') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Check-out</p>
                        <p class="font-bold text-gray-800 text-lg">
                            {{ \Carbon\Carbon::parse($booking->check_out)->translatedFormat('d F Y') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Tipe Kamar</p>
                        <p class="font-bold text-gray-800">{{ $booking->roomType->name }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Durasi</p>
                        <p class="font-bold text-gray-800">
                            {{ \Carbon\Carbon::parse($booking->check_in)->diffInDays(\Carbon\Carbon::parse($booking->check_out)) }}
                            Malam</p>
                    </div>
                </div>

                <div class="flex justify-between items-center pt-4 border-t border-gray-200">
                    <span class="text-xl font-bold text-gray-800">Total Harga</span>
                    <span class="text-3xl font-extrabold text-purple-700">Rp
                        {{ number_format($booking->total_price, 0, ',', '.') }}</span>
                </div>
            </div>

            <div class="px-8 py-6 bg-gray-50 flex justify-end space-x-4 border-t border-gray-100">
                <a href="{{ route('booking.history') }}"
                    class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 font-bold hover:bg-white transition">
                    Kembali
                </a>
                <button onclick="window.print()"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg font-bold hover:bg-blue-700 transition shadow-lg">
                    Cetak Invoice
                </button>
            </div>
        </div>
    </div>
@endsection
