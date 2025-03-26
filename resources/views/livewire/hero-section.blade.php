<section class="mx-auto max-w-7xl my-6 md:my-10 px-4 sm:px-6 lg:px-8">
    <!-- Hero Section -->
    <div class="relative isolate overflow-hidden lg:px-0">
        <!-- Decorative Elements (Optimized for Mobile) -->
        <div class="bg-gradient-radial absolute top-0 left-1/2 -z-10 h-[48rem] w-[100vw] -translate-x-1/2 rounded-full from-[#ffd6e0] to-70% opacity-30 blur-3xl dark:from-[#2c1a22] sm:h-[64rem] sm:w-[128rem]"></div>

        <div class="mx-auto grid max-w-2xl grid-cols-1 gap-y-12 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:items-center lg:gap-x-16 xl:gap-x-24">
            <!-- Text Content -->
            <div class="relative lg:order-first text-center lg:text-left">
                <h1 class="font-pacifo text-4xl leading-tight text-[#2c1a22] drop-shadow-sm xs:text-5xl sm:text-6xl sm:leading-tight lg:text-[clamp(3.5rem,5vw,4.5rem)] dark:text-[#ffe6ed]">
                    Where Tiny
                    <span class="relative inline-block text-[#ff6b8a]">
                        Dreams
                        <svg class="absolute -bottom-2 left-0 h-3 w-full text-[#ff3d6a] scale-90 sm:scale-100" viewBox="0 0 200 20">
                            <path d="M0 18.5Q100 0 200 18.5" fill="none" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </span>
                    Begin
                </h1>

                <p class="mt-4 text-base leading-7 text-gray-600 dark:text-gray-300 sm:text-lg sm:leading-8 md:mt-6">
                    Curated with love, our collection brings you the finest baby essentials.
                    <span class="mt-3 block text-sm font-semibold text-[#ff6b8a] sm:text-base md:mt-4">
                        Affordable • Best Quality • Unique
                    </span>
                </p>

                <!-- CTA Buttons (Stack on Mobile) -->
                <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:gap-4 md:mt-8">
                    <a href="{{ route('products') }}" 
                       class="group relative flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-[#ff6b8a] to-[#ff8e6b] px-5 py-3.5 font-semibold text-white shadow-lg shadow-[#ff6b8a]/20 transition-all hover:shadow-xl hover:shadow-[#ff6b8a]/30 sm:px-6 sm:py-4">
                        <span>🛍 Start Exploring</span>
                        <div class="h-3.5 w-3.5 rounded-full bg-white/20 transition-all group-hover:w-5 group-hover:bg-white/30 sm:h-4 sm:w-4"></div>
                    </a>

                    <a href="{{ route('products') }}"
                       class="flex items-center justify-center gap-2 rounded-xl border-2 border-[#ff6b8a] bg-transparent px-5 py-3.5 font-semibold text-[#ff6b8a] transition-all hover:bg-[#ff6b8a]/10 sm:px-6 sm:py-4">
                        ✨ New Arrivals
                        <span class="relative flex h-3 w-3">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-[#ff6b8a] opacity-75"></span>
                            <span class="relative inline-flex h-3 w-3 rounded-full bg-[#ff6b8a]"></span>
                        </span>
                    </a>
                </div>
            </div>

            <!-- Image Section (Optimized Aspect Ratio) -->
            <div class="relative lg:order-last lg:pt-8">
                <div class="animate-float relative aspect-square w-full max-w-[560px] lg:ml-auto">
                    <img src="/images/babyhero.svg" alt="Happy Baby"
                         class="h-full w-full object-contain"
                         loading="eager"
                         fetchpriority="high"
                         width="560"
                         height="560">
                    <div class="absolute -top-6 -left-6 h-24 w-24 rounded-full bg-[#ffd6e0] blur-3xl dark:bg-[#2c1a22] sm:-top-8 sm:-left-8 sm:h-32 sm:w-32"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Grid with Responsive Breakpoints -->
    <div class="mx-auto my-16 overflow-hidden sm:my-20 lg:my-24">
        <div class="grid auto-rows-fr gap-6 sm:gap-8 md:grid-cols-2 lg:grid-cols-3">
            <x-category-card 
                title="Little Princesses" 
                description="Dreamy Outfits & Accessories"
                href="{{ route('home') }}" 
                color="from-pink-200/60 via-purple-200/40 to-pink-300/30 dark:from-pink-900/50 dark:via-purple-900/30 dark:to-pink-800/40"
                bgImage="/images/girlsclothes.webp" 
                textColor="text-pink-50 dark:text-gray-100"
                class="aspect-[1.5/1] sm:aspect-[1.25/1] lg:aspect-square"
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