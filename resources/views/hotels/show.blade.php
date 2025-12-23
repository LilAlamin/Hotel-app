@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden">
    <div class="md:flex">
        <div class="md:w-1/2">
            <img src="{{ $hotel->image ? asset('storage/'.$hotel->image) : 'https://via.placeholder.com/600x800' }}" 
                 class="h-full w-full object-cover">
        </div>

        <div class="md:w-1/2 p-8 bg-gray-50">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ $hotel->name }}</h2>
            <p class="text-gray-500 mb-6">{{ $hotel->address }}</p>

            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

                <div class="mb-6 space-y-3">
                    <label class="block text-sm font-bold text-gray-700">Tanggal Check-in</label>
                    <input type="date" name="check_in" required class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:outline-none">
                    
                    <label class="block text-sm font-bold text-gray-700">Tanggal Check-out</label>
                    <input type="date" name="check_out" required class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:outline-none">
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Pilih Tipe Kamar</label>
                    <div class="space-y-3">
                        @foreach($hotel->roomTypes as $room)
                        <label class="flex items-center p-4 border rounded-xl cursor-pointer hover:bg-blue-50 transition border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:bg-blue-50 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                            <input type="radio" name="room_type_id" value="{{ $room->id }}" required class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                            <div class="ml-3 w-full flex justify-between">
                                <span class="font-medium text-gray-900">{{ $room->name }}</span>
                                <span class="text-green-600 font-bold">Rp {{ number_format($room->price, 0, ',', '.') }}/malam</span>
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold py-4 rounded-xl shadow-lg hover:opacity-90 transition transform hover:-translate-y-1">
                    Lanjut ke Pembayaran ➝
                </button>
            </form>
        </div>
    </div>
</div>
@endsection