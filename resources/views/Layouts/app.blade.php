<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HotelApp - Booking Seru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen">
    <nav class="bg-gradient-to-r from-blue-600 to-purple-600 shadow-lg text-white">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-bold tracking-wide">🏨 HotelApp</a>
            <div class="flex items-center space-x-4">
                @auth
                    <a href="{{ route('booking.history') }}" class="hover:text-yellow-300 font-semibold mr-4">Riwayat
                        Pesanan</a>
                    <span>Halo, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="bg-white text-purple-600 px-4 py-2 rounded-full font-bold hover:bg-gray-100 transition">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-gray-200">Login</a>
                    <a href="{{ route('register') }}"
                        class="bg-yellow-400 text-blue-900 px-4 py-2 rounded-full font-bold hover:bg-yellow-300 transition">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="flex-grow container mx-auto px-6 py-8">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white text-center py-6">
        <p>&copy; {{ date('Y') }} HotelApp. Liburan Nyaman.</p>
    </footer>
</body>

</html>
