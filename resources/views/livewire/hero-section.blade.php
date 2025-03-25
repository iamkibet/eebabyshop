<section class="mx-auto max-w-7xl">
    <!-- Hero Section -->
    <div class="relative isolate overflow-hidden px-6 lg:px-0">
        <!-- Decorative Elements -->
        <div
            class="bg-gradient-radial absolute top-0 left-1/2 -z-10 h-[64rem] w-[128rem] -translate-x-1/2 rounded-full from-[#ffd6e0] to-70% opacity-30 blur-3xl dark:from-[#2c1a22]">
        </div>

        <div
            class="mx-auto grid max-w-2xl grid-cols-1 gap-16 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:items-center lg:gap-x-8">
            <!-- Text Content -->
            <div class="relative lg:order-first">
                <h1
                    class="font-pacifo text-5xl leading-tight text-[#2c1a22] drop-shadow-sm sm:text-6xl sm:leading-tight lg:text-7xl dark:text-[#ffe6ed]">
                    Where Tiny
                    <span class="relative whitespace-nowrap text-[#ff6b8a]">
                        Dreams
                        <svg class="absolute -bottom-2 left-0 h-3 w-full text-[#ff3d6a]" viewBox="0 0 200 20">
                            <path d="M0 18.5Q100 0 200 18.5" fill="none" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </span>
                    Begin
                </h1>

                <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-300">
                    Curated with love, our collection brings you the finest baby essentials.
                    <span class="mt-2 block font-semibold text-[#ff6b8a]">
                        Affordable • Best Quality • Unique
                    </span>
                </p>

                <!-- CTA Buttons -->
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('products') }}"
                        class="group relative flex items-center gap-2 rounded-xl bg-gradient-to-r from-[#ff6b8a] to-[#ff8e6b] px-6 py-4 font-semibold text-white shadow-lg shadow-[#ff6b8a]/20 transition-all hover:shadow-xl hover:shadow-[#ff6b8a]/30">
                        <span>🛍 Start Exploring</span>
                        <div
                            class="h-4 w-4 rounded-full bg-white/20 transition-all group-hover:w-6 group-hover:bg-white/30">
                        </div>
                    </a>

                    <a href="{{ route('products') }}"
                        class="flex items-center gap-2 rounded-xl border-2 border-[#ff6b8a] bg-transparent px-6 py-4 font-semibold text-[#ff6b8a] transition-all hover:bg-[#ff6b8a]/10">
                        ✨ New Arrivals
                        <span class="relative flex h-3 w-3">
                            <span
                                class="absolute inline-flex h-full w-full animate-ping rounded-full bg-[#ff6b8a] opacity-75"></span>
                            <span class="relative inline-flex h-3 w-3 rounded-full bg-[#ff6b8a]"></span>
                        </span>
                    </a>
                </div>
            </div>

            <!-- Image Section -->
            <div class="relative -mx-6 lg:order-last lg:pt-8">
                <div class="animate-float relative aspect-[1/1] w-full">
                    <img src="/images/babyhero.svg" alt="Happy Baby"
                        class="absolute top-0 left-0 h-full w-full object-contain" />
                    <div class="absolute -top-8 -left-8 h-32 w-32 rounded-full bg-[#ffd6e0] blur-3xl dark:bg-[#2c1a22]">
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- Updated Category Grid -->
<div class="mx-auto overflow-hidden my-24 max-w-7xl px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-900">
    <div class="grid auto-rows-fr gap-8 sm:grid-cols-2 lg:grid-cols-3">
        <x-category-card 
            title="Little Princesses" 
            description="Dreamy Outfits & Accessories"
            href="{{ route('home') }}" 
            color="from-pink-200/60 via-purple-200/40 to-pink-300/30 dark:from-pink-900/50 dark:via-purple-900/30 dark:to-pink-800/40"
            bgImage="/images/girlsclothes.webp" 
            textColor="text-pink-50 dark:text-gray-100"
        />
        <x-category-card 
            title="Adventurous Boys" 
            description="Durable & Playful Designs" 
            href="{{ route('home') }}"
            color="from-blue-200/60 via-cyan-200/40 to-blue-300/30 dark:from-blue-900/50 dark:via-cyan-900/30 dark:to-blue-800/40"
            bgImage="/images/boysclothes.jpg"
            textColor="text-blue-50 dark:text-gray-100"
        />
        <x-category-card 
            title="Essential Comfort" 
            description="Soft Fabrics & Safe Materials"
            href="{{ route('home') }}" 
            color="from-green-200/60 via-lime-200/40 to-green-300/30 dark:from-green-900/50 dark:via-lime-900/30 dark:to-green-800/40"
            bgImage="/images/romper.avif" 
            textColor="text-green-50 dark:text-gray-100"
        />
    </div>
</div>
</section>
