<nav class="bg-red-600 text-white">
    <div class="max-w-screen-xl mx-auto px-4 py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ route('page.home') }}">
            <div class="text-2xl font-bold leading-tight" style="font-family: 'Urbanist', sans-serif;">
                <span class="block">Book</span>
                <span class="-mt-2 block">Land</span>
            </div>
        </a>

        <!-- Hamburger -->
        <button id="menu-toggle" class="md:hidden focus:outline-none text-2xl">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center space-x-6 w-full justify-end">
            <a href="{{route('favorites.index')}}" class="text-white text-2xl mr-4">
                <svg class="w-6 h-6 text-white hover:text-red-500" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </a>

            @auth
                @php
                    $cartCount = \App\Models\Cart::where('user_id', auth()->id())->sum('quantity');
                @endphp
                <a href="{{ route('cart.index') }}"
                    class="relative text-white hover:text-yellow-300 transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"
                        class="fill-current">
                        <path fill="currentColor"
                            d="M7 22q-.825 0-1.412-.587T5 20t.588-1.412T7 18t1.413.588T9 20t-.587 1.413T7 22m10 0q-.825 0-1.412-.587T15 20t.588-1.412T17 18t1.413.588T19 20t-.587 1.413T17 22M5.2 4h14.75q.575 0 .875.513t.025 1.037l-3.55 6.4q-.275.5-.737.775T15.55 13H8.1L7 15h12v2H7q-1.125 0-1.7-.987t-.05-1.963L6.6 11.6L3 4H1V2h3.25z" />
                    </svg>
                    @if ($cartCount > 0)
                        <span
                            class="absolute -top-2 -right-2 bg-red-600 text-white text-[10px] w-5 h-5 flex items-center justify-center rounded-full ring-2 ring-white font-bold shadow-md">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>
            @endauth


            <!-- Search -->
            <div class="w-72">
                <form action="{{ route('frontend.searchBooks') }}" method="GET">
                    <div class="flex items-center bg-white text-black px-3 py-2 rounded-full">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                        </svg>
                        <input type="text" name="search" placeholder="Cari judul buku"
                            class="ml-2 w-full bg-transparent focus:outline-none text-sm"
                            value="{{ request('search') }}">
                    </div>
                </form>
            </div>
            <!-- Auth Desktop -->
            @auth
                <!-- Tombol user -->
                <div class="relative">
                    <button id="user-menu-button"
                        class="flex items-center  text-white px-4 py-3 rounded-md text-sm hover: text-black  focus:outline-none">
                        <!-- Icon profil -->
                        <svg class="w-8 h-8 mr-2 text-white" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5.121 17.804A4 4 0 018 16h8a4 4 0 012.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ auth()->user()->name }}
                        <!-- Panah dropdown -->
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="user-dropdown"
                        class="hidden absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded shadow-lg z-50">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-red-500 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="flex space-x-2">
                    <a href="{{ route('login') }}"
                        class="bg-white text-black px-4 py-1 rounded-full text-sm hover:bg-gray-200">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="bg-blue-800 text-white px-4 py-1 rounded-full text-sm hover:bg-blue-700">Daftar</a>
                </div>
            @endauth


        </div>
    </div>
    <!-- Bottom Nav -->
    <div class="hidden md:flex justify-center bg-gray-100 py-2">
        <ul class="flex space-x-6 text-sm text-black font-medium">
            <li><a href="/" class="hover:text-red-600">Home</a></li>
           
            <li><a href="{{ route('page.category') }}" class="hover:text-red-600">Kategori</a></li>
            <li><a href="#" class="hover:text-red-600">Kontak</a></li>
        </ul>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-4">

        <div class="flex items-center justify-between bg-white text-black px-3 py-2 rounded-full">
            <div class="flex items-center flex-grow">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                </svg>
                <input type="text" placeholder="Cari produk, judul, atau penulis"
                    class="ml-2 w-full bg-transparent focus:outline-none text-sm">
            </div>

            <a href="{{route('favorites.index')}}" class="ml-2 text-black hover:text-red-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </a>
        </div>
        @auth
            <div class="relative group">
                <button
                    class="flex items-center bg-white text-black px-4 py-1 rounded-full text-sm hover:bg-gray-200 focus:outline-none">
                    {{ auth()->user()->name }}
                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div
                    class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded shadow-lg opacity-0 group-hover:opacity-100 group-hover:visible invisible transition-opacity duration-150 z-50">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100">Logout</button>
                    </form>
                </div>
            </div>
        @else
            <div class="flex space-x-2">
                <a href="{{ route('login') }}"
                    class="bg-white text-black px-4 py-1 rounded-full text-sm hover:bg-gray-200">Masuk</a>
                <a href="{{ route('register') }}"
                    class="bg-blue-800 text-white px-4 py-1 rounded-full text-sm hover:bg-blue-700">Daftar</a>
            </div>
        @endauth
        <ul class="space-y-2 text-sm text-white mt-4">
            <li><a href="/" class="block hover:underline">Home</a></li>
            <li><a href="#" class="block hover:underline">Promo</a></li>
            <li><a href="#" class="block hover:underline">Terbaru</a></li>
            <li><a href="#" class="block hover:underline">Kategori</a></li>
            <li><a href="#" class="block hover:underline">Kontak</a></li>
        </ul>
    </div>
</nav>
