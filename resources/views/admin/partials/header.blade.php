<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font: Urbanist -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,800;1,800&display=swap" rel="stylesheet" />
</head>

<body class="bg-gray-100 font-sans text-sm">

    {{-- Navbar --}}
    <nav class="bg-red-500 py-4">
        <div class="mx-10 flex justify-between items-center text-white">
            <a href="#" class="text-4xl font-extrabold" style="font-family: 'Urbanist', sans-serif;">
                <span class="block leading-none">Book</span>
                <span class="leading-none">Land</span>
            </a>

            <div class="flex items-center space-x-4 font-semibold">
                <span> {{ auth()->user()->name }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512">
	<path fill="currentColor" fill-rule="evenodd" d="M256 42.667A213.333 213.333 0 0 1 469.334 256c0 117.821-95.513 213.334-213.334 213.334c-117.82 0-213.333-95.513-213.333-213.334C42.667 138.18 138.18 42.667 256 42.667m21.334 234.667h-42.667c-52.815 0-98.158 31.987-117.715 77.648c30.944 43.391 81.692 71.685 139.048 71.685s108.104-28.294 139.049-71.688c-19.557-45.658-64.9-77.645-117.715-77.645M256 106.667c-35.346 0-64 28.654-64 64s28.654 64 64 64s64-28.654 64-64s-28.653-64-64-64" />
</svg>
            </div>
        </div>
    </nav>

    <div class="flex">
        {{-- Sidebar --}}
        <aside class="w-64 bg-white border-r border-gray-200 p-6 hidden md:block h-screen">
            <h1 class="text-2xl font-bold mb-6">Admin</h1>
            <ul class="space-y-4">
                <li>
                    <a href="{{{route('books.index')}}}" class="flex items-center space-x-2 hover:text-red-600 transition">
                        <img src="{{ asset('images/books.jpg') }}" alt="Manage Books" class="w-4 h-4 object-cover" />
                        <span>Manage Books</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('users.index')}}" class="flex items-center space-x-2 hover:text-red-600 transition">
                        <img src="{{ asset('images/users.png') }}" alt="Users" class="w-4 h-4 object-cover" />
                        <span>Users</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('categories.index')}}" class="flex items-center space-x-2 hover:text-red-600 transition">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
	<path fill="currentColor" d="M2 11V2h9v9zm0 2h9v9H2zM13 2v9h9V2zm0 20v-9h9v9z" />
</svg>
                        <span>Kategori</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('orderitems.index')}}" class="flex items-center space-x-2 hover:text-red-600 transition">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
	<path fill="currentColor" d="M464 48c-67.61.29-117.87 9.6-154.24 25.69c-27.14 12-37.76 21.08-37.76 51.84V448c41.57-37.5 78.46-48 224-48V48ZM48 48c67.61.29 117.87 9.6 154.24 25.69c27.14 12 37.76 21.08 37.76 51.84V448c-41.57-37.5-78.46-48-224-48V48Z" />
</svg>
                        <span>Order Items</span>
                    </a>
                </li>

                  <li class="-ml-1">
                    <a href="{{route('orders.index')}}" class="flex items-center space-x-2 hover:text-red-600 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
	<g fill="none" stroke="currentColor" stroke-width="2">
		<rect width="14" height="17" x="5" y="4" rx="2" />
		<path stroke-linecap="round" d="M9 9h6m-6 4h6m-6 4h4" />
	</g>
</svg>
                        <span>Orders</span>
                    </a>
                </li>
                <li>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <a href="" class="flex items-center space-x-2 hover:text-red-600 transition">
                        <img src="{{ asset('images/SVG.png') }}" alt="Logout" class="w-4 h-4 object-cover" />
                        <button type="submit">Log Out</button>
                    </a>
                    </form>
                </li>
            </ul>
        </aside>

        {{-- Main Content --}}
        @yield('content')
    </div>
