@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Book a Table</h1>
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('reservations.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full border p-2 rounded">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full border p-2 rounded">
        </div>
        <div class="mb-4">
            <label for="party_size" class="block text-sm font-medium">Party Size</label>
            <input type="number" name="party_size" id="party_size" value="{{ old('party_size') }}" class="w-full border p-2 rounded" min="1">
        </div>
        <div class="mb-4">
            <label for="reservation_time" class="block text-sm font-medium">Reservation Time</label>
            <input type="datetime-local" name="reservation_time" id="reservation_time" value="{{ old('reservation_time') }}" class="w-full border p-2 rounded">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Book Now</button>
    </form>
@endsection