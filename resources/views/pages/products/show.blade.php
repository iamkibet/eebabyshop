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
            <div class="space-y-4">
                <div
                    class="bg-white dark:bg-slate-800 p-4 rounded-2xl shadow-lg border border-slate-100 dark:border-slate-700/50">
                    <div class="aspect-w-1 aspect-h-1">
                        <img class="w-full h-full object-contain rounded-xl"
                            src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" loading="lazy"
                            x-data="imageZoom">
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
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center space-x-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-6 h-6 {{ $i <= $product->productRatings()->average('rating') ? 'text-amber-400' : 'text-slate-300' }}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.728 1.602-.728 1.902 0l1.558 3.779 4.004.37c.85.079 1.194 1.139.572 1.724l-2.922 2.658.87 3.917c.181.816-.68 1.448-1.419 1.034L10 13.01l-3.614 1.96c-.74.414-1.6-.218-1.419-1.034l.87-3.917-2.922-2.658c-.622-.585-.278-1.645.572-1.724l4.004-.37L9.049 2.927z" />
                                    </svg>
                                @endfor
                            </div>
                            <span class="text-sm text-slate-500 dark:text-slate-400">
                                ({{ number_format($product->productReviews()->count()) }} reviews)
                            </span>
                        </div>
                        <span class="px-3 py-1 bg-slate-100 dark:bg-slate-700 rounded-full text-sm font-medium">
                            {{ $product->brand }}
                        </span>
                    </div>
                </div>

                <!-- Pricing & Savings -->
                <div class="space-y-3 bg-slate-50 dark:bg-slate-800/50 p-4 rounded-xl">
                    <div class="flex items-baseline space-x-3">
                        <span class="text-4xl font-bold text-slate-900 dark:text-slate-100">
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

                <!-- Key Product Info -->
                <div class="grid grid-cols-3 gap-4">
                    <div
                        class="p-4 bg-white dark:bg-slate-800 rounded-xl border border-slate-100 dark:border-slate-700/50">
                        <div class="text-slate-500 dark:text-slate-400 mb-1">Size</div>
                        <span class="text-xl">{{ $product->size }}</span>
                    </div>
                    <div
                        class="p-4 bg-white dark:bg-slate-800 rounded-xl border border-slate-100 dark:border-slate-700/50">
                        <div class="text-slate-500 dark:text-slate-400 mb-1">Gender</div>
                        <div class="flex items-center space-x-2 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>

                            <span>{{ $product->gender }}</span>
                        </div>
                    </div>
                    <div
                        class="p-4 bg-white dark:bg-slate-800 rounded-xl border border-slate-100 dark:border-slate-700/50">
                        <div class="text-slate-500 dark:text-slate-400 mb-1">Availability</div>
                        <div class="flex items-center space-x-2">
                            <div
                                class="w-2 h-2 rounded-full {{ $product->stock_quantity > 0 ? 'bg-green-400' : 'bg-red-400' }}">
                            </div>
                            <span
                                class="font-medium {{ $product->stock_quantity > 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $product->stock_quantity > 0 ? 'In Stock (' . $product->stock_quantity . ' available)' : 'Out of Stock' }}
                            </span>
                        </div>
                    </div>
                    {{-- <div class="p-4 bg-white dark:bg-slate-800 rounded-xl border border-slate-100 dark:border-slate-700/50">
                        <div class="text-slate-500 dark:text-slate-400 mb-1">Returns</div>
                        <div class="flex items-center space-x-2 font-medium">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            <span>{{ $product->return_policy }} Days</span>
                        </div>
                    </div> --}}
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
                <div class="mt-6">
                    <a href="https://wa.me/254742169017?text={{ urlencode("Hello! I'm interested in the {$product->name} - " . route('product.show', $product)) }}"
                        target="_blank" rel="noopener"
                        class="flex items-center justify-center gap-3 px-8 py-4 bg-emerald-500 hover:bg-emerald-600 text-white font-semibold rounded-xl transition-all transform hover:scale-[1.02] shadow-lg shadow-emerald-100 dark:shadow-none">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <!-- WhatsApp SVG -->
                        </svg>
                        Chat About This Product
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
