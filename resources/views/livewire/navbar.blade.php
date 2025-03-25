@props(['scrolled' => false])

<div x-data="{
    scrolled: @json($scrolled),
    mobileMenuOpen: false,
    categoriesOpen: false
}" x-init="() => {
    window.addEventListener('scroll', () => {
        scrolled = window.scrollY > 50;
    });
}" class="sticky top-0 z-50" :class="{ 'shadow-lg': scrolled }">
    <!-- Top Announcement Bar -->
    <div x-show="!scrolled" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-[-100%]" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-[-100%]"
        class="bg-[#fff0f4] dark:bg-[#1a0f14] border-b border-[#ffdbe4] dark:border-[#2a1a22]">
        <div class="container mx-auto px-4">
            <div class="flex h-10 items-center justify-between text-sm">
                <div class="flex items-center space-x-4">
                    <a href="tel:+11234567890"
                        class="flex items-center text-blue-900 dark:text-blue-300 hover:text-[#ff4c68] dark:hover:text-[#ff4c68] transition-colors">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        +254 (742) 169-017
                    </a>
                </div>


                <div class="flex items-center space-x-4 text-center">
                    <span class="hidden sm:flex items-center text-[#2c1a22] dark:text-white/90">
                        <svg class="w-4 h-4 mr-2 text-[#ff6b8a]" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Free Shipping Over 3 Orders
                    </span>
                    <x-utils.dark-mode-toggle />
                </div>
            </div>
        </div>
    </div>

   <header
  :class="scrolled 
    ? 'bg-white/95 supports-backdrop-blur:bg-white/60 [@supports(backdrop-filter:blur(0))]:backdrop-blur-md dark:bg-[#0f0f0f]/95 border-b border-gray-100 dark:border-gray-800' 
    : 'bg-gradient-to-r from-[#fff9fb] to-[#f6f7ff] dark:bg-none dark:bg-black'"
  class="transition-colors transition-background duration-300"
>
        <div class="container mx-auto px-4">
            <div class="flex h-16 items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center flex-shrink-0">
                    <x-app-logo :class="scrolled ? 'h-8' : 'h-10'" class="transition-all duration-300" />
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}"
                        class="nav-link text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Home</a>
                    <a href="{{ route('products') }}"
                        class="nav-link text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Shop</a>

                    <!-- Categories Dropdown -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" @mouseenter="open = true" @mouseleave="open = false"
                            class="nav-link flex items-center space-x-1 text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                            <span>Categories</span>
                            <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-1"
                            class="absolute top-full left-0 w-48 mt-2 bg-white dark:bg-gray-900 rounded-lg shadow-xl border border-gray-100 dark:border-gray-800">
                            <a href="{{ route('products', 'shop') }}"
                                class="dropdown-link text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 block px-4 py-2">Clothing</a>
                            <a href="{{ route('products', 'shop') }}"
                                class="dropdown-link text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 block px-4 py-2">Toys
                                & Games</a>
                            <a href="{{ route('products', 'shop') }}"
                                class="dropdown-link text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 block px-4 py-2">Nursery</a>
                            <a href="{{ route('products', 'shop') }}"
                                class="dropdown-link text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 block px-4 py-2">Feeding</a>
                        </div>
                    </div>

                    <a href="{{ route('blog') }}"
                        class="nav-link text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Blog</a>
                    <a href="{{ route('contact-me') }}"
                        class="nav-link text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Contact</a>
                </nav>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="p-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- Action Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    <livewire:cart-actions />

                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="nav-link flex items-center text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Account
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="nav-link text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Login</a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-cloak
            class="md:hidden absolute inset-x-0 top-full bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800">
            <div class="container mx-auto px-4 py-4">
                <div class="space-y-2">
                    <a href="{{ route('home') }}"
                        class="mobile-nav-link text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors block">Home</a>
                    <a href="{{ route('products') }}"
                        class="mobile-nav-link text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors block">Shop</a>

                    <div x-data="{ categoriesOpen: false }" class="space-y-2">
                        <button @click="categoriesOpen = !categoriesOpen"
                            class="w-full flex items-center justify-between mobile-nav-link text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                            <span>Categories</span>
                            <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': categoriesOpen }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="categoriesOpen" class="pl-4 space-y-2">
                            <a href="{{ route('products', 'shop') }}"
                                class="mobile-nav-link text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors block">Clothing</a>
                            <a href="{{ route('products', 'shop') }}"
                                class="mobile-nav-link text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors block">Toys
                                & Games</a>
                            <a href="{{ route('products', 'shop') }}"
                                class="mobile-nav-link text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors block">Nursery</a>
                            <a href="{{ route('products', 'shop') }}"
                                class="mobile-nav-link text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors block">Feeding</a>
                        </div>
                    </div>

                    <a href="{{ route('blog') }}"
                        class="mobile-nav-link text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors block">Blog</a>
                    <a href="{{ route('contact-me') }}"
                        class="mobile-nav-link text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors block">Contact</a>

                    <div class="pt-4 border-t border-gray-100 dark:border-gray-800">
                        @auth
                            <a href="{{ route('dashboard') }}"
                                class="mobile-nav-link text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors block">My
                                Account</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="mobile-nav-link text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors block">Login</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>

</div>
