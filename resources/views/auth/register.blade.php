@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center py-10">
    <div class="w-full max-w-md bg-white p-8 rounded-3xl shadow-2xl border-t-8 border-yellow-400">
        <h2 class="text-3xl font-bold text-center text-blue-900 mb-6">Daftar Akun Baru</h2>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nama Lengkap</label>
                <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-yellow-500 focus:ring focus:ring-yellow-200 transition">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-yellow-500 focus:ring focus:ring-yellow-200 transition">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-yellow-500 focus:ring focus:ring-yellow-200 transition">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-yellow-500 focus:ring focus:ring-yellow-200 transition">
            </div>

            <button class="w-full bg-yellow-400 text-blue-900 font-bold py-3 rounded-xl hover:bg-yellow-300 transition shadow-lg transform hover:-translate-y-1">
                Daftar Sekarang
            </button>
        </form>
        <p class="text-center mt-4 text-gray-500">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 font-bold">Login</a></p>
    </div>
</div>
@endsection