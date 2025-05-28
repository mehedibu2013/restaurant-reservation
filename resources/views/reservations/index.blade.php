@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Reservations</h1>
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('reservations.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Book a Table</a>
    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Name</th>
                <th class="p-2">Email</th>
                <th class="p-2">Party Size</th>
                <th class="p-2">Reservation Time</th>
                <th class="p-2">Status</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td class="p-2">{{ $reservation->name }}</td>
                    <td class="p-2">{{ $reservation->email }}</td>
                    <td class="p-2">{{ $reservation->party_size }}</td>
                    <td class="p-2">{{ $reservation->reservation_time }}</td>
                    <td class="p-2">{{ $reservation->status }}</td>
                    <td class="p-2">
                        @if ($reservation->status == 'confirmed')
                            <form action="{{ route('reservations.cancel', $reservation->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-red-500">Cancel</button>
                            </form>
                            <form action="{{ route('reservations.reschedule', $reservation->id) }}" method="POST" class="inline">
                                @csrf
                                <input type="datetime-local" name="reservation_time" required class="border p-1">
                                <button type="submit" class="text-blue-500">Reschedule</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection