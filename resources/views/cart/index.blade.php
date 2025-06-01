@extends('partials.main')

@section('title', 'Keranjang')

@section('content')

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
        {{ session('error') }}
    </div>
@endif

<div class="max-w-5xl mx-auto mt-10 px-4">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Keranjang</h1>

    @forelse ($cartItems as $item)
    <div class="flex justify-between items-center bg-white border border-gray-200 rounded-2xl p-4 shadow mb-5">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('storage/images/' . $item->book->cover_image) }}" alt="{{ $item->book->title }}" class="w-16 h-24 object-cover rounded-md">
            <div>
                <h2 class="font-semibold text-md text-gray-800">{{ $item->book->title }}</h2>
                <p class="text-sm text-gray-500">{{ $item->book->cover_type }}</p>
            </div>
        </div>

        <div class="text-right">
            <p class="text-lg font-bold text-gray-700">Rp{{ number_format($item->book->price, 0, ',', '.') }}</p>

            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center justify-end space-x-2 mt-2">
                @csrf
                @method('PATCH')
                <button type="submit" name="decrease" class="w-8 h-8 text-gray-600 border rounded-full hover:bg-gray-200">−</button>
                <span class="text-sm text-gray-700">{{ $item->quantity }}</span>
                <button type="submit" name="increase" class="w-8 h-8 text-gray-600 border rounded-full hover:bg-gray-200">+</button>
            </form>

            <form action="{{ route('cart.destroy', $item->id) }}" method="POST" class="mt-2">
                @csrf
                @method('DELETE')
                <button class="text-red-600 hover:text-red-800 text-xl" title="Hapus item">🗑️</button>
            </form>
        </div>
    </div>
    @empty
    <p class="text-center text-gray-500">Keranjang kosong.</p>
    @endforelse

    @if ($cartItems->isNotEmpty())
    <div class="mt-10 p-6 bg-white rounded-2xl shadow-md border border-gray-200">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Ringkasan Keranjang</h2>

        <div class="flex justify-between text-sm text-gray-700 mb-2">
            <span>Total Harga ({{ $totalQuantity }} Barang)</span>
            <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
        </div>

        <hr class="border-gray-300 my-2">

        <div class="flex justify-between text-lg font-bold text-gray-800">
            <span>Subtotal</span>
            <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
        </div>

        <form action="{{route('cart.checkout')}}" method="POST" class="mt-6">
            @csrf
            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-full hover:bg-blue-700 transition duration-200">Checkout</button>
        </form>
    </div>
    @endif
</div>
@endsection
