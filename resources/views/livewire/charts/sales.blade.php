<div wire:ignore
    class="grid lg:grid-cols-3 gap-6 items-center mt-6 py-6 px-4 rounded-lg">
    <!-- Left Column -->
    <div class="lg:col-span-2">
        <div class="lg:col-span-2 space-y-6">
            <div class="flex justify-between items-center">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white">Sales Overview</h3>
                <select id="select-year" wire:model.live="year" wire:change="updateChart"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a year</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>
            </div>
            <div class="rounded-lg p-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">
                    <span x-text="$wire.year"></span> Revenue:
                    <span class="text-orange-500 dark:text-orange-400 font-bold">
                        Ksh <span x-text="$wire.totalPerYear"></span>
                    </span>
                </h3>
                <div class="relative w-full h-80">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column -->
    <div class="lg:col-span-1 space-y-6">
        <!-- Revenue Card -->
        <div class="p-6 bg-white dark:bg-gray-800 rounded-xl">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-green-100 dark:bg-green-900/20 rounded-lg">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Total Revenue</p>
                    <p class="text-2xl font-bold text-green-600 dark:text-green-400">
                        {{ config('app.currency_symbol') }}{{ number_format($revenue, 2) }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Products Card -->
        <div class="p-6 bg-white dark:bg-gray-800 rounded-xl">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-blue-100 dark:bg-blue-900/20 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-600 dark:text-gray-300">Products Overview</p>
                    <div class="flex items-center justify-between">
                        <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">{{ $productsCount }}</p>
                        <span
                            class="px-2 py-1 text-sm bg-blue-100 text-blue-800 rounded-full dark:bg-blue-900/30 dark:text-blue-400">
                            {{ number_format(($purchasedProducts / $productsCount) * 100, 1) }}%
                        </span>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">
                        {{ $purchasedProducts }} purchased items
                    </p>
                </div>
            </div>
        </div>

        <!-- Top Products -->
        <div class="p-6 bg-white dark:bg-gray-800 rounded-xl">
            <h4 class="text-lg font-bold mb-4">Top Products</h4>
            <x-parts.top-products :$topProducts />
        </div>
    </div>

    @script
        <script>
            let orderCountPerMonth = $wire.orderCountPerMonth;
            let months = $wire.months;
            let suggestedMax = $wire.maxChartBarValue;

            const ctx = document.getElementById('salesChart');
            darkMode = JSON.parse(localStorage.getItem('darkMode'));

            let config = {
                type: 'bar',
                data: {
                    labels: months,
                    datasets: [{
                        label: '# of Orders Per Month',
                        data: orderCountPerMonth,
                        borderWidth: 0,
                        borderColor: darkMode ? '#475569' : '#f5f5f4',
                        backgroundColor: darkMode ? '#fb923c' : '#ea580c',
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMin: 1,
                            suggestedMax: suggestedMax
                        }
                    },
                    plugins: {
                        customCanvasBackgroundColor: {
                            'color': 'lightGreen'
                        }
                    }
                },
                plugins: [{
                    id: 'customCanvasBackgroundColor',
                    beforeDraw: (chart, args, options) => {
                        const {
                            ctx
                        } = chart;
                        ctx.save();
                        ctx.globalCompositeOperation = 'destination-over';
                        ctx.fillStyle = options.color || '#99ffff';
                        ctx.fillRect(0, 0, chart.width, chart.height);
                        ctx.borderRadius = options.borderRadius || 2
                        ctx.restore();
                    }
                }]
            }

            let salesChart = new Chart(ctx, config);

            Livewire.on('update-sales-chart', () => {
                if (window.salesChart) {
                    salesChart.destroy();
                }

                config.data.labels = $wire.months;
                config.data.datasets[0].data = $wire.orderCountPerMonth;
                config.options.scales.y.suggestedMax = suggestedMax;

                salesChart = new Chart(ctx, config)
            });
        </script>
    @endscript
</div>
