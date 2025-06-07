@extends('admin.partials.main')
@section('content')
    <main class="flex-1 p-6 w-full">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Tambah Kategori</h2>

        <form action="{{route('books.update',$book->id)}}" method="POST"
            class="bg-white p-6 rounded-lg shadow max-w-full"enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Buku</label>
                <input type="text" name="title" id="title" required
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" value="{{$book->title}}" />
            </div>

            <div class="mb-4">
                <label for="author" class="block text-sm font-medium text-gray-700 mb-1">Nama Author</label>
                <input type="text" name="author" id="author" required
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" value="{{$book->author}}" />
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <input type="text" name="description" id="description" required
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" value="{{$book->description}}" />
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                <input type="number" name="price" id="price" required
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" value="{{$book->price}}" />
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" id="status" required
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                    <option value="">Pilih status</option>
                    <option value="bestseller">Best Seller</option>
                    <option value="new_release">New Release</option>
                    <option value="coming_soon">Coming Soon</option>
                </select>

            </div>




            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1"> Kategori</label>
                <select name="category_id" id="">
                    <option value="">pilih kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
                <input type="file" name="cover_image" id="image" required
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" value="{{$book->cover_image}}" />
            </div>

            <div class="flex justify-end mt-6">
                <a href="{{ route('books.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded mr-2 text-sm">Batal</a>
                <button type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded text-sm">Simpan</button>
            </div>
        </form>
    </main>
@endsection
