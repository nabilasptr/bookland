@extends('admin.partials.main')
@section('content')
    <main class="flex-1 p-6">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif


        <div class="flex justify-between items-center mb-4 px-1">
            <h2 class="text-2xl font-bold text-gray-800">Daftar User</h2>

        </div>
        <div class="overflow-x-auto rounded-lg shadow bg-white">
            <table class="min-w-full table-fixed border border-gray-200">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="w-12 px-4 py-3 border-b text-left">No</th>
                        <th class="px-4 py-3 border-b text-left">Nama pengguna</th>
                        <th class="px-4 py-3 border-b text-left">email</th>
                        <th class="px-4 py-3 border-b text-left">Role</th>
                        <th class="w-40 px-4 py-3 border-b text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 text-sm">
                    @foreach ($users as $index => $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 border-b">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 border-b">{{ $user->name }}</td>
                            <td class="px-4 py-3 border-b">{{ $user->email }}</td>
                            <td class="px-4 py-3 border-b">
                                <form action="{{ route('users.updaterole', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="role" onchange="this.form.submit()"
                                        class="border border-gray-300 rounded p-1">
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>admin
                                        </option>
                                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>
                                            user</option>

                                    </select>
                                </form>
                            </td>
                            <td class="px-4 py-3 border-b">
                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
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
