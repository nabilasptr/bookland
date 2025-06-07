@extends('partials.main')

@section('title', 'Selamat Datang')

@section('content')
    <div class="container mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- Cover & Thumbnail Slider -->
        <div class="flex flex-col items-center">
            <img src="{{ asset('storage/images/' . $book->cover_image) }}" alt="Sisi Tergelap Surga"
                class="rounded-lg shadow-lg w-full max-w-sm">


            <!-- Quantity Selector & Add to Cart -->
            <div class="mt-6 w-full max-w-sm flex items-center space-x-4">
                <div class="flex border border-gray-300 rounded-md px-3 py-1 items-center">
                    <button onclick="decreaseQuantity()" class="px-2 text-xl font-bold text-gray-700">-</button>
                    <span id="quantity" class="px-4">1</span>
                    <button onclick="increaseQuantity()" class="px-2 text-xl font-bold text-gray-700">+</button>
                </div>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <input type="hidden" id="quantityInput" name="quantity" value="1">
                    <button type="submit"
                        class="bg-red-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-red-700">
                        Keranjang
                    </button>
                </form>
            </div>

        </div>

        <!-- Book Info -->
        <div class="md:col-span-2 space-y-4">
            <p class="text-sm text-gray-500">{{ $book->author }}</p>
            <h1 class="text-2xl font-bold text-gray-800">{{ $book->title }}</h1>
            <div class="flex items-center space-x-4">
                <p class="text-2xl font-bold text-gray-900">Rp{{ $book->price }}</p>

            </div>

            <!-- Buttons -->
            <form action="{{ route('favorite.toggle', $book->id) }}" method="POST" class="favorite-form">
                @csrf
                <div class="flex space-x-4 mt-2">
                    <button type="button"
                        class="favorite-btn px-4 py-2 border rounded-lg bg-white shadow text-sm text-gray-500 hover:text-red-500 transition-colors"
                        aria-pressed="false">
                        🤍 Favorit
                    </button>
                </div>
            </form>


            <!-- Detail Info -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center mt-6 text-sm text-gray-700">
                <div>
                    <p class="text-gray-500 text-xs">Kategori </p>
                    <p class="font-medium">{{ $book->Category->name }}</p>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="bg-gray-100 p-4 rounded-lg shadow mt-4">
                <h3 class="text-center text-gray-400 text-sm font-bold mb-2">Deskripsi</h3>
                <p class="text-sm text-gray-800 leading-relaxed">
                    {{ $book->description }}
                </p>

            </div>


        </div>
    </div>

@endsection
