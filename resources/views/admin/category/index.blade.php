@extends('admin.partials.main')
@section('content')
    <main class="flex-1 p-6">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif


        <div class="flex justify-between items-center mb-4 px-1">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Kategori</h2>
            <a href="{{ route('categories.create') }}"
                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded text-sm font-semibold transition duration-200">
                + Tambah Kategori
            </a>
        </div>
        <div class="overflow-x-auto rounded-lg shadow bg-white">
            <table class="min-w-full table-fixed border border-gray-200">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="w-12 px-4 py-3 border-b text-left">No</th>
                        <th class="px-4 py-3 border-b text-left">Nama Kategori</th>
                        <th class="w-40 px-4 py-3 border-b text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 text-sm">
                    @foreach ($categories as $index => $category)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 border-b">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 border-b">{{ $category->name }}</td>
                            <td class="px-4 py-3 border-b flex space-x-2">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs"
                                        type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
@endsection
