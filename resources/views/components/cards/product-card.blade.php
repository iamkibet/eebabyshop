@props(['product'])

<div
    class="max-w-[280px] group my-3 border rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl w-80 bg-white dark:bg-slate-800 dark:border-slate-700 relative">
    <!-- Discount Badge & Wishlist Icon -->
    <div class="relative">
        <!-- Discount Badge -->
        <div class="absolute top-2 left-2 z-10">
            <span class="bg-white/70 text-blue-900 text-xs font-semibold px-3 py-1 rounded-full shadow-md">
                {{ $product->category }}
            </span>
        </div>

        <!-- Wishlist Icon -->
        <button data-tooltip-target="favourites-tooltip-{{ $product->id }}" type="button"
            class="absolute top-2 right-2 z-10 w-8 h-8 bg-white/90 backdrop-blur-sm rounded-full shadow-md flex items-center justify-center transition-colors duration-300 hover:bg-pink-100 dark:bg-slate-700/90 dark:hover:bg-slate-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 hover:text-pink-500 dark:text-slate-300"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
        </button>

        <!-- Product Image -->
        <a href="{{ route('product.show', $product->slug) }}" class="relative overflow-hidden cursor-pointer">
            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image"
                class="object-cover w-full h-64 transition-transform duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/20 to-transparent"></div>
        </a>
    </div>

    <!-- Product Details -->
    <div class="px-4 pb-4 pt-2">
        <!-- Product Name & Brand -->
        <div class="mb-2">
            <h3 class="text-gray-800 dark:text-slate-200 font-semibold text-lg truncate">
                {{ $product->name }}
            </h3>
            <p class="text-green-600 dark:text-green-400 text-xs font-medium uppercase tracking-wide mt-1">
                {{ $product->brand ?? 'Premium Brand' }}
            </p>
        </div>

        <!-- Ratings -->
        <div class="flex items-center space-x-2 mb-3">
            <div class="flex text-amber-400">
                @for ($i = 0; $i < 4; $i++)
                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.728 1.602-.728 1.902 0l1.558 3.779 4.004.37c.85.079 1.194 1.139.572 1.724l-2.922 2.658.87 3.917c.181.816-.68 1.448-1.419 1.034L10 13.01l-3.614 1.96c-.74.414-1.6-.218-1.419-1.034l.87-3.917-2.922-2.658c-.622-.585-.278-1.645.572-1.724l4.004-.37L9.049 2.927z" />
                    </svg>
                @endfor
                <svg class="w-4 h-4 fill-current text-gray-300 dark:text-slate-600" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <path
                        d="M9.049 2.927c.3-.728 1.602-.728 1.902 0l1.558 3.779 4.004.37c.85.079 1.194 1.139.572 1.724l-2.922 2.658.87 3.917c.181.816-.68 1.448-1.419 1.034L10 13.01l-3.614 1.96c-.74.414-1.6-.218-1.419-1.034l.87-3.917-2.922-2.658c-.622-.585-.278-1.645.572-1.724l4.004-.37L9.049 2.927z" />
                </svg>
            </div>
            <span class="text-sm text-gray-500 dark:text-slate-400">{{ $product->reviews }} Reviews</span>
        </div>

        <!-- Pricing  -->
        <div class="flex items-center justify-between gap-4 mt-3">
            <div class="flex flex-col">
                <div class="flex items-baseline gap-2">
                    <span class="text-blue-600 dark:text-blue-400 font-bold text-lg tracking-tight">
                        <span class="text-sm font-semibold" aria-hidden="true">Ksh</span>
                        {{ number_format($product->price, 2, '.', ',') }}
                    </span>
                    <span class="sr-only">KES</span>
                </div>
            </div>

            <a href="{{ route('product.show', $product->slug) }}"
                class="text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 transition-colors duration-200 underline-offset-4 hover:underline"
                wire:click.prevent>
                View details
                <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 ml-1 -mt-0.5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
        </div>
    </div>
</div>
