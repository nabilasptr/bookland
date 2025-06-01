@extends('partials.main')

@section('title', 'Keranjang')

@section('content')
    <div class="px-4 md:px-8 lg:px-12 xl:px-16 my-6">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @foreach ($books as $book)
                <div class="bg-gray-100 rounded-xl overflow-hidden shadow flex flex-col min-h-[420px]" data-aos="zoom-in" data-aos-duration="700">
                    <img src="{{ asset('storage/images/' . $book->cover_image) }}" alt="Cover"
                        class="object-cover w-full h-66 rounded">
                    <div class="p-4 flex flex-col flex-grow justify-between">
                        <div>
                            <a href="{{ route('books.show', $book->id) }}">
                                <h3 class="text-sm font-bold leading-tight mb-1 line-clamp-2">
                                    {{ $book->title }}
                                </h3>
                            </a>
                            <p class="text-xs text-gray-600 mb-2">{{ $book->author }}</p>
                            <p class="text-sm text-gray-700 mb-4 line-clamp-3">
                                {{ $book->description }}
                            </p>
                        </div>
                        <p class="text-lg font-bold text-gray-800 mt-auto">Rp. {{ number_format($book->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
