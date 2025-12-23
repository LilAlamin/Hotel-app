@extends('layouts.app')

@section('content')
<div class="text-center mb-12">
    <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 mb-4">
        Temukan Penginapan Impianmu
    </h1>
    <p class="text-gray-600 text-lg">Pilih hotel terbaik untuk liburan yang tak terlupakan.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    @foreach($hotels as $hotel)
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:scale-105 transition duration-300 ease-in-out transform border border-gray-100">
        <img src="{{ $hotel->image ? asset('storage/'.$hotel->image) : 'https://via.placeholder.com/400x250?text=Hotel+Image' }}" 
             alt="{{ $hotel->name }}" class="w-full h-48 object-cover">
        
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $hotel->name }}</h2>
            <p class="text-gray-500 mb-4 flex items-center">
                <svg class="w-4 h-4 mr-1 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"/></svg>
                {{ Str::limit($hotel->address, 40) }}
            </p>
            <a href="{{ route('hotels.show', $hotel->id) }}" class="block w-full text-center bg-blue-600 text-white font-bold py-3 rounded-xl hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">
                Lihat Detail & Pesan
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection