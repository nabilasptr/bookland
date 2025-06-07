@extends('admin.partials.main')
@section('content')
    <main class="flex-1 p-6">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif


        <div class="flex justify-between items-center mb-4 px-1">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Pesanan</h2>

        </div>
        <div class="overflow-x-auto rounded-lg shadow bg-white">
            <table class="min-w-full table-fixed border border-gray-200">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="w-12 px-4 py-3 border-b text-left">No</th>
                        <th class="px-4 py-3 border-b text-left">Nama pembeli</th>
                        <th class="px-4 py-3 border-b text-left">Total harga</th>
                        <th class="w-40 px-4 py-3 border-b text-left">Status</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 text-sm">
                    @foreach ($orders as $index => $order)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 border-b">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 border-b">{{ $order->user->name }}</td>
                            <td class="px-4 py-3 border-b">{{ $order->total_price }}</td>
                            <td class="px-4 py-3 border-b">
                                <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()"
                                        class="border border-gray-300 rounded p-1">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>
                                            Paid</option>
                                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>
                                            Shipped</option>
                                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
                                            Completed</option>
                                    </select>
                                </form>
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
@endsection
