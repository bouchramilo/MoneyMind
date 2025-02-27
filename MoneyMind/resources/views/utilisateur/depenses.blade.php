<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mes Dépenses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- ********************************************************************************************************** --}}

                    <div class="grid grid-cols-3 gap-8">
                        <div class="col-span-2">
                            <div class="bg-white rounded-lg shadow p-6 mb-8">
                                <h2 class="text-lg font-medium mb-6">Ajouter une dépense</h2>
                                <form class="space-y-4">
                                    <div class="grid grid-cols-3 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                                            <input type="text"
                                                class="w-full border-gray-300 focus:border-custom focus:ring-custom"
                                                placeholder="Nom de la dépense">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Montant
                                                (€)</label>
                                            <input type="text"
                                                class="w-full border-gray-300 focus:border-custom focus:ring-custom"
                                                placeholder="0.00">
                                        </div>
                                        <div>
                                            <label
                                                class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                                            <select
                                                class="w-full border-gray-300 focus:border-custom focus:ring-custom">
                                                <option>Alimentation</option>
                                                <option>Transport</option>
                                                <option>Logement</option>
                                                <option>Loisirs</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit"
                                            class="bg-emerald-600 dark:bg-emerald-400 text-white px-4 py-2 text-sm font-medium hover:bg-emerald-500 rounded-md">
                                            <i class="fas fa-plus mr-2"></i>Ajouter
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="bg-white rounded-lg shadow p-6">
                                <div class="flex items-center justify-between mb-6">

                                    <div class="flex space-x-4">
                                        <div class="flex items-center space-x-2">
                                            <input type="date"
                                                class="border-gray-300 focus:border-custom focus:ring-custom text-sm">
                                            <span class="text-gray-500">à</span>
                                            <input type="date"
                                                class="border-gray-300 focus:border-custom focus:ring-custom text-sm">
                                        </div>
                                        <select class="border-gray-300 focus:border-custom focus:ring-custom text-sm">
                                            <option>Toutes les catégories</option>
                                            <option>Alimentation</option>
                                            <option>Transport</option>
                                            <option>Logement</option>
                                            <option>Loisirs</option>
                                        </select>
                                        <button
                                            class="!rounded-button bg-gray-100 text-gray-700 px-4 py-2 text-sm font-medium hover:bg-gray-200">
                                            <i class="fas fa-filter mr-2"></i>Filtrer
                                        </button>
                                    </div>
                                </div>
                                <h2 class="text-lg font-medium">Liste des dépenses (15)</h2>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full">
                                        <thead>
                                            <tr class="border-b border-gray-200">
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Date</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Nom</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Montant</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Catégorie</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">15/03/2024
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Courses
                                                    Carrefour</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">89,50 €
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"> <span
                                                        class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">Alimentation</span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> <button
                                                        class="text-custom hover:text-custom/80 mr-3"><i
                                                            class="fas fa-edit"></i></button> <button
                                                        class="text-red-600 hover:text-red-800"><i
                                                            class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">14/03/2024
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Essence
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">65,00 €
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <span
                                                        class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Transport</span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> <button
                                                        class="text-custom hover:text-custom/80 mr-3"><i
                                                            class="fas fa-edit"></i></button> <button
                                                        class="text-red-600 hover:text-red-800"><i
                                                            class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-1">
                            <div class="bg-white rounded-lg shadow p-6 mb-8">
                                <h2 class="text-lg font-medium mb-6">Résumé du mois</h2>
                                <div class="space-y-4">
                                    <div class="flex justify-between items-center"> <span class="text-gray-600">Total
                                            des
                                            dépenses</span>
                                        <span class="text-2xl font-semibold text-gray-900">854,50 €</span>
                                    </div>
                                    <div class="h-px bg-gray-200"></div>
                                    <div>
                                        <h3 class="text-sm font-medium text-gray-700 mb-4">Par catégorie</h3>
                                        <div class="space-y-3">
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm text-gray-600">Alimentation</span>
                                                <span class="text-sm font-medium text-gray-900">320,50 €</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm text-gray-600">Transport</span>
                                                <span class="text-sm font-medium text-gray-900">185,00 €</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm text-gray-600">Logement</span>
                                                <span class="text-sm font-medium text-gray-900">250,00 €</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm text-gray-600">Loisirs</span>
                                                <span class="text-sm font-medium text-gray-900">99,00 €</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white rounded-lg shadow p-6">
                                <h2 class="text-lg font-medium mb-6">Répartition des dépenses</h2>
                                <div id="chart" class="h-64"></div>
                            </div>
                        </div>
                    </div>

                    {{-- ********************************************************************************************************** --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        var chartDom = document.getElementById('chart');
        var myChart = echarts.init(chartDom);
        var option = {
            animation: false,
            tooltip: {
                trigger: 'item'
            },
            series: [{
                type: 'pie',
                radius: '70%',
                data: [{
                        value: 320.5,
                        name: 'Alimentation'
                    },
                    {
                        value: 185,
                        name: 'Transport'
                    },
                    {
                        value: 250,
                        name: 'Logement'
                    },
                    {
                        value: 99,
                        name: 'Loisirs'
                    }
                ],
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        };
        myChart.setOption(option);
    </script>
</x-app-layout>
