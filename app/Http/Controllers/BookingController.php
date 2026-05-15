<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Field;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Tampilkan semua booking
     */
    public function index()
    {
        $bookings = Booking::with('field', 'user')->get();
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Form booking
     */
    public function create()
    {
        $fields = Field::all();
        return view('bookings.create', compact('fields'));
    }

    /**
     * Simpan booking + CEK BENTROK
     */
    public function store(Request $request)
    {
        // VALIDASI INPUT
        $request->validate([
            'field_id' => 'required',
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        // CEK BENTROK JADWAL
        $bentrok = Booking::where('field_id', $request->field_id)
            ->where('tanggal', $request->tanggal)
            ->where(function ($query) use ($request) {
                $query->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai])
                      ->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai]);
            })
            ->exists();

        if ($bentrok) {
            return back()->with('error', '❌ Jadwal sudah dibooking pada jam tersebut!');
        }

        // SIMPAN BOOKING
        Booking::create([
            'user_id' => Auth::id(),
            'field_id' => $request->field_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => 'pending',
        ]);

        return back()->with('success', '✅ Booking berhasil!');
    }

    /**
     * Hapus booking
     */
    public function destroy($id)
    {
        Booking::destroy($id);
        return back()->with('success', 'Booking dihapus');
    }
    public function apiIndex()
{
    return response()->json([
        'status' => 'success',
        'data' => \App\Models\Booking::with('field')->get()
    ]);
}

public function apiStore(Request $request)
{
    $booking = \App\Models\Booking::create([
        'field_id' => $request->field_id,
        'nama' => $request->nama,
        'tanggal' => $request->tanggal
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'Booking berhasil',
        'data' => $booking
    ]);
}
}