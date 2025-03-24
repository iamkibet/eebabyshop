<x-layouts.guest>
    <x-slot:title>
        {{ $product->name }} - BabyShop
    </x-slot:title>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12 lg:py-16">
        <!-- Breadcrumb -->
        <nav class="mb-6" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-sm">
                <li>
                    <a href="/"
                        class="text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-300">Home</a>
                </li>
                <li class="text-slate-500 dark:text-slate-400">/</li>
                <li class="text-slate-500 dark:text-slate-400">
                    {{ $product->category }}
                </li>
                <li class="text-slate-500 dark:text-slate-400">/</li>
                <li class="text-slate-800 dark:text-slate-200 font-medium" aria-current="page">
                    {{ $product->name }}
                </li>
            </ol>
        </nav>

        <!-- Product Content -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 xl:gap-12">
            <!-- Image Gallery -->
            <div class="space-y-4">
                <div class="bg-white dark:bg-slate-800 p-4 rounded-xl shadow-sm">
                    <img class="w-full h-auto max-h-[500px] object-contain rounded-lg"
                        src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" loading="lazy">
                </div>

                @if ($product->productImages->count() > 0)
                    <div class="grid grid-cols-4 gap-3">
                        @foreach ($product->productImages as $image)
                            <div
                                class="bg-white dark:bg-slate-800 p-2 rounded-lg shadow-sm cursor-pointer hover:shadow-md transition-shadow">
                                <img class="w-full h-24 object-cover rounded-md"
                                    src="{{ asset('storage/' . $image->image_location) }}" alt="{{ $product->name }}"
                                    loading="lazy">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Product Details -->
            <div class="space-y-6">
                <!-- Product Header -->
                <div class="space-y-3">
                    <h1 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-slate-100">
                        {{ $product->name }}
                    </h1>

                    <!-- Rating -->
                    <div class="flex items-center space-x-2">
                        <div class="flex items-center space-x-1">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $i <= $product->productRatings()->average('rating') ? 'text-yellow-400' : 'text-slate-300' }}"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.728 1.602-.728 1.902 0l1.558 3.779 4.004.37c.85.079 1.194 1.139.572 1.724l-2.922 2.658.87 3.917c.181.816-.68 1.448-1.419 1.034L10 13.01l-3.614 1.96c-.74.414-1.6-.218-1.419-1.034l.87-3.917-2.922-2.658c-.622-.585-.278-1.645.572-1.724l4.004-.37L9.049 2.927z" />
                                </svg>
                            @endfor
                        </div>
                        <span class="text-sm text-slate-500 dark:text-slate-400">
                            ({{ $product->productReviews()->count() }} reviews)
                        </span>
                    </div>
                </div>

                <!-- Pricing -->
                <div class="space-y-2">
                    <div class="text-3xl font-bold text-slate-900 dark:text-slate-100">
                        {{ config('app.currency_symbol') }} {{ number_format($product->price, 2) }}
                    </div>
                    @if ($product->price * 1.29 > $product->price)
                        <div class="text-sm text-slate-500 dark:text-slate-400">
                            <span class="line-through">{{ config('app.currency_symbol') }}
                                {{ number_format($product->price * 1.29, 2) }}</span>
                            <span class="ml-2 text-green-600 font-medium">Save 20%</span>
                        </div>
                    @endif
                </div>

                <!-- Product Meta -->
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div class="space-y-1">
                        <div class="text-slate-500 dark:text-slate-400">Brand</div>
                        <div class="font-medium text-slate-900 dark:text-slate-100">{{ $product->brand }}</div>
                    </div>
                    <div class="space-y-1">
                        <div class="text-slate-500 dark:text-slate-400">Availability</div>
                        <div
                            class="font-medium {{ $product->stock_quantity > 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ $product->stock_quantity > 0 ? 'In Stock' : 'Out of Stock' }}
                        </div>
                    </div>
                    <div class="space-y-1">
                        <div class="text-slate-500 dark:text-slate-400">Category</div>
                        <div class="font-medium text-slate-900 dark:text-slate-100">{{ $product->category }}</div>
                    </div>
                    <div class="space-y-1">
                        <div class="text-slate-500 dark:text-slate-400">Shipping</div>
                        <div class="font-medium text-slate-900 dark:text-slate-100">{{ $product->shipped_from }}</div>
                    </div>
                </div>

                <!-- Features -->
                <div class="space-y-3">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Key Features</h3>
                    <ul class="space-y-2 text-sm text-slate-600 dark:text-slate-300">
                        @foreach ($product->productFeatures as $feature)
                            <li class="flex items-start space-x-2">
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>{{ $feature->title }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <button
                        class="flex-1 flex items-center justify-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Add to Cart
                    </button>

                    <a href="https://wa.me/PHONE_NUMBER?text=Check%20out%20this%20product:%20{{ urlencode($product->name) }}%20-%20{{ urlencode(route('product.show', $product)) }}"
                        class="flex-1 flex items-center justify-center gap-2 px-6 py-3 bg-white border border-slate-200 hover:bg-slate-50 text-slate-900 font-medium rounded-lg transition-colors dark:bg-slate-800 dark:border-slate-700 dark:hover:bg-slate-700 dark:text-slate-100"
                        target="_blank" rel="noopener">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                        Share via WhatsApp
                    </a>
                </div>

                <!-- Description -->
                <div class="prose max-w-none text-slate-600 dark:text-slate-300">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Description</h3>
                    <p>{{ $product->description }}</p>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <section id="reviews" class="mt-12">
            <h2 class="text-2xl font-bold text-slate-900 dark:text-slate-100 mb-6">Customer Reviews</h2>
            <div class="space-y-6">
                @forelse($product->productReviews as $review)
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow-sm">
                        <div class="flex items-center space-x-3 mb-3">
                            <div
                                class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-700 flex items-center justify-center">
                                <span
                                    class="text-slate-600 dark:text-slate-300 font-medium">{{ substr($review->user->name, 0, 1) }}</span>
                            </div>
                            <div>
                                <div class="font-medium text-slate-900 dark:text-slate-100">{{ $review->user->name }}
                                </div>
                                <div class="text-sm text-slate-500 dark:text-slate-400">
                                    {{ $review->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                        <div class="text-slate-600 dark:text-slate-300">{{ $review->review }}</div>
                    </div>
                @empty
                    <div class="text-center text-slate-500 dark:text-slate-400 py-6">
                        No reviews yet. Be the first to review this product!
                    </div>
                @endforelse
            </div>
        </section>

        <!-- Similar Products -->
        <x-parts.similar-products :products="$similarProducts" class="mt-12" />
    </div>
</x-layouts.guest>
