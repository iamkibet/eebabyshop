@props([
    'title',
    'description',
    'href',
    'color',      // e.g. "from-pink-200/60 via-purple-200/40 to-pink-300/30"
    'bgImage',    // e.g. "/images/girlsclothes.webp"
    'textColor'   // e.g. "text-pink-50"
])

<div class="group relative h-96 overflow-hidden rounded-3xl shadow-xl transition-all duration-500 hover:scale-[1.02] hover:shadow-2xl dark:hover:shadow-gray-800/30"
     style="background-image: url('{{ asset($bgImage) }}'); background-size: cover; background-position: center;">
    <!-- Color Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-br opacity-60 transition-opacity duration-500 group-hover:opacity-80 {{ $color }} dark:opacity-70 dark:group-hover:opacity-90"></div>

    <!-- Dark Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/20 to-transparent dark:from-black/30 dark:via-black/15"></div>

    <!-- Content -->
    <div class="relative z-10 flex h-full flex-col justify-end p-8">
        <div class="space-y-4">
            <h2 class="text-3xl font-bold tracking-tight md:text-4xl drop-shadow-lg transition-transform duration-300 group-hover:-translate-y-1 {{ $textColor }} dark:text-gray-100">
                {{ $title }}
            </h2>

            <p class="text-lg font-medium text-gray-100 drop-shadow-md md:text-xl">
                {{ $description }}
            </p>

            <a href="{{ route('products') }}"
               class="inline-flex items-center gap-2 rounded-full bg-white/20 px-6 py-3 font-semibold text-white backdrop-blur-sm transition-all duration-300 hover:gap-3 hover:bg-white/30 hover:shadow-lg">
                <span class="inline-flex items-center gap-2">
                    Shop Now
                    <svg width="18" height="18" viewBox="0 0 15 15" fill="none" class="transition-transform duration-300 group-hover:translate-x-1">
                        <path d="M6.1584 3.13508C6.35985 2.94621 6.67627 2.95642 6.86514 3.15788L10.6151 7.15788C10.7954 7.3502 10.7954 7.64949 10.6151 7.84182L6.86514 11.8418C6.67627 12.0433 6.35985 12.0535 6.1584 11.8646C5.95694 11.6757 5.94673 11.3593 6.1356 11.1579L9.565 7.49985L6.1356 3.84182C5.94673 3.64036 5.95694 3.32394 6.1584 3.13508Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" />
                    </svg>
                </span>
            </a>
        </div>
    </div>
</div>
