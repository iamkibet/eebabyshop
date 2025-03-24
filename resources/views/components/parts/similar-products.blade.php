<div class="hidden md:mt-8 md:block px-4">
    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">People also bought</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($products as $tp)
            <x-cards.product-card :product="$tp" />
        @endforeach

    </div>
</div>
