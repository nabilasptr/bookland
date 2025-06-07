@extends('partials.main')

@section('title', 'Selamat Datang')

@section('content')

    <div class="bg-gray-50 min-h-screen">
        <!-- Breadcrumb -->
        <div class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 py-3">
                <nav class="flex items-center space-x-2 text-sm text-gray-600">
                    <a href="#" class="hover:text-blue-600">Home</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <a href="#" class="hover:text-blue-600">Kategori</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-gray-900">Buku</span>
                </nav>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Sidebar -->
                <div class="lg:w-1/4">
                    <!-- Category Filter -->
                    <div class="bg-white rounded-lg shadow-sm p-4">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-semibold text-gray-900">Kategori</h3>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </div>

                        <div class="space-y-3">
                            <div class="border border-gray-200 rounded-lg p-3 bg-red-50">
                                <h4 class="font-medium text-red-700 mb-2">Buku</h4>
                                <ul class="space-y-1 text-sm text-gray-600">
                                     <li>
                                            <a href="{{route('page.category')}}"
                                                class="hover:text-red-600">
                                                semua
                                            </a>
                                        </li>
                                     
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="{{ route('books.filter', ['category' => $category->id]) }}"
                                                class="hover:text-red-600">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endforeach



                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:w-3/4">
                     <div class="mb-6">
                       <a href="{{ route('books.new_release') }}"
   class="py-2 px-4 rounded-md inline-block
   {{ Route::is('books.new_release') ? 'bg-red-600 text-white' : 'bg-gray-400 text-white' }}">
   Terbaru
</a>

                    </div>

                  

                    <!-- Book Catalog -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Book 1 -->
                        @foreach ($books as $book)
                            <div class="bg-white rounded-xl shadow-md   min-h-[400px] flex flex-col"  data-aos="zoom-in" data-aos-duration="700">
                                <!-- Cover -->
                                <div class="h-56 bg-gray-200 flex items-center justify-center">
                                    <img src="{{ asset('storage/images/' . $book->cover_image) }}" alt="Cover"
                                        class="w-32 h-48 object-cover rounded shadow">
                                </div>

                                <!-- Content -->
                                <div class="p-4 flex flex-col flex-grow">
                                    <a href="{{ route('books.show', $book->id) }}">
                                        <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $book->title }}</h3>
                                    </a>
                                    <p class="text-sm text-gray-600 mb-1">{{ $book->Category->name }}</p>
                                    <p class="text-xs text-gray-500 italic mb-3">{{ $book->description }}</p>
                                    <p class="text-lg font-bold text-red-600">Rp. {{ number_format($book->price, 2, ',', '.') }}</p>
                                </div>
                            </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection