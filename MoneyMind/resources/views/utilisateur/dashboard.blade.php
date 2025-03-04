<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- ********************************************************************************************************** --}}
                    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-12 lg:col-span-8">
                                <div class="bg-white rounded-lg shadow p-6 mb-6">
                                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Vue d'ensemble Financière</h2>
                                    <div id="mainChart" class="h-80"></div>
                                </div>

                                <div class="bg-white rounded-lg shadow p-6 mb-6">
                                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Suivi Budgétaire</h2>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="space-y-4">
                                            <div>
                                                <div class="flex justify-between mb-2">
                                                    <span class="text-sm font-medium text-gray-700">Alimentation</span>
                                                    <span class="text-sm font-medium text-gray-700">450€ / 600€</span>
                                                </div>
                                                <div class="relative pt-1">
                                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-green-100">
                                                        <div
                                                            class="w-3/4 shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="flex justify-between mb-2">
                                                    <span class="text-sm font-medium text-gray-700">Transport</span>
                                                    <span class="text-sm font-medium text-gray-700">180€ / 200€</span>
                                                </div>
                                                <div class="relative pt-1">
                                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-yellow-100">
                                                        <div
                                                            class="w-[90%] shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-yellow-500">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space-y-4">
                                            <div>
                                                <div class="flex justify-between mb-2"> <span
                                                        class="text-sm font-medium text-gray-700">Loisirs</span>
                                                    <span class="text-sm font-medium text-gray-700">250€ / 300€</span>
                                                </div>
                                                <div class="relative pt-1">
                                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-100">
                                                        <div
                                                            class="w-4/5 shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="flex justify-between mb-2">
                                                    <span class="text-sm font-medium text-gray-700">Shopping</span>
                                                    <span class="text-sm font-medium text-gray-700">320€ / 400€</span>
                                                </div>
                                                <div class="relative pt-1">
                                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-purple-100">
                                                        <div
                                                            class="w-4/5 shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-purple-500">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white rounded-lg shadow p-6">
                                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Transactions Récentes</h2>
                                    <div class="space-y-4">
                                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                            <div class="flex items-center">
                                                <i class="fas fa-shopping-cart text-gray-400 text-xl"></i>
                                                <div class="ml-4">
                                                    <p class="text-sm font-medium text-gray-900">Carrefour</p>
                                                    <p class="text-xs text-gray-500">18 Mars 2024</p>
                                                </div>
                                            </div>
                                            <span class="text-sm font-medium text-red-600">-85,30 €</span>
                                        </div>
                                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                            <div class="flex items-center"> <i
                                                    class="fas fa-train text-gray-400 text-xl"></i>
                                                <div class="ml-4">
                                                    <p class="text-sm font-medium text-gray-900">SNCF</p>
                                                    <p class="text-xs text-gray-500">17 Mars 2024</p>
                                                </div>
                                            </div>
                                            <span class="text-sm font-medium text-red-600">-47,00 €</span>
                                        </div>
                                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                            <div class="flex items-center">
                                                <i class="fas fa-building-columns text-gray-400 text-xl"></i>
                                                <div class="ml-4">
                                                    <p class="text-sm font-medium text-gray-900">Salaire</p>
                                                    <p class="text-xs text-gray-500">15 Mars 2024</p>
                                                </div>
                                            </div>
                                            <span class="text-sm font-medium text-green-600">+2450,00 €</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 lg:col-span-4 space-y-6">
                                <div class="bg-white rounded-lg shadow p-6">
                                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Objectifs d'Épargne</h2>
                                    <div class="space-y-4">
                                        <div>
                                            <div class="flex justify-between mb-2"> <span
                                                    class="text-sm font-medium text-gray-700">Vacances d'été</span>
                                                <span class="text-sm font-medium text-gray-700">1500€ / 2000€</span>
                                            </div>
                                            <div class="relative pt-1">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-custom">
                                                    <div style="width: 75%"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-custom">
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-xs text-gray-500 mt-1">Objectif: Août 2024</p>
                                        </div>
                                        <div>
                                            <div class="flex justify-between mb-2"> <span
                                                    class="text-sm font-medium text-gray-700">Nouveau PC</span>
                                                <span class="text-sm font-medium text-gray-700">800€ / 1200€</span>
                                            </div>
                                            <div class="relative pt-1">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-custom">
                                                    <div style="width: 66%"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-custom">
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-xs text-gray-500 mt-1">Objectif: Mai 2024</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white rounded-lg shadow p-6">
                                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Suggestions IA</h2>
                                    <div class="space-y-4">
                                        <div class="p-4 bg-blue-50 rounded-lg">
                                            <div class="flex items-start">
                                                <i class="fas fa-lightbulb text-blue-500 mt-1"></i>
                                                <div class="ml-3">
                                                    <p class="text-sm text-gray-900">
                                                        {{ $suggestions }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white rounded-lg shadow p-6">
                                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Liste de Souhaits</h2>
                                    <div class="space-y-4">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <img class="h-12 w-12 rounded-lg object-cover"
                                                    src="https://creatie.ai/ai/api/search-image?query=A modern smartphone displayed against a clean white background, showing its sleek design and premium features. The device is positioned at a slight angle to showcase its thin profile and high-quality finish.&width=200&height=200&orientation=squarish&flag=d79565d1-083f-49dc-8b75-f2a0a022c533"
                                                    alt="Smartphone">
                                                <div class="ml-3">
                                                    <p class="text-sm font-medium text-gray-900">iPhone 15 Pro</p>
                                                    <p class="text-xs text-gray-500">1299 €</p>
                                                </div>
                                            </div>
                                            <span class="text-xs text-gray-500">~4 mois</span>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center"> <img
                                                    class="h-12 w-12 rounded-lg object-cover"
                                                    src="https://creatie.ai/ai/api/search-image?query=A sleek and modern electric bike displayed against a clean white background. The bike features a contemporary design with integrated battery, showing its premium build quality and technological features.&width=200&height=200&orientation=squarish&flag=59afb97b-3b60-4860-bf99-17ae876ee1d4"
                                                    alt="Vélo électrique">
                                                <div class="ml-3">
                                                    <p class="text-sm font-medium text-gray-900">Vélo électrique</p>
                                                    <p class="text-xs text-gray-500">2499 €</p>
                                                </div>
                                            </div>
                                            <span class="text-xs text-gray-500">~8 mois</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ********************************************************************************************************** --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        const mainChart = echarts.init(document.getElementById('mainChart'));
        const option = {
            animation: false,
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: ['Revenus', 'Dépenses', 'Solde']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin']
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                    name: 'Revenus',
                    type: 'line',
                    data: [2500, 2500, 2500, 2700, 2700, 2700],
                    smooth: true,
                    lineStyle: {
                        color: '#10B981'
                    },
                    itemStyle: {
                        color: '#10B981'
                    }
                },
                {
                    name: 'Dépenses',
                    type: 'line',
                    data: [1800, 2100, 1900, 2200, 2000, 2100],
                    smooth: true,
                    lineStyle: {
                        color: '#EF4444'
                    },
                    itemStyle: {
                        color: '#EF4444'
                    }
                },
                {
                    name: 'Solde',
                    type: 'line',
                    data: [700, 400, 600, 500, 700, 600],
                    smooth: true,
                    lineStyle: {
                        color: '#4F46E5'
                    },
                    itemStyle: {
                        color: '#4F46E5'
                    }
                }
            ]
        };
        mainChart.setOption(option);
        window.addEventListener('resize', () => {
            mainChart.resize();
        });
    </script>
</x-app-layout>
