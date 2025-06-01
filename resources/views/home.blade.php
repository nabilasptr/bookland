@extends('partials.main')

@section('title', 'Selamat Datang')

@section('content')
@if(session('success'))
    <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 transition-opacity duration-500" role="alert">
        {{ session('success') }}
    </div>
@endif


@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
        {{ session('error') }}
    </div>
@endif

    <!-- Hero Carousel -->
    <section class="relative h-screen md:h-screen p-0 m-0 h-[calc(100vh-116px)] md:h-[calc(100vh-136px)] overflow-hidden">
        <!-- Slides Wrapper -->
        <div id="heroCarousel" class="relative w-full h-full"  >
            <!-- Slide 1 -->
            <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-100 z-10 bg-cover bg-center"
                style="background-image: url('{{ asset('images/wall.jpg') }}'); min-height: 70vh;" >
                <div class="w-full h-full bg-black/50 flex flex-col items-center justify-center text-center text-white px-4">
                    <h1 class="text-4xl md:text-6xl font-bold mb-4" >Selamat Datang di BookLand</h1>
                    <a href="{{route('page.category')}}"
                        class="bg-white text-red-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-200 transition">
                        Shop Now
                    </a>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-100 z-10 bg-cover bg-center"
                style="background-image: url('{{ asset('images/wal33.jpg') }}'); min-height: 70vh;">
                <div
                    class="w-full h-full bg-black/50 flex flex-col items-center justify-center text-center text-white px-4">
                    <h1 class="text-4xl md:text-6xl font-bold mb-4">Selamat Datang di BookLand</h1>
                    <a href="{{route('page.category')}}"
                        class="bg-white text-red-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-200 transition">
                        Shop Now
                    </a>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-100 z-10 bg-cover bg-center"
                style="background-image: url('{{ asset('images/wall2.jpg') }}'); min-height: 70vh;">
                <div
                    class="w-full h-full bg-black/50 flex flex-col items-center justify-center text-center text-white px-4">
                    <h1 class="text-4xl md:text-6xl font-bold mb-4">Selamat Datang di BookLand</h1>
                    <a href="{{route('page.category')}}"
                        class="bg-white text-red-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-200 transition">
                        Shop Now
                    </a>
                </div>
            </div>
        </div>

        <!-- Manual Arrows -->
        <button id="prevBtn"
            class="hidden absolute left-4 top-1/2 -translate-y-1/2 z-20 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75">
            &#10094;
        </button>
        <button id="nextBtn"
            class="hidden absolute right-4 top-1/2 -translate-y-1/2 z-20 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75">
            &#10095;
        </button>

        <!-- Dots -->
        <div class="absolute bottom-6 w-full flex justify-center space-x-2 z-20">
            <button class="dot w-3 h-3 bg-white rounded-full"></button>
            <button class="dot w-3 h-3 bg-gray-400 rounded-full"></button>
            <button class="dot w-3 h-3 bg-gray-400 rounded-full"></button>
        </div>
    </section>


    <section id="produk" class="py-10 px-4 bg-white mt-14">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-8">Produk Buku Unggulan</h2>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @foreach ($books as $book)
                    <div class="bg-gray-100 rounded-xl overflow-hidden shadow flex flex-col min-h-[420px]" data-aos="zoom-in" data-aos-duration="700">
                        <img src="{{ asset('storage/images/' . $book->cover_image) }}" alt="Cover"
                            class="w-16 h-20 object-cover w-full h-66 rounded">
                        <div class="p-4 flex flex-col flex-grow justify-between">
                            <div>
                                <a href="{{route('books.show',$book->id)}}">
                                    <h3 class="text-sm font-bold leading-tight mb-1 line-clamp-2">
                                        {{ $book->title }}
                                    </h3>
                                </a>
                                <p class="text-xs text-gray-600 mb-2">{{ $book->author }}</p>
                                <p class="text-sm text-gray-700 mb-4 line-clamp-2">
                                    {{ $book->description }}
                                </p>
                            </div>
                            <p class="text-lg font-bold text-gray-800 mt-auto">Rp. {{ $book->price }}</p>
                        </div>
                    </div>
                @endforeach




            </div>
        </div>
    </section>









@endsection
