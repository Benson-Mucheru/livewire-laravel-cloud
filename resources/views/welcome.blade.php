<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('To Don\'t List') }} - {{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-[#FDFDFC]">
    <div>
        <div class="flex items-center gap-4">
            <div class="w-1/2 p-6 space-y-3">
                <flux:heading level="1" size="xl">Welcome to Don't List</flux:heading>
                <flux:text>Everyone's first project is always a to do list project, well I choose not go that route. I
                    give you
                    <span class="text-lg text-black">To
                        Don't List</span>
                </flux:text>
                <div>
                    <flux:button href="{{ route('login') }}">Login</flux:button>
                    <flux:button>To Don't</flux:button>
                </div>
            </div>
            <div class="w-1/2">
                <img src="{{ asset('storage/hero.jpg') }}" alt="" class="w-full max-h-screen object-cover">
            </div>
        </div>
    </div>
</body>

</html>
