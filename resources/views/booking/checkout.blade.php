@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border-t-8 border-purple-600">
            <div class="p-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Ringkasan Pesanan</h2>

                <div class="space-y-4 mb-8 text-gray-700">
                    <div class="flex justify-between border-b pb-2">
                        <span>Hotel</span>
                        <span class="font-bold">{{ $hotel->name }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span>Tipe Kamar</span>
                        <span class="font-bold">{{ $roomType->name }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span>Check-in</span>
                        <span>{{ $checkIn }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span>Check-out</span>
                        <span>{{ $checkOut }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span>Durasi</span>
                        <span class="font-bold">{{ $nights }} Malam</span>
                    </div>
                    <div class="flex justify-between border-b pb-2 items-center">
                        <span>Harga per Malam</span>
                        <span>Rp {{ number_format($roomType->price, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="bg-purple-50 p-6 rounded-xl flex justify-between items-center mb-8">
                    <span class="text-xl font-bold text-purple-900">Total Pembayaran</span>
                    <span class="text-3xl font-extrabold text-purple-700">
                        Rp {{ number_format($totalPrice, 0, ',', '.') }}
                    </span>
                </div>

                <div class="flex gap-4">
                    <a href="{{ url()->previous() }}"
                        class="w-1/2 block text-center py-3 border border-gray-300 rounded-xl text-gray-600 font-bold hover:bg-gray-50">
                        Kembali
                    </a>
                    <form action="{{ route('booking.store') }}" method="POST" class="w-1/2">
                        @csrf
                        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                        <input type="hidden" name="room_type_id" value="{{ $roomType->id }}">
                        <input type="hidden" name="check_in" value="{{ $checkIn }}">
                        <input type="hidden" name="check_out" value="{{ $checkOut }}">
                        <input type="hidden" name="total_price" value="{{ $totalPrice }}">

                        <button type="submit"
                            class="w-full block text-center py-3 bg-green-500 text-white rounded-xl font-bold hover:bg-green-600 shadow-lg shadow-green-500/30">
                            Konfirmasi Bayar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
