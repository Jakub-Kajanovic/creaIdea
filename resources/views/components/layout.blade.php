<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crea Idea | kreatívny marketing zameraný na úspech</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body class="min-h-screen flex flex-col justify-between">
    @auth
        @if(Auth::user()->is_admin)
        <div class="bg-gray-500 text-white py-2 px-4">
            <div class="container mx-auto flex justify-between items-center">
                <div class="space-x-4">
                    <a href="{{route('admin.dashboard')}}">Administrácia</a>
                </div>
            </div>
        </div>
        @endif
    @endauth
    <x-header />
    <main class="container mx-auto px-4">
        <x-flash/>
        {{ $slot }}
    </main>
    <x-footer />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            disable: function() {
                return window.innerWidth < 768; // Disable on phones
            },
            duration: 700,
        });
    </script>
</body>

</html>
