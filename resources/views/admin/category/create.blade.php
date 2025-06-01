@extends('admin.partials.main')
@section('content')

<main class="flex-1 p-6 w-full">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Tambah Kategori</h2>

    <form action="{{route('categories.store')}}" method="POST" class="bg-white p-6 rounded-lg shadow max-w-full">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
            <input type="text" name="name" id="name" required
                class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" />
        </div>

        <div class="flex justify-end mt-6">
            <a href="{{ route('categories.index') }}"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded mr-2 text-sm">Batal</a>
            <button type="submit"
                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded text-sm">Simpan</button>
        </div>
    </form>
</main>

@endsection