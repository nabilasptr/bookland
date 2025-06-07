<nav class="bg-[#D7303E] w-full h-auto py-4 px-5 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 font-urbanist text-white">
    <!-- Kiri: Logo -->
    <a href="{{ route('page.home') }}" class="text-3xl font-bold text-center lg:text-left">
        Book Land
    </a>

    <!-- Tengah: Search + Icons + Submenu -->
    <div class="w-full lg:w-auto flex flex-col gap-2">
        <!-- Search + Icons -->
        <div class="flex flex-wrap justify-center items-center gap-2">
            <!-- Search Form -->
            <form action="{{ route('frontend.searchBooks') }}" method="GET"
                class="bg-white flex items-center gap-2 rounded-full w-full max-w-md lg:w-[556px] h-[48px] px-4">
                <i class="fa-solid fa-magnifying-glass text-xl text-gray-600"></i>
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari Produk, Judul Buku, atau Penulis"
                    class="w-full h-full bg-transparent outline-none text-sm text-gray-600 placeholder-gray-500" />
            </form>

            <!-- Icons -->
            <div class="flex items-center gap-2 text-[#D7303E]">
                <a href="{{ route('favorites.index') }}"
                    class="bg-white rounded-full py-2 px-3 hover:bg-gray-100 transition">
                    <i class="fa-solid fa-face-kiss-wink-heart"></i>
                </a>

                @auth
                    @php
                        $cartCount = \App\Models\Cart::where('user_id', auth()->id())->sum('quantity');
                    @endphp
                    <a href="{{ route('cart.index') }}"
                        class="relative bg-white rounded-full py-2 px-3 hover:bg-gray-100 transition">
                        <i class="fa-solid fa-cart-shopping"></i>
                        @if ($cartCount > 0)
                            <span
                                class="absolute -top-1 -right-1 bg-red-600 text-white text-[10px] w-4 h-4 flex items-center justify-center rounded-full ring-2 ring-white font-bold shadow-md">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>
                @else
                    <a href="{{ route('cart.index') }}"
                        class="bg-white rounded-full py-2 px-3 hover:bg-gray-100 transition">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                @endauth
            </div>
        </div>

        <!-- Submenu -->
        <div
            class="bg-[#D9D9D9] rounded-full h-[27px] mt-2 flex items-center justify-center gap-10 text-xs px-5 text-black font-semibold">
            <a href="{{ route('page.home') }}" class="hover:underline">Home</a>
            <a href="{{ route('books.new_release') }}" class="hover:underline">Terbaru</a>
            <a href="{{ route('page.category') }}" class="hover:underline">Kategori</a>
        </div>
    </div>

    <!-- Kanan: Auth Buttons -->
    <div class="flex gap-2 justify-center">
        @auth
            <span class="h-[46px] bg-white rounded-xl flex items-center justify-center px-3 font-bold text-sm text-black">
                {{ auth()->user()->name }}
            </span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-[78px] h-[46px] bg-red-600 rounded-xl font-bold text-sm text-white hover:bg-red-700">
                    Logout
                </button>
            </form>
        @else
            <a href="{{ route('login') }}"
                class="w-[78px] h-[46px] bg-white rounded-xl flex items-center justify-center font-bold text-sm text-black hover:bg-gray-200">
                Masuk
            </a>
            <a href="{{ route('register') }}"
                class="w-[78px] h-[46px] bg-[#445E80] text-white rounded-xl flex items-center justify-center font-bold text-sm hover:bg-blue-700">
                Daftar
            </a>
        @endauth
    </div>
</nav>