<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mes Objectifs d\'Épargne') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- ********************************************************************************************************** --}}

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                        <div class="bg-white rounded-lg shadow p-6">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Total Épargné</h2>
                            <div class="flex items-baseline">
                                <span class="text-4xl font-bold text-custom">15 750€</span>
                                <span class="ml-2 text-sm text-gray-500">/ 20 000€</span>
                            </div>
                            <div class="mt-4">
                                <div class="relative pt-1">
                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200">
                                        <div
                                            class="w-[78.75%] shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-600">
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600 mt-2">78.75% de l'objectif atteint</p>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow p-6">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Objectif Mensuel</h2>
                            <form class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Montant mensuel
                                        souhaité</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">€</span>
                                        </div>
                                        <input type="text"
                                            class=" block w-full pl-7 pr-12 sm:text-sm border-gray-300"
                                            value="500">
                                    </div>
                                </div>
                                <button type="submit"
                                    class=" w-full bg-emerald-600 text-white px-4 py-2 text-sm font-medium hover:bg-emerald-600">
                                    Mettre à jour
                                </button>
                            </form>
                        </div>

                        <div class="bg-white rounded-lg shadow p-6">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Progression Annuelle</h2>
                            <div id="yearlyProgress" class="h-48"></div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="bg-white rounded-lg shadow">
                            <div class="p-6">
                                <h2 class="text-lg font-semibold text-gray-900 mb-4">Mes Objectifs</h2>
                                <div class="space-y-6">
                                    <div class="border rounded-lg p-4">
                                        <div class="flex justify-between items-start mb-2">
                                            <div>
                                                <h3 class="font-medium text-gray-900">Achat Immobilier</h3>
                                                <p class="text-sm text-gray-500">Échéance: Décembre 2024</p>
                                            </div>
                                            <div class="flex space-x-2">
                                                <button class=" p-2 text-gray-400 hover:text-gray-500">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <button class=" p-2 text-gray-400 hover:text-gray-500">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="relative pt-1">
                                            <div class="flex mb-2 items-center justify-between">
                                                <div>
                                                    <span class="text-xs font-semibold inline-block text-custom"> 65%
                                                    </span>
                                                </div>
                                                <div class="text-right">
                                                    <span class="text-xs font-semibold inline-block text-gray-600"> 13
                                                        000€ / 20
                                                        000€
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200">
                                                <div
                                                    class="w-[65%] shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-600">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border rounded-lg p-4">
                                        <div class="flex justify-between items-start mb-2">
                                            <div>
                                                <h3 class="font-medium text-gray-900">Voyage au Japon</h3>
                                                <p class="text-sm text-gray-500">Échéance: Juillet 2024</p>
                                            </div>
                                            <div class="flex space-x-2">
                                                <button class=" p-2 text-gray-400 hover:text-gray-500">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <button class=" p-2 text-gray-400 hover:text-gray-500">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="relative pt-1">
                                            <div class="flex mb-2 items-center justify-between">
                                                <div>
                                                    <span class="text-xs font-semibold inline-block text-custom"> 85%
                                                    </span>
                                                </div>
                                                <div class="text-right">
                                                    <span class="text-xs font-semibold inline-block text-gray-600"> 2
                                                        550€ / 3 000€
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200">
                                                <div
                                                    class="w-[85%] shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-600">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button
                                        class=" w-full border-2 border-custom text-custom px-4 py-2 text-sm font-medium hover:bg-emerald-600/10">
                                        <i class="fas fa-plus mr-2"></i>Ajouter un objectif
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow">
                            <div class="p-6">
                                <h2 class="text-lg font-semibold text-gray-900 mb-4">Historique des Transactions</h2>
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between py-3 border-b">
                                        <div>
                                            <p class="font-medium text-gray-900">Dépôt mensuel</p>
                                            <p class="text-sm text-gray-500">15 Mars 2024</p>
                                        </div> <span class="text-green-600 font-medium">+500€</span>
                                    </div>
                                    <div class="flex items-center justify-between py-3 border-b">
                                        <div>
                                            <p class="font-medium text-gray-900">Dépôt exceptionnel</p>
                                            <p class="text-sm text-gray-500">1 Mars 2024</p>
                                        </div>
                                        <span class="text-green-600 font-medium">+1000€</span>
                                    </div>
                                    <div class="flex items-center justify-between py-3 border-b">
                                        <div>
                                            <p class="font-medium text-gray-900">Dépôt mensuel</p>
                                            <p class="text-sm text-gray-500">15 Février 2024</p>
                                        </div>
                                        <span class="text-green-600 font-medium">+500€</span>
                                    </div>
                                    <div class="flex items-center justify-between py-3">
                                        <div>
                                            <p class="font-medium text-gray-900">Dépôt mensuel</p>
                                            <p class="text-sm text-gray-500">15 Janvier 2024</p>
                                        </div>
                                        <span class="text-green-600 font-medium">+500€</span>
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
        const yearlyProgressChart = echarts.init(document.getElementById('yearlyProgress'));
        const yearlyProgressOption = {
            animation: false,
            tooltip: {
                trigger: 'axis'
            },
            xAxis: {
                type: 'category',
                data: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'],
                axisLine: {
                    lineStyle: {
                        color: '#E5E7EB'
                    }
                }
            },
            yAxis: {
                type: 'value',
                axisLine: {
                    lineStyle: {
                        color: '#E5E7EB'
                    }
                }
            },
            series: [{
                data: [1500, 2000, 3500, 4000, 4500, 5000, 6000, 7500, 9000, 11000, 13000, 15750],
                type: 'line',
                smooth: true,
                color: '#4F46E5'
            }]
        };
        yearlyProgressChart.setOption(yearlyProgressOption);

        window.addEventListener('resize', function() {
            yearlyProgressChart.resize();
        });
    </script>

</x-app-layout>
