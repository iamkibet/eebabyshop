<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-4">
            <div
                class="group relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 transition-all dark:border-neutral-800 dark:bg-neutral-900 hover:border-neutral-300 dark:hover:border-neutral-700">
                <!-- Icon Container -->
                <div class="mb-4 flex size-12 items-center justify-center rounded-lg bg-blue-100/50 dark:bg-blue-900/20">
                    <svg class="size-6 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </div>

                <!-- Content -->
                <div class="space-y-3">
                    <!-- Title -->
                    <h3 class="text-sm font-semibold uppercase tracking-wide text-neutral-600 dark:text-neutral-400">
                        Registered Users
                    </h3>

                    <!-- Main Count -->
                    <div class="flex items-baseline gap-3">
                        <p class="text-3xl font-bold text-blue-600 dark:text-blue-400">
                            {{ number_format($usersCount, 0) }}
                        </p>
                        <!-- Percentage Badge -->
                        <span
                            class="flex items-center gap-1 rounded-full bg-lime-100 px-2.5 py-1 text-sm font-medium text-lime-800 dark:bg-lime-800/30 dark:text-lime-400">
                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $customers ? number_format(($customers / $usersCount) * 100, 1) : 0 }}%
                        </span>
                    </div>

                    <!-- Customer Breakdown -->
                    <div class="flex items-center justify-between text-sm">
                        <p class="text-neutral-600 dark:text-neutral-400">
                            <span class="font-medium text-neutral-800 dark:text-neutral-200">Active Customers</span>
                            <span class="ml-2">{{ number_format($customers) }}</span>
                        </p>

                    </div>
                </div>

                <!-- Hover Effect Background -->
                <div
                    class="absolute inset-0 -z-10 bg-gradient-to-br from-blue-50/50 to-transparent opacity-0 transition-opacity group-hover:opacity-100 dark:from-blue-900/20">
                </div>
            </div>
            <div
                class="group relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 transition-all dark:border-neutral-800 dark:bg-neutral-900 hover:border-neutral-300 dark:hover:border-neutral-700">
                <!-- Icon Container -->
                <div
                    class="mb-4 flex size-12 items-center justify-center rounded-lg bg-purple-100/50 dark:bg-purple-900/20">
                    <svg class="size-6 text-purple-600 dark:text-purple-400" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 22h14" />
                        <path d="M5 2h14" />
                        <path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22" />
                        <path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2" />
                    </svg>
                </div>

                <!-- Content -->
                <div class="space-y-3">
                    <!-- Title -->
                    <h3 class="text-sm font-semibold uppercase tracking-wide text-neutral-600 dark:text-neutral-400">
                        Total Orders
                    </h3>

                    <!-- Main Count -->
                    <div class="flex items-baseline gap-3">
                        <p class="text-3xl font-bold text-purple-600 dark:text-purple-400">
                            {{ number_format($ordersCount, 0) }}
                        </p>
                        <!-- Percentage Badge -->
                        <span
                            class="flex items-center gap-1 rounded-full bg-amber-100 px-2.5 py-1 text-sm font-medium text-amber-800 dark:bg-amber-800/30 dark:text-amber-400">
                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $ordersCount ? number_format(($pendingOrders / $ordersCount) * 100, 1) : 0 }}%
                        </span>
                    </div>

                    <!-- Order Status Breakdown -->
                    <div class="flex items-center justify-between text-sm">
                        <p class="text-neutral-600 dark:text-neutral-400">
                            <span class="font-medium text-neutral-800 dark:text-neutral-200">Pending Orders</span>
                            <span class="ml-2">{{ number_format($pendingOrders) }}</span>
                        </p>

                    </div>
                </div>

                <!-- Hover Effect Background -->
                <div
                    class="absolute inset-0 -z-10 bg-gradient-to-br from-purple-50/50 to-transparent opacity-0 transition-opacity group-hover:opacity-100 dark:from-purple-900/20">
                </div>
            </div>
            <div
                class="group relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 transition-all dark:border-neutral-800 dark:bg-neutral-900 hover:border-neutral-300 dark:hover:border-neutral-700">
                <!-- Icon Container -->
                <div
                    class="mb-4 flex size-12 items-center justify-center rounded-lg bg-emerald-100/50 dark:bg-emerald-900/20">
                    <svg class="size-6 text-emerald-600 dark:text-emerald-400" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6" />
                        <path d="m12 12 4 10 1.7-4.3L22 16Z" />
                    </svg>
                </div>

                <!-- Content -->
                <div class="space-y-3">
                    <!-- Title -->
                    <h3 class="text-sm font-semibold uppercase tracking-wide text-neutral-600 dark:text-neutral-400">
                        Product Inventory
                    </h3>

                    <!-- Main Count -->
                    <div class="flex items-baseline gap-3">
                        <p class="text-3xl font-bold text-emerald-600 dark:text-emerald-400">
                            {{ number_format($productsCount, 0) }}
                        </p>
                        <!-- Percentage Badge -->
                        <span
                            class="flex items-center gap-1 rounded-full bg-cyan-100 px-2.5 py-1 text-sm font-medium text-cyan-800 dark:bg-cyan-800/30 dark:text-cyan-400">
                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $productsCount ? number_format(($stocked / $productsCount) * 100, 1) : 0 }}%
                        </span>
                    </div>

                    <!-- Stock Breakdown -->
                    <div class="flex items-center justify-between text-sm">
                        <p class="text-neutral-600 dark:text-neutral-400">
                            <span class="font-medium text-neutral-800 dark:text-neutral-200">In Stock</span>
                            <span class="ml-2">{{ number_format($stocked) }}</span>
                        </p>

                    </div>
                </div>

                <!-- Hover Effect Background -->
                <div
                    class="absolute inset-0 -z-10 bg-gradient-to-br from-emerald-50/50 to-transparent opacity-0 transition-opacity group-hover:opacity-100 dark:from-emerald-900/20">
                </div>
            </div>
            <div
                class="group relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 transition-all dark:border-neutral-800 dark:bg-neutral-900 hover:border-neutral-300 dark:hover:border-neutral-700">
                <!-- Icon Container -->
                <div
                    class="mb-4 flex size-12 items-center justify-center rounded-lg bg-rose-100/50 dark:bg-rose-900/20">
                    <svg class="size-6 text-rose-600 dark:text-rose-400" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12s2.545-5 7-5c4.454 0 7 5 7 5s-2.546 5-7 5c-4.455 0-7-5-7-5z" />
                        <path d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        <path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2" />
                        <path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2" />
                    </svg>
                </div>

                <!-- Content -->
                <div class="space-y-3">
                    <!-- Title -->
                    <h3 class="text-sm font-semibold uppercase tracking-wide text-neutral-600 dark:text-neutral-400">
                        Blog Engagement
                    </h3>

                    <!-- Main Count -->
                    <div class="flex items-baseline gap-3">
                        <p class="text-3xl font-bold text-rose-600 dark:text-rose-400">
                            {{ number_format($pc = $posts->count(), 0) }}
                        </p>
                        <!-- Percentage Badge -->
                        <span
                            class="flex items-center gap-1 rounded-full bg-pink-100 px-2.5 py-1 text-sm font-medium text-pink-800 dark:bg-pink-800/30 dark:text-pink-400">
                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $pc ? number_format(($posts->where('views', '>', 0)->count() / $pc) * 100, 1) : 0 }}%
                        </span>
                    </div>

                    <!-- Engagement Breakdown -->
                    <div class="flex items-center justify-between text-sm">
                        <p class="text-neutral-600 dark:text-neutral-400">
                            <span class="font-medium text-neutral-800 dark:text-neutral-200">Total Views</span>
                            <span class="ml-2">{{ number_format($posts->sum('views'), 0) }}</span>
                        </p>

                    </div>
                </div>

                <!-- Hover Effect Background -->
                <div
                    class="absolute inset-0 -z-10 bg-gradient-to-br from-rose-50/50 to-transparent opacity-0 transition-opacity group-hover:opacity-100 dark:from-rose-900/20">
                </div>
            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border">
            <div class="max-w-6xl mx-auto">
                <livewire:charts.sales :ordersCount="$ordersCount" :productsCount="$productsCount" :$topProducts :$purchasedProducts />
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Left Column: Top Posts -->
                <div class="md:col-span-2 max-w-3xl mt-6 lg:mt-10 grid gap-6 text-slate-900 dark:text-slate-100">
                    <section class="py-12 px-4 bg-slate-200 dark:bg-slate-700 rounded-lg">
                        <header>
                            <h2 class="py-2 font-bold text-3xl text-creator-primary">Top Posts</h2>
                        </header>
                        <nav aria-label="Top Posts">
                            <ul class="divide-y divide-slate-300 dark:divide-slate-600">
                                @foreach ($posts->take(5) as $post)
                                    <li class="py-3 sm:pb-4">
                                        <a href="{{ route('post.show', $post->slug) }}"
                                            class="flex flex-col md:flex-row items-center md:justify-between space-y-1 md:space-y-0 p-2 rounded hover:bg-slate-300 dark:hover:bg-slate-600 transition-colors duration-200">
                                            <div class="w-full">
                                                <p class="text-sm text-blue-600 dark:text-blue-500 hover:underline">
                                                    {{ $post->title }}
                                                </p>
                                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                                    {{ $post->category->name }}
                                                </p>
                                            </div>
                                            <div
                                                class="text-sm md:text-base font-medium text-gray-900 dark:text-white">
                                                {{ number_format($post->views, 0) }} <span
                                                    class="text-xs font-light">views</span>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </section>
                </div>

                <!-- Right Column: Stats & New Users -->
                <div class="md:col-span-1 mt-6 lg:mt-10 grid gap-6 text-slate-900 dark:text-slate-100">
                    <!-- Messages Card -->
                    <x-cards.simple-stats-card title="Messages">
                        <x-slot:svg>
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8.891 15.107 15.11 8.89m-5.183-.52h.01m3.089 7.254h.01M14.08 3.902a2.849 2.849 0 0 0 2.176.902 2.845 2.845 0 0 1 2.94 2.94 2.849 2.849 0 0 0 .901 2.176 2.847 2.847 0 0 1 0 4.16 2.848 2.848 0 0 0-.901 2.175 2.843 2.843 0 0 1-2.94 2.94 2.848 2.848 0 0 0-2.176.902 2.847 2.847 0 0 1-4.16 0 2.85 2.85 0 0 0-2.176-.902 2.845 2.845 0 0 1-2.94-2.94 2.848 2.848 0 0 0-.901-2.176 2.848 2.848 0 0 1 0-4.16 2.849 2.849 0 0 0 .901-2.176 2.845 2.845 0 0 1 2.941-2.94 2.849 2.849 0 0 0 2.176-.901 2.847 2.847 0 0 1 4.159 0Z" />
                            </svg>
                        </x-slot:svg>
                        <h3 class="text-xl font-medium text-green-600 dark:text-green-500">
                            {{ number_format($messages->count(), 0) }}
                        </h3>
                    </x-cards.simple-stats-card>

                    <!-- New Users Section -->
                    <section>
                        <header>
                            <h4 class="py-2 font-semibold xl:text-xl">New Users</h4>
                        </header>
                        <div class="mt-1">
                            <x-cards.users-list :$users />
                        </div>
                    </section>
                </div>
            </div>


        </div>
    </div>
    @pushonce('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endpushonce
</x-layouts.app>
