@extends('layouts.frontend')

@section('title', 'Portable Point of Sale Solution')
@section('meta_description', 'TechPOS is a portable, powerful point of sale system that helps you process payments anywhere, anytime with reliability and security.')

@section('content')
    <section class="w-full py-12 md:py-24 lg:py-32 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <div class="container px-4 md:px-6">
            <div class="grid gap-6 lg:grid-cols-2 lg:gap-12 xl:grid-cols-2">
                <div class="flex flex-col justify-center space-y-4">
                    <div class="space-y-2">
                        <h1 class="text-3xl font-bold tracking-tighter sm:text-5xl xl:text-6xl/none bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">
                            One POS system to manage all your sales
                        </h1>
                        <p class="max-w-[600px] text-gray-600 md:text-xl">
                            Portable, powerful, and easy to use. {{ config('app.name', 'TechPOS') }} helps you process payments anywhere, anytime with
                            reliability and security.
                        </p>
                    </div>
                    <div class="flex flex-col gap-2 min-[400px]:flex-row">
                        <a
                            href="{{ route('register') }}"
                            class="inline-flex h-10 items-center justify-center rounded-md bg-primary px-8 text-sm font-medium text-primary-foreground shadow transition-colors hover:bg-primary/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring"
                        >
                            Get Started Free
                        </a>
                        <a
                            href="{{ route('contact') }}"
                            class="inline-flex h-10 items-center justify-center rounded-md border border-input bg-background px-8 text-sm font-medium shadow-sm transition-colors hover:bg-accent hover:text-accent-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring"
                        >
                            Book a Demo
                        </a>
                    </div>
                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1 h-4 w-4 text-primary">
                                <path d="M20 7h-7a4 4 0 1 0-8 0H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1Z"></path>
                                <circle cx="9" cy="7" r="3"></circle>
                                <path d="M14 7h5.5"></path>
                                <path d="M14 5v4"></path>
                            </svg>
                            <span>Secure Payments</span>
                        </div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1 h-4 w-4 text-primary">
                                <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                            </svg>
                            <span>Fast Setup</span>
                        </div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1 h-4 w-4 text-primary">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>10k+ Users</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <div class="relative w-full max-w-[600px] overflow-hidden rounded-lg shadow-xl">
                        <img
                            src="https://picsum.photos/seed/600/400"
                            alt="{{ config('app.name', 'TechPOS') }} Dashboard"
                            class="w-full object-cover"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="w-full py-12 md:py-24 lg:py-32">
        <div class="container px-4 md:px-6">
            <div class="flex flex-col items-center justify-center space-y-4 text-center">
                <div class="space-y-2">
                    <div class="inline-block rounded-lg bg-blue-100 px-3 py-1 text-sm text-blue-700">Features</div>
                    <h2 class="text-3xl font-bold tracking-tighter md:text-4xl/tight bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">
                        Everything you need to run your business
                    </h2>
                    <p class="max-w-[900px] text-gray-500 md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                        {{ config('app.name', 'TechPOS') }} combines powerful features with ease of use to help you manage sales, inventory, and customers
                        from anywhere.
                    </p>
                </div>
            </div>
            <div class="mx-auto grid max-w-5xl items-center gap-6 py-12 lg:grid-cols-3 lg:gap-12">
                <div class="flex flex-col justify-center space-y-4 rounded-lg border p-6 shadow-sm transition-all hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-blue-600">
                            <rect width="14" height="20" x="5" y="2" rx="2" ry="2"></rect>
                            <path d="M12 18h.01"></path>
                        </svg>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-xl font-bold">Portable POS</h3>
                        <p class="text-gray-500">
                            Process payments anywhere with our mobile-friendly interface that works on any device.
                        </p>
                    </div>
                </div>
                <div class="flex flex-col justify-center space-y-4 rounded-lg border p-6 shadow-sm transition-all hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-blue-600">
                            <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                            <line x1="3" x2="21" y1="9" y2="9"></line>
                            <line x1="9" x2="9" y1="21" y2="9"></line>
                        </svg>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-xl font-bold">Real-time Analytics</h3>
                        <p class="text-gray-500">
                            Track sales, inventory, and customer data with powerful analytics and reporting tools.
                        </p>
                    </div>
                </div>
                <div class="flex flex-col justify-center space-y-4 rounded-lg border p-6 shadow-sm transition-all hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-blue-600">
                            <rect width="20" height="14" x="2" y="5" rx="2" />
                            <path d="M2 10h20" />
                        </svg>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-xl font-bold">Multiple Payment Options</h3>
                        <p class="text-gray-500">
                            Accept credit cards, mobile payments, and more with our flexible payment processing.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="w-full py-12 md:py-24 lg:py-32 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <div class="container px-4 md:px-6">
            <div class="flex flex-col items-center justify-center space-y-4 text-center">
                <div class="space-y-2">
                    <div class="inline-block rounded-lg bg-blue-100 px-3 py-1 text-sm text-blue-700">Pricing</div>
                    <h2 class="text-3xl font-bold tracking-tighter md:text-4xl/tight bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">
                        Simple, transparent pricing
                    </h2>
                    <p class="max-w-[900px] text-gray-500 md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                        Choose the plan that's right for your business. All plans include a 14-day free trial.
                    </p>
                </div>
            </div>
            <div class="mx-auto grid max-w-5xl gap-6 py-12 lg:grid-cols-3 lg:gap-8">
                @foreach($pricingPlans as $plan)
                    <div class="flex flex-col rounded-lg border bg-card text-card-foreground shadow-sm {{ isset($plan['popular']) && $plan['popular'] ? 'relative' : '' }}">
                        @if(isset($plan['popular']) && $plan['popular'])
                            <div class="absolute -top-4 left-0 right-0 mx-auto w-fit rounded-full bg-blue-600 px-3 py-1 text-xs font-medium text-white">
                                Most Popular
                            </div>
                        @endif
                        <div class="p-6 pt-8">
                            <h3 class="text-2xl font-bold">{{ $plan['name'] }}</h3>
                            <div class="mt-4 flex items-baseline text-gray-900">
                                <span class="text-4xl font-extrabold tracking-tight">${{ $plan['price'] }}</span>
                                <span class="ml-1 text-xl font-semibold">/month</span>
                            </div>
                            <p class="mt-4 text-gray-500">{{ $plan['description'] }}</p>
                        </div>
                        <div class="flex flex-1 flex-col p-6 pt-0">
                            <ul class="space-y-3">
                                @foreach($plan['features'] as $feature)
                                    <li class="flex items-center">
                                        <svg class="mr-2 h-4 w-4 text-blue-600" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="mt-6">
                                <a href="{{ route('register') }}" class="inline-flex w-full items-center justify-center rounded-md {{ isset($plan['popular']) && $plan['popular'] ? 'bg-blue-600 text-white hover:bg-blue-700' : 'bg-primary text-primary-foreground hover:bg-primary/90' }} px-4 py-2 text-sm font-medium shadow transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                                    {{ $plan['name'] === 'Enterprise' ? 'Contact Sales' : 'Get Started' }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="testimonials" class="w-full py-12 md:py-24 lg:py-32">
        <div class="container px-4 md:px-6">
            <div class="flex flex-col items-center justify-center space-y-4 text-center">
                <div class="space-y-2">
                    <div class="inline-block rounded-lg bg-blue-100 px-3 py-1 text-sm text-blue-700">Testimonials</div>
                    <h2 class="text-3xl font-bold tracking-tighter md:text-4xl/tight bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">
                        Trusted by businesses everywhere
                    </h2>
                    <p class="max-w-[900px] text-gray-500 md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                        See what our customers have to say about {{ config('app.name', 'TechPOS') }}.
                    </p>
                </div>
            </div>
            <div class="mx-auto grid max-w-5xl gap-6 py-12 lg:grid-cols-3 lg:gap-12">
                @foreach($testimonials as $testimonial)
                    <div class="flex flex-col justify-between rounded-lg border bg-card p-6 shadow-sm">
                        <div>
                            <div class="flex gap-1 text-yellow-400">
                                @for($i = 0; $i < 5; $i++)
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            <blockquote class="mt-4 text-gray-600">
                                "{{ $testimonial['quote'] }}"
                            </blockquote>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="h-10 w-10 rounded-full bg-gray-200"></div>
                            <div class="ml-3">
                                <p class="text-sm font-medium">{{ $testimonial['author'] }}</p>
                                <p class="text-sm text-gray-500">{{ $testimonial['position'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="cta" class="w-full py-12 md:py-24 lg:py-32 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <div class="container px-4 md:px-6">
            <div class="flex flex-col items-center justify-center space-y-4 text-center">
                <div class="space-y-2">
                    <h2 class="text-3xl font-bold tracking-tighter md:text-4xl/tight bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">
                        Ready to transform your business?
                    </h2>
                    <p class="max-w-[900px] text-gray-500 md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                        Join thousands of businesses already using {{ config('app.name', 'TechPOS') }} to streamline their operations.
                    </p>
                </div>
                <div class="flex flex-col gap-2 min-[400px]:flex-row">
                    <a href="{{ route('register') }}" class="inline-flex h-10 items-center justify-center rounded-md bg-primary px-8 text-sm font-medium text-primary-foreground shadow transition-colors hover:bg-primary/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                        Get Started Free
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex h-10 items-center justify-center rounded-md border border-input bg-background px-8 text-sm font-medium shadow-sm transition-colors hover:bg-accent hover:text-accent-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                        Contact Sales
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
