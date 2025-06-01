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
    <a href="{{ route('page.home') }}"
    class="absolute top-4 left-4 text-sm font-medium text-white  border-gray-300 px-4 py-2 rounded-full ">
   < kembali
</a>



    <div class="w-full max-w-md px-6 py-8 text-center text-white">
      @if(session('success'))
    <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 transition-opacity duration-500" role="alert">
        {{ session('success') }}
    </div>
@endif

        <h1 class="text-5xl font-bold text-black mb-2 leading-tight" style="font-family: 'Urbanist'">Book<br><span
                class="ml-2">Land</span></h1>
        <h2 class="text-lg font-semibold mb-6">Masuk Akun BookLand</h2>

        <form method="POST" action="{{ route('login') }}" class="space-y-4 text-left">
            @csrf

            <input type="email" name="email" placeholder="Email"
                class="w-full p-3 rounded-md bg-white text-black focus:outline-none" required>

            <div class="relative">
                <input type="password" name="password" placeholder="Kata Sandi"
                    class="w-full p-3 bg-white rounded-md text-black focus:outline-none" required>

            </div>

            <button type="submit"
                class="w-full bg-slate-700 hover:bg-slate-800 text-white font-semibold py-2 rounded-md">
                Masuk
            </button>



        </form>


        <p class="mt-4 text-sm">
            Belum punya akun?
            <a href="{{ route('show.register') }}" class="underline text-white font-semibold">Daftar</a>
        </p>



    </div>

    <script>
    setTimeout(function () {
        const alert = document.getElementById('success-alert');
        if (alert) {
            alert.classList.add('opacity-0'); // Mulai fade-out
            setTimeout(() => alert.remove(), 500); // Hapus elemen dari DOM setelah animasi
        }
    }, 5000); // 5000ms = 5 detik
</script>

</body>

</html>
