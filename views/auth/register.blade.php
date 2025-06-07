<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font: Urbanist -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,800;1,800&display=swap" rel="stylesheet" />
</head>

<body class="bg-red-600 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md p-6 bg-red-600 text-white text-center">
        <h1 class="text-5xl font-bold text-black mb-2"  style="font-family: 'Urbanist'">Book<br><span class="ml-2">Land</span></h1>
        <h2 class="text-lg font-semibold mb-6">Daftar Akun BookLand</h2>

        <form action="{{route('register')}}" method="POST" class="space-y-4 text-left text-black">
            @method('POST')
            @csrf

            <input type="email" name="email" placeholder="Email" class="w-full p-3  bg-white rounded-md focus:outline-none"
                required>

            <input type="text" name="name"  placeholder="Nama Lengkap"
                class="w-full p-3 rounded-md bg-white focus:outline-none" required>

            <input type="password" name="password" placeholder="Kata Sandi"
                class="w-full p-3 bg-white rounded-md focus:outline-none" required>

            <input type="password" name="password_confirmation" placeholder="Konfirmasi Kata Sandi"
                class="w-full p-3 bg-white rounded-md focus:outline-none" required>

            <button type="submit"
                class="w-full mt-4 bg-slate-700 hover:bg-slate-800 text-white font-semibold py-2 rounded-md">
                Daftar
            </button>
        </form>

        <p class="mt-4 text-sm text-white">
            Sudah punya akun? <a href="{{route('show.login')}}" class="underline">Masuk</a>
        </p>

    </div>
</body>

</html>
