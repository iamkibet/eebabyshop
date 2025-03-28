<x-layouts.guest>
    <x-slot:title>
        {{ $product->name }} - BabyShop
    </x-slot:title>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12 lg:py-16">
        <!-- Soft Breadcrumb -->
        <nav class="mb-6" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-sm font-medium text-slate-500 dark:text-slate-400">
                <li>
                    <a href="/" class="hover:text-slate-700 dark:hover:text-slate-300 transition-colors">Home</a>
                </li>
                <li><span class="mx-2">›</span></li>
                <li>
                    <a href="{{ route('products', $product->category) }}"
                        class="hover:text-slate-700 dark:hover:text-slate-300 transition-colors">
                        {{ $product->category }}
                    </a>
                </li>
                <li><span class="mx-2">›</span></li>
                <li class="text-slate-800 dark:text-slate-200 font-semibold">
                    {{ $product->name }}
                </li>
            </ol>
        </nav>

        <!-- Product Content -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 xl:gap-12">
            <!-- Image Gallery -->
            <div x-data="imageZoom()">
                <div
                    class="bg-white dark:bg-slate-800 p-4 rounded-2xl shadow-lg border border-slate-100 dark:border-slate-700/50">
                    <div class="aspect-w-1 aspect-h-1">
                        <!-- Bind the src attribute to mainImage -->
                        <img class="w-full h-full object-contain rounded-xl" :src="mainImage"
                            alt="{{ $product->name }}" loading="lazy">
                    </div>
                </div>

                @if ($product->productImages->count() > 0)
                    <div class="grid grid-cols-4 gap-3">
                        @foreach ($product->productImages as $image)
                            <button @click="switchImage('{{ asset('storage/' . $image->image_location) }}')"
                                class="group relative overflow-hidden rounded-lg border-2 border-transparent hover:border-slate-200 dark:hover:border-slate-600 transition-all">
                                <img class="w-full h-24 object-cover transform group-hover:scale-105 transition-transform"
                                    src="{{ asset('storage/' . $image->image_location) }}" alt="{{ $product->name }}"
                                    loading="lazy">
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Product Details -->
            <div class="space-y-6">
                <!-- Product Header -->
                <div class="space-y-4">
                    <h1 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-slate-100 leading-tight">
                        {{ $product->name }}
                    </h1>

                    <!-- Rating & Brand -->
                    <div class="flex items-center justify-between">
                        <div class="md:flex items-center space-x-3">
                            <div class="flex items-center space-x-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-6 h-6 {{ $i <= $product->productRatings()->average('rating') ? 'text-amber-400' : 'text-slate-300' }}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.728 1.602-.728 1.902 0l1.558 3.779 4.004.37c.85.079 1.194 1.139.572 1.724l-2.922 2.658.87 3.917c.181.816-.68 1.448-1.419 1.034L10 13.01l-3.614 1.96c-.74.414-1.6-.218-1.419-1.034l.87-3.917-2.922-2.658c-.622-.585-.278-1.645.572-1.724l4.004-.37L9.049 2.927z" />
                                    </svg>
                                @endfor
                            </div>
                            <span class="text-xs md:text-sm text-slate-500 dark:text-slate-400">
                                ({{ number_format($product->productReviews()->count()) }} reviews)
                            </span>
                        </div>
                        <span
                            class="px-3 py-1 bg-slate-100 dark:bg-slate-700 rounded-full text-xs md:text-sm font-medium">
                            {{ $product->brand }}
                        </span>
                    </div>
                </div>

                <!-- Pricing & Savings -->
                <div class="space-y-3 bg-slate-50 dark:bg-slate-800/50 p-4 rounded-xl">
                    <div class="flex items-baseline space-x-3">
                        <span class="text-xl lg:text-4xl font-bold text-slate-900 dark:text-slate-100">
                            {{ config('app.currency_symbol') }}{{ number_format($product->price, 2) }}
                        </span>
                        @if ($product->price * 1.29 > $product->price)
                            <span class="text-sm text-slate-500 dark:text-slate-400 line-through">
                                {{ config('app.currency_symbol') }}{{ number_format($product->price * 1.29, 2) }}
                            </span>
                            {{-- <span class="ml-2 px-2 py-1 bg-green-100 dark:bg-green-800/30 text-green-600 dark:text-green-400 rounded-full text-sm">
                            Save 20%
                        </span> --}}
                        @endif
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-slate-500 dark:text-slate-400">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Shipping from {{ $product->shipped_from }}</span>
                    </div>
                </div>

                <!-- Simplified Key Product Info -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <!-- Size -->
                    <div class="p-5 bg-white dark:bg-slate-800 rounded-lg border dark:border-slate-700/60">
                        <div class="text-sm text-slate-500 dark:text-slate-400 mb-2">Size</div>
                        <div class="flex items-center space-x-3">
                            <div
                                class="w-8 h-8 bg-blue-50 dark:bg-blue-900/20 rounded-md flex items-center justify-center">
                                <div class="w-4 h-[2px] bg-blue-500"></div>
                            </div>
                            <span class="text-lg font-medium text-slate-700 dark:text-slate-300">
                                {{ $product->size }}
                            </span>
                        </div>
                    </div>

                    <!-- Gender -->
                    <div class="p-5 bg-white dark:bg-slate-800 rounded-lg border dark:border-slate-700/60">
                        <div class="text-sm text-slate-500 dark:text-slate-400 mb-2">Gender</div>
                        <div class="flex items-center space-x-3">
                            <div
                                class="w-8 h-8 bg-pink-50 dark:bg-pink-900/20 rounded-md flex items-center justify-center">
                                <div class="w-3 h-3 bg-pink-500 rounded-full"></div>
                            </div>
                            <span class="text-lg font-medium text-slate-700 dark:text-slate-300">
                                {{ $product->gender }}
                            </span>
                        </div>
                    </div>

                    <!-- Availability -->
                    <div class="p-5 bg-white dark:bg-slate-800 rounded-lg border dark:border-slate-700/60">
                        <div class="text-sm text-slate-500 dark:text-slate-400 mb-2">Availability</div>
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <div
                                        class="w-2.5 h-2.5 rounded-full {{ $product->stock_quantity > 0 ? 'bg-green-500' : 'bg-red-500' }}">
                                    </div>
                                </div>
                            </div>
                            <span
                                class="text-lg font-medium {{ $product->stock_quantity > 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                {{ $product->stock_quantity > 0 ? $product->stock_quantity . ' Available' : 'Out of Stock' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Features -->
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-slate-900 dark:text-slate-100">Product Features</h3>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @foreach ($product->productFeatures as $feature)
                            <li class="flex items-start space-x-3 p-3 bg-slate-50 dark:bg-slate-800/50 rounded-lg">
                                <svg class="flex-shrink-0 w-5 h-5 text-pink-400 mt-1" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <div>
                                    <div class="font-medium text-slate-900 dark:text-slate-100">{{ $feature->title }}
                                    </div>
                                    @if ($feature->description)
                                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                                            {{ $feature->description }}</p>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- WhatsApp Action -->
                <div class="mt-6 px-2 sm:px-0">
                    <a href="https://wa.me/254742169017?text={{ urlencode("Hello! I'm interested in the {$product->name} - " . route('product.show', $product)) }}"
                        target="_blank" rel="noopener noreferrer"
                        aria-label="Contact via WhatsApp about {{ $product->name }}"
                        class="inline-flex items-center justify-center gap-2 md:gap-3 px-4 md:px-8 py-3 md:py-4
               bg-emerald-500 hover:bg-emerald-600 dark:bg-emerald-600 dark:hover:bg-emerald-700
               text-white text-sm md:text-base font-medium md:font-semibold 
               rounded-lg md:rounded-xl transition-all duration-200
               transform hover:scale-100 md:hover:scale-[1.02] 
               active:scale-95 shadow-md md:shadow-lg
               hover:shadow-emerald-200 dark:hover:shadow-none
               w-full sm:w-auto focus:outline-none focus:ring-2 focus:ring-emerald-500
               focus:ring-offset-2 dark:focus:ring-offset-gray-900">

                        <!-- Responsive SVG Icon -->
                        <svg class="w-5 h-5 md:w-6 md:h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>

                        <span class="whitespace-nowrap">
                            Chat About Product
                        </span>
                    </a>
                </div>

                <!-- Description -->
                <div class="prose max-w-none text-slate-600 dark:text-slate-300">
                    <h3 class="text-xl font-semibold text-slate-900 dark:text-slate-100 mb-4">Product Decription</h3>
                    <div class="space-y-4">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <section class="mt-16">
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm p-6 md:p-8">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-slate-100 mb-6">Reviews</h2>
                <div class="space-y-6">
                    @forelse($product->productReviews as $review)
                        <div class="border-b border-slate-100 dark:border-slate-700/50 pb-6 last:border-0">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-12 h-12 rounded-full bg-pink-100 dark:bg-slate-700 flex items-center justify-center">
                                        <span class="text-pink-500 dark:text-pink-400 font-medium">
                                            {{ substr($review->user->name, 0, 1) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="font-medium text-slate-900 dark:text-slate-100">
                                            {{ $review->user->name }}
                                        </div>
                                        <span class="text-sm text-slate-500 dark:text-slate-400">
                                            {{ $review->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    <div class="text-slate-600 dark:text-slate-300 leading-relaxed">
                                        {{ $review->review }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <div class="mb-4 text-slate-400">
                                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                            </div>
                            <p class="text-slate-500 dark:text-slate-400">
                                No reviews yet. Be the first to share your experience!
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <x-parts.similar-products :products="$similarProducts" class="mt-16" />
    </div>

    <!-- Image Zoom Script -->
    <script>
        function imageZoom() {
            return {

                mainImage: '{{ asset('storage/' . $product->image) }}',

                switchImage(newImage) {
                    this.mainImage = newImage;
                }
            }
        }
    </script>
</x-layouts.guest>
