@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center h-[70vh]">
    <div class="w-full max-w-md bg-white p-8 rounded-3xl shadow-2xl">
        <h2 class="text-3xl font-bold text-center text-purple-700 mb-6">Login HotelApp</h2>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" name="email" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 transition">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Password</label>
                <input type="password" name="password" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 transition">
            </div>
            <button class="w-full bg-purple-600 text-white font-bold py-3 rounded-xl hover:bg-purple-700 transition shadow-lg">
                Masuk Sekarang
            </button>
        </form>
        <p class="text-center mt-4 text-gray-500">Belum punya akun? <a href="{{ route('register') }}" class="text-purple-600 font-bold">Daftar</a></p>
    </div>
</div>
@endsection