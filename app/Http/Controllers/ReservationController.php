<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('reservations.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'party_size' => 'required|integer|min:1',
            'reservation_time' => 'required|date|after:now',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Reservation::create($request->all());

        return redirect()->route('reservations.index')->with('success', 'Reservation booked successfully!');
    }

    public function cancel($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['status' => 'cancelled']);
        return redirect()->route('reservations.index')->with('success', 'Reservation cancelled successfully!');
    }

    public function reschedule(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'reservation_time' => 'required|date|after:now',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $reservation = Reservation::findOrFail($id);
        $reservation->update([
            'reservation_time' => $request->reservation_time,
            'status' => 'confirmed',
        ]);

        return redirect()->route('reservations.index')->with('success', 'Reservation rescheduled successfully!');
    }
}