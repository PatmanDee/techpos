<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'TechPOS') }} - @yield('title', 'Portable Point of Sale Solution')</title>
    <meta name="description" content="@yield('meta_description', 'Process payments anywhere with our powerful, portable POS system')">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <!-- Add this to your layout file's head section -->
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- Icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" />

    <!-- Tailwind CSS (using Laravel Mix or Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom CSS -->
    <style>
        [x-cloak] { display: none !important; }
    </style>

    @stack('styles')
</head>
<body class="bg-background text-foreground">
    <div class="flex min-h-screen flex-col">
        <header class="sticky top-0 z-40 w-full border-b bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60">
            <div class="container flex h-16 items-center space-x-4 sm:justify-between sm:space-x-0">
                <div class="flex gap-6 md:gap-10">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-primary">
                            <rect width="20" height="14" x="2" y="5" rx="2" />
                            <path d="M2 10h20" />
                        </svg>
                        <span class="inline-block font-bold text-xl">{{ config('app.name', 'TechPOS') }}</span>
                    </a>
                    <nav class="hidden md:flex gap-6">
                        <a href="{{ route('features') }}" class="flex items-center text-sm font-medium text-muted-foreground transition-colors hover:text-primary {{ request()->routeIs('features') ? 'text-primary' : '' }}">
                            Features
                        </a>
                        <a href="{{ route('pricing') }}" class="flex items-center text-sm font-medium text-muted-foreground transition-colors hover:text-primary {{ request()->routeIs('pricing') ? 'text-primary' : '' }}">
                            Pricing
                        </a>
                        <a href="{{ route('about') }}" class="flex items-center text-sm font-medium text-muted-foreground transition-colors hover:text-primary {{ request()->routeIs('about') ? 'text-primary' : '' }}">
                            About
                        </a>
                        <a href="{{ route('contact') }}" class="flex items-center text-sm font-medium text-muted-foreground transition-colors hover:text-primary {{ request()->routeIs('contact') ? 'text-primary' : '' }}">
                            Contact
                        </a>
                        <a href="{{ route('faq') }}" class="flex items-center text-sm font-medium text-muted-foreground transition-colors hover:text-primary {{ request()->routeIs('faq') ? 'text-primary' : '' }}">
                            FAQ
                        </a>
                    </nav>
                </div>
                <div class="flex flex-1 items-center justify-end space-x-4">
                    <nav class="flex items-center space-x-2">
                        <a href="{{ route('login') }}" class="hidden sm:inline-flex h-9 items-center justify-center rounded-md bg-white px-4 py-2 text-sm font-medium text-primary shadow transition-colors hover:bg-gray-100 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="inline-flex h-9 items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground shadow transition-colors hover:bg-primary/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                            Sign Up Free
                        </a>
                    </nav>
                </div>
            </div>
        </header>

        <main class="flex-1">
            @yield('content')
        </main>

        <footer class="w-full border-t bg-background">
            <div class="container flex flex-col items-center justify-center gap-4 py-10 md:h-24 md:flex-row md:py-0">
                <div class="flex flex-col items-center gap-4 px-8 md:flex-row md:gap-2 md:px-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-primary">
                        <rect width="20" height="14" x="2" y="5" rx="2" />
                        <path d="M2 10h20" />
                    </svg>
                    <p class="text-center text-sm leading-loose md:text-left">
                        &copy; {{ date('Y') }} {{ config('app.name', 'TechPOS') }}. All rights reserved.
                    </p>
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('about') }}" class="text-sm text-muted-foreground hover:text-primary">
                        About
                    </a>
                    <a href="#" class="text-sm text-muted-foreground hover:text-primary">
                        Terms
                    </a>
                    <a href="#" class="text-sm text-muted-foreground hover:text-primary">
                        Privacy
                    </a>
                    <a href="{{ route('contact') }}" class="text-sm text-muted-foreground hover:text-primary">
                        Contact
                    </a>
                </div>
            </div>
        </footer>
    </div>

    <!-- AlpineJS (Lightweight JS Framework for Interactivity) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('scripts')
</body>
</html>
