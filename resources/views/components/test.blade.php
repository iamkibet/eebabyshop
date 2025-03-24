<div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mt-6">
    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Left Column (Chart) -->
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
            <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4">
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

        <!-- Right Column (Statistics) -->
        <div class="space-y-6">
            <!-- Revenue Card -->
            <div class="bg-white dark:bg-gray-700 rounded-xl p-6 shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-green-100 dark:bg-green-900/20 rounded-lg">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Total Revenue</p>
                        <p class="text-2xl font-bold text-green-600 dark:text-green-400">
                            {{ config('app.currency_symbol') }}{{ number_format($revenue, 2) }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Products Card -->
            <div class="bg-white dark:bg-gray-700 rounded-xl p-6 shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-blue-100 dark:bg-blue-900/20 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Products Overview</p>
                        <div class="flex items-center justify-between">
                            <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">{{ $productsCount }}</p>
                            <span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full dark:bg-blue-900/30 dark:text-blue-400">
                                {{ number_format(($purchasedProducts / $productsCount) * 100, 1) }}%
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                            {{ $purchasedProducts }} purchased items
                        </p>
                    </div>
                </div>
            </div>

            <!-- Top Products -->
            <div class="bg-white dark:bg-gray-700 rounded-xl p-6 shadow-sm">
                <h4 class="text-lg font-bold mb-4 text-gray-800 dark:text-white">Top Products</h4>
                <x-parts.top-products :$topProducts />
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('livewire:load', function () {
    let orderCountPerMonth = @this.orderCountPerMonth;
    let months = @this.months;
    let suggestedMax = @this.maxChartBarValue;
    let darkMode = JSON.parse(localStorage.getItem('darkMode'));

    const ctx = document.getElementById('salesChart').getContext('2d');
    let salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: '# of Orders Per Month',
                data: orderCountPerMonth,
                backgroundColor: darkMode ? '#fb923c' : '#ea580c',
                borderColor: darkMode ? '#475569' : '#f5f5f4',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMin: 1,
                    suggestedMax: suggestedMax
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: darkMode ? '#fff' : '#000'
                    }
                }
            }
        }
    });

    Livewire.on('updateChart', (data) => {
        salesChart.data.labels = data.months;
        salesChart.data.datasets[0].data = data.orderCountPerMonth;
        salesChart.options.scales.y.suggestedMax = data.maxChartBarValue;
        salesChart.update();
    });
});
</script>
@endpush
