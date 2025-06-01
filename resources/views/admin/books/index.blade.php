@extends('admin.partials.main')
@section('content')
    <main class="flex-1 p-6">
        @if (session('success'))
            <div id="success-alert"
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 transition-opacity duration-500"
                role="alert">
                {{ session('success') }}
            </div>
        @endif



        <div class="flex justify-between items-center mb-4 px-1">
            <h2 class="text-2xl font-bold text-gray-800">List Buku</h2>
            <a href="{{ route('books.create') }}"
                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded text-sm font-semibold transition duration-200">
                + Tambah Buku
            </a>
        </div>
        <div class="overflow-x-auto rounded-lg shadow bg-white">
            <table class="min-w-full table-fixed border border-gray-200">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="w-12 px-4 py-3 border-b text-left">No</th>
                        <th class="px-4 py-3 border-b text-left">Judul BUku</th>
                        <th class="px-4 py-3 border-b text-left">Author</th>
                        <th class="px-4 py-3 border-b text-left">Deskripsi</th>
                        <th class="px-4 py-3 border-b text-left">Kategori</th>
                        <th class="px-4 py-3 border-b text-left">harga</th>
                        <th class="px-4 py-3 border-b text-left">cover buku</th>
                        <th class="px-4 py-3 border-b text-left">status</th>
                        <th class="w-40 px-4 py-3 border-b text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="text-black text-sm">
                    @foreach ($books as $index => $book)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 border-b ">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 border-b text-black">{{ $book->title }}</td>
                            <td class="px-4 py-3 border-b">{{ $book->author }}</td>
                            <td class="px-4 py-3 border-b">{{ $book->description }}</td>
                            <td class="px-4 py-3 border-b">{{ $book->Category->name }}</td>
                            <td class="px-4 py-3 border-b">Rp. {{ $book->price }}</td>
                            <td class="px-4 py-3 border-b">
                                <img src="{{ asset('storage/images/' . $book->cover_image) }}" alt="Cover"
                                    class="w-16 h-20 object-cover rounded">
                            </td>

                            <td class="px-4 py-3 border-b">{{ $book->status }}</td>
                            <td class="px-4 py-3 border-b">
                                <div class="flex space-x-2 items-center">
                                    <a href="{{ route('books.edit', $book->id) }}"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs">Edit</a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="post"
                                        class="m-0 p-0 inline-block">
                                        @method('delete')
                                        @csrf
                                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs"
                                            type="submit">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>

    </main>
@endsection
