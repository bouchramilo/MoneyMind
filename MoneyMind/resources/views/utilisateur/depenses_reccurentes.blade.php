<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mes Dépenses Récurrentes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- ********************************************************************************************************** --}}

                    <main class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                        {{-- <div class="mb-8">
                            <h1 class="text-2xl font-semibold text-gray-900">Mes Dépenses Récurrentes</h1>
                        </div> --}}

                        <div class="grid grid-cols-3 gap-6 mb-8">
                            <div class="bg-white rounded-lg shadow p-6">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Total Mensuel</h3>
                                <p class="text-3xl font-bold text-custom">1 250,00 €</p>
                            </div>
                            <div class="bg-white rounded-lg shadow p-6">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Nombre de Dépenses</h3>
                                <p class="text-3xl font-bold text-custom">8</p>
                            </div>
                            <div class="bg-white rounded-lg shadow p-6">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Prochain Paiement</h3>
                                <p class="text-3xl font-bold text-custom">15 Mars 2024</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-6 mb-8">
                            <div class="col-span-2 bg-white rounded-lg shadow">
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-6">
                                        <h2 class="text-lg font-medium text-gray-900">Liste des Dépenses</h2>
                                        <div class="flex space-x-4">
                                            <select class="border-gray-300 rounded-md text-sm">
                                                <option>Tous les types</option>
                                                <option>Mensuel</option>
                                                <option>Trimestriel</option>
                                                <option>Annuel</option>
                                            </select>
                                            <select class="border-gray-300 rounded-md text-sm">
                                                <option>Trier par date</option>
                                                <option>Trier par montant</option>
                                            </select>
                                        </div>
                                    </div>
                                    <table class="min-w-full">
                                        <thead>
                                            <tr class="border-b border-gray-200">
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Nom</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Montant</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Fréquence</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Prochain Paiement</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    Loyer</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">850,00 €
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mensuel
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">01/03/2024
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> <button
                                                        class="text-custom hover:text-custom-dark mr-3">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="text-red-600 hover:text-red-800"> <i
                                                            class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    Électricité
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">120,00 €
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mensuel
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15/03/2024
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> <button
                                                        class="text-custom hover:text-custom-dark mr-3">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="text-red-600 hover:text-red-800"> <i
                                                            class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="bg-white rounded-lg shadow p-6">
                                <h2 class="text-lg font-medium text-gray-900 mb-6">Répartition des Dépenses</h2>
                                <div id="chartDoughnut" class="h-64"></div>
                            </div>
                        </div>
                    </main>

                    <div id="modal"
                        class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
                        <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900">Nouvelle Dépense Récurrente</h3>
                            </div>
                            <form class="px-6 py-4">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Nom de la
                                        dépense</label> <input type="text"
                                        class="w-full border-gray-300 rounded-md shadow-sm" placeholder="Ex: Loyer">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Montant</label> <input
                                        type="number" class="w-full border-gray-300 rounded-md shadow-sm"
                                        placeholder="0,00 €">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Fréquence</label>
                                    <select class="w-full border-gray-300 rounded-md shadow-sm">
                                        <option>Mensuel</option>
                                        <option>Trimestriel</option>
                                        <option>Annuel</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Date de début</label>
                                    <input type="date" class="w-full border-gray-300 rounded-md shadow-sm">
                                </div>
                            </form>
                            <div class="px-6 py-4 bg-gray-50 flex justify-end space-x-4 rounded-b-lg">
                                <button
                                    class="!rounded-button px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">
                                    Annuler
                                </button>
                                <button
                                    class="!rounded-button px-4 py-2 text-sm font-medium text-white bg-custom hover:bg-custom-dark">
                                    Sauvegarder
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- ********************************************************************************************************** --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        const chart = echarts.init(document.getElementById('chartDoughnut'));
        const option = {
            animation: false,
            tooltip: {
                trigger: 'item'
            },
            series: [{
                type: 'pie',
                radius: ['40%', '70%'],
                avoidLabelOverlap: false,
                itemStyle: {
                    borderRadius: 10,
                    borderColor: '#fff',
                    borderWidth: 2
                },
                label: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    label: {
                        show: true,
                        fontSize: '20',
                        fontWeight: 'bold'
                    }
                },
                labelLine: {
                    show: false
                },
                data: [
                    { value: 850, name: 'Loyer' },
                    { value: 120, name: 'Électricité' },
                    { value: 80, name: 'Internet' },
                    { value: 200, name: 'Assurances' }
                ]
            }]
        };
        chart.setOption(option);
    </script>
</x-app-layout>
