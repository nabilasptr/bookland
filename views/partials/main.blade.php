<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BookLand')</title>

    <!-- Tailwind + JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Urbanist Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,800;1,800&display=swap" rel="stylesheet" />


    <!-- Font Awesome (icon bar) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body class="bg-white font-sans">
    @include('partials.header')

    <main class=" mx-auto  ">
        @yield('content')
    </main>

    @include('partials.footer')


</body>

</html>
