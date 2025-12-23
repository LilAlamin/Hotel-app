<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FrontController extends Controller
{
    // Menampilkan Katalog
    public function index()
    {
        $hotels = Hotel::all();
        return view('home', compact('hotels'));
    }

    // Menampilkan Detail Hotel & Form Booking
    public function show($id)
    {
        $hotel = Hotel::with('roomTypes')->findOrFail($id);
        return view('hotels.show', compact('hotel'));
    }

    // Kalkulasi Checkout
    public function checkout(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required',
            'room_type_id' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        $hotel = Hotel::findOrFail($request->hotel_id);
        $roomType = RoomType::findOrFail($request->room_type_id);
        
        $checkIn = Carbon::parse($request->check_in);
        $checkOut = Carbon::parse($request->check_out);
        $nights = $checkIn->diffInDays($checkOut);
        
        // Kalkulasi Harga: (Harga Kamar * Malam)
        $totalPrice = $roomType->price * $nights;

        return view('booking.checkout', compact('hotel', 'roomType', 'checkIn', 'checkOut', 'nights', 'totalPrice'));
    }

    // Simpan Booking
    public function storeBooking(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required',
            'room_type_id' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'total_price' => 'required|numeric',
        ]);

        \App\Models\Booking::create([
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
            'hotel_id' => $request->hotel_id,
            'room_type_id' => $request->room_type_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_price' => $request->total_price,
            'status' => 'success', // Langsung sukses sebagai simulasi
        ]);

        return redirect()->route('booking.history')->with('success', 'Pemesanan Berhasil!');
    }

    // Halaman Riwayat Booking
    public function history()
    {
        $bookings = \App\Models\Booking::with(['hotel', 'roomType'])
            ->where('user_id', \Illuminate\Support\Facades\Auth::id())
            ->latest()
            ->get();

        return view('bookings.history', compact('bookings'));
    }
}