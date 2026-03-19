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

                <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                    Stop Doing What Holds You Back 🚫
                </h1>

                <p class="text-lg text-gray-600 mb-6">
                    Most productivity apps tell you what to do.
                    <span class="font-semibold text-red-500">We tell you what NOT to do.</span>
                </p>

                <p class="text-gray-600 mb-8">
                    Eliminate distractions, break bad habits, and focus on what truly matters with your personalized “To
                    Don’t List”.
                </p>

                <div class="flex gap-4">
                    <a href="{{ route('login') }}"
                        class="bg-red-500 text-white px-6 py-3 rounded-xl font-semibold shadow hover:bg-red-600 transition">
                        Login
                    </a>

                    <a href="#how-it-works"
                        class="px-6 py-3 rounded-xl border border-gray-300 hover:bg-gray-100 transition">
                        Learn More
                    </a>
                </div>


            </div>
            <div class="w-1/2">
                <img src="{{ asset('storage/banner.png') }}" alt="" class="w-full h-screen object-cover">
            </div>
        </div>
    </div>

    <!-- WHY SECTION -->
    <section class="py-16 bg-gray-100">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-6">Why This App?</h2>

            <p class="text-gray-600 mb-10">
                We spend too much time trying to do more — when the real solution is doing less of the wrong things.
                This app helps you identify and eliminate habits that waste your time, energy, and focus.
            </p>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="font-semibold text-lg mb-2">🚫 Cut Distractions</h3>
                    <p class="text-gray-600 text-sm">
                        Stop overthinking, procrastinating, and wasting time on low-value tasks.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="font-semibold text-lg mb-2">🎯 Gain Focus</h3>
                    <p class="text-gray-600 text-sm">
                        Remove noise so you can concentrate on what truly matters.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="font-semibold text-lg mb-2">⚡ Build Better Habits</h3>
                    <p class="text-gray-600 text-sm">
                        Awareness of what NOT to do leads to better decisions daily.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section id="how-it-works" class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">How It Works</h2>

            <div class="grid md:grid-cols-3 gap-10 text-center">

                <div>
                    <div class="text-4xl mb-4">1️⃣</div>
                    <h3 class="font-semibold text-lg mb-2">Create Your List</h3>
                    <p class="text-gray-600 text-sm">
                        Add habits and behaviors you want to avoid — like procrastination or overthinking.
                    </p>
                </div>

                <div>
                    <div class="text-4xl mb-4">2️⃣</div>
                    <h3 class="font-semibold text-lg mb-2">Track Yourself</h3>
                    <p class="text-gray-600 text-sm">
                        Stay aware of your actions and monitor patterns over time.
                    </p>
                </div>

                <div>
                    <div class="text-4xl mb-4">3️⃣</div>
                    <h3 class="font-semibold text-lg mb-2">Improve Daily</h3>
                    <p class="text-gray-600 text-sm">
                        Replace bad habits with intentional actions and better decisions.
                    </p>
                </div>

            </div>
        </div>
    </section>


    <!-- FEATURES -->
    <section class="py-16 bg-gray-100">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Features</h2>

            <div class="grid md:grid-cols-4 gap-6 text-center">
                <div class="bg-white p-5 rounded-xl shadow">📝 Custom Lists</div>
                <div class="bg-white p-5 rounded-xl shadow">⏱ Time Awareness</div>
                <div class="bg-white p-5 rounded-xl shadow">📊 Progress Tracking</div>
                <div class="bg-white p-5 rounded-xl shadow">🔔 Smart Reminders</div>
            </div>
        </div>
    </section>


    <!-- FINAL CTA -->
    <section class="py-20 bg-red-500 text-white text-center">
        <div class="max-w-3xl mx-auto px-6">
            <h2 class="text-4xl font-bold mb-6">
                Ready to Stop What’s Holding You Back?
            </h2>

            <p class="mb-8 text-lg">
                Start your To Don’t List today and take control of your habits.
            </p>

            <a href="#"
                class="bg-white text-red-500 px-8 py-4 rounded-xl font-semibold shadow hover:bg-gray-100 transition">
                Start Now — It’s Free
            </a>
        </div>
    </section>


    <!-- FOOTER -->
    <footer class="py-6 text-center text-gray-500 text-sm">
        © 2026 To Don’t List App. All rights reserved.
    </footer>

</body>

</html>
