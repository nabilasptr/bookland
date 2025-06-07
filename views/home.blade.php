@extends('partials.main')

@section('title', 'Selamat Datang')

@section('content')
    @if (session('success'))
        <div id="success-alert"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 transition-opacity duration-500"
            role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <main>
        <div class="w-full h-auto bg-[#445E80] rounded-b-[80px] sm:rounded-b-[150px] mb-10 sm:mb-20 pb-10">
            <div
                class="w-full max-w-[1219px] bg-[#445E80] shadow-2xl mx-auto rounded-b-[50px] sm:rounded-b-[100px] flex flex-col-reverse sm:flex-row items-center justify-between gap-6 px-4 pt-8">
                
                <div class="text-white text-3xl bg-[#D9D9D9] rounded-full py-4 px-6 opacity-70 sm:-ml-10 hidden sm:block">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>

                <div class="max-w-[426px] h-auto flex flex-col gap-5 text-center sm:text-left">
                    <p class="text-[#D9D9D9] text-[24px] sm:text-[36px] font-bold">
                        10 Buku untuk Membuat Tahun ini Menjadi Tahun Terbaikmu
                    </p>
                    <div
                        class="bg-[#D7303E] w-fit mx-auto sm:mx-0 px-5 py-3 rounded-lg flex items-center justify-center text-[14px] font-bold text-white">
                        <p>
                            Shop Now <i class="fa-solid fa-arrow-up rotate-45 ml-1"></i>
                        </p>
                    </div>
                </div>

                <div class="w-[200px] sm:w-auto">
                    <img src="{{ asset('images/body-image.png') }}" alt="Banner Image" class="w-full h-auto" />
                </div>

                <div class="text-white text-3xl bg-[#D9D9D9] rounded-full py-4 px-6 opacity-70 sm:-mr-10 hidden sm:block">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
            </div>
        </div>
    </main>

    <section class="relative py-10 bg-white overflow-x-hidden">
        <div
            class="bg-[#D7303E] ml-auto mr-4 sm:ml-80 sm:mb-10 h-[60px] sm:h-[84px] w-[200px] sm:w-[248px] rounded-r-[40px] rounded-tl-2xl rounded-bl-[80px] sm:rounded-bl-[100px] relative top-6 flex justify-center items-center">
            <p class="text-white text-lg sm:text-2xl font-bold">Buku Terlaris</p>
        </div>

        <!-- Gambar Cewek -->
        <div class="absolute left-2 top-0 flex flex-col items-start z-10 hidden sm:flex">
            <img src="{{ asset('images/cewek.png') }}" alt="Girl" class="relative w-[100px] sm:w-auto" />
            <div class="bg-[#D7303E] h-10 w-10 sm:h-12 sm:w-12 rounded-full relative top-4"></div>
        </div>

        <!-- Daftar Buku -->
        <div class="sm:ml-[380px] mt-10 px-4 sm:px-0 overflow-x-auto">
            <div class="flex gap-4 pr-4 w-max">
                @foreach ($books as $book)
                    <div class="bg-gray-300 w-[140px] sm:w-[158px] h-[270px] sm:h-[290px] rounded-xl flex flex-col items-center relative shadow">
                        <div class="w-[110px] sm:w-[128px] h-[140px] sm:h-[158px] mt-4">
                            <a href="{{ route('books.show', $book->id) }}">
                                <img src="{{ asset('storage/images/' . $book->cover_image) }}"
                                    alt="{{ $book->title }}"
                                    class="w-full h-full object-cover rounded" />
                            </a>
                        </div>
                        <p class="text-sm text-center mt-2 px-2 line-clamp-2">
                            {{ Str::limit($book->title, 40) }}
                        </p>
                        <p class="font-bold text-base sm:text-xl text-center text-gray-800">
                            Rp{{ number_format($book->price, 0, ',', '.') }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection