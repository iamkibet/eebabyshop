<x-layouts.guest>
    <x-slot:title>
        Product List
    </x-slot:title>

    <section class="max-w-7xl mx-auto px-4 py-8 md:py-12 lg:py-20">
        <div
            class="border-b bg-gradient-to-r from-[#fff0f4] to-[#1940de27] dark:bg-gradient-to-r dark:from-[#1a0a0a] dark:to-[#0d1b33] px-6 py-8 shadow-sm sm:px-10 md:px-16 lg:px-20 transition-colors duration-300 dark:border-gray-800">
            <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-6 md:grid-cols-4">
                <h1
                    class="col-span-2 text-4xl font-[1000] text-gray-900 dark:text-gray-100 sm:text-5xl md:col-span-1 md:text-5xl">
                    Catalog
                </h1>
                <p class="col-span-2 text-lg leading-relaxed text-gray-700 dark:text-gray-300 sm:text-xl md:col-span-3">
                    Explore a wide selection of beautiful and colorful onesies, bodysuits, and baby grows for your
                    little one.
                </p>
            </div>
        </div>

        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <x-cards.product-card :product="$product" />
                @endforeach
            </div>
        </div>

        <div class="max-w-sm mt-6 py-2">
            {{ $products->links() }}
        </div>
    </section>
</x-layouts.guest>
