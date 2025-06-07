@extends('admin.partials.main')
@section('content')
    <main class="flex-1 p-6">

        <div class="flex justify-between items-center mb-4 px-1">
            <h2 class="text-2xl font-bold text-gray-800">Daftar item order</h2>
          
        </div>
        <div class="overflow-x-auto rounded-lg shadow bg-white">
            <table class="min-w-full table-fixed border border-gray-200">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="w-12 px-4 py-3 border-b text-left">No</th>
                        <th class="px-4 py-3 border-b text-left">Judul Buku</th>
                        <th class="px-4 py-3 border-b text-left">Harga</th>
                        <th class="px-4 py-3 border-b text-left">Jumlah</th>
                        <th class="px-4 py-3 border-b text-left">User</th>
                       
                    </tr>
                </thead>

                <tbody class="text-gray-800 text-sm">
                    @foreach ($orderItems as $index => $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 border-b">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 border-b">
                                {{ $item->book->title ?? 'Buku tidak ditemukan' }}
                            </td>
                            <td class="px-4 py-3 border-b">
                                Rp{{ number_format($item->price, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 border-b">
                                {{ $item->quantity }}
                            </td>
                            <td class="px-4 py-3 border-b">
                                {{ $item->order->user->name ?? 'User tidak ditemukan' }}
                            </td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </main>
@endsection
