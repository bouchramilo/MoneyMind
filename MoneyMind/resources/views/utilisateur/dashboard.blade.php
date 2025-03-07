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
                                <div class="bg-white rounded-lg shadow p-6 mb-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="bg-emerald-50 rounded-lg p-6">
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">Salaire</h3>
                                        <p class="text-3xl font-bold text-emerald-600">{{ Auth::user()->salaire }} €</p>
                                    </div>
                                    <div class="bg-emerald-50 rounded-lg p-6">
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">Budget </h3>
                                        <p class="text-3xl font-bold text-green-600">{{ Auth::user()->Budjet }} €</p>
                                    </div>

                                </div>

                                <div class="bg-white rounded-lg shadow p-6 mb-6">
                                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Suivi Budgétaire</h2>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="bg-white rounded-lg shadow p-6">
                                            <h2 class="text-lg font-medium mb-6 ">Répartition des dépenses</h2>
                                            <div id="chart" class="h-64"></div>
                                        </div>
                                        <div class="bg-white rounded-lg shadow p-6">
                                            <h2 class="text-lg font-medium mb-6 ">Répartition des Dépenses
                                            </h2>
                                            <div id="chartDoughnut" class="h-64"></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="bg-white rounded-lg shadow p-6">
                                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Prochaine Paimements</h2>
                                    <div class="space-y-4">
                                        @foreach ($prochainPaiements as $prochainPaiement)
                                            <div class="flex items-center justify-between p-4 bg-emerald-50 rounded-lg">
                                                <div class="flex items-center">
                                                    <i
                                                        class="fa-solid fa-file-invoice-dollar text-gray-400 text-xl"></i>
                                                    <div class="ml-4">
                                                        <p class="text-sm font-medium text-gray-900">
                                                            {{ $prochainPaiement->nom }}</p>
                                                        <p class="text-xs text-gray-500">
                                                            {{ $prochainPaiement->date_reccurente }}</p>
                                                    </div>
                                                </div>
                                                <span
                                                    class="text-sm font-medium text-orange-600">{{ $prochainPaiement->prix }}
                                                    €</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 lg:col-span-4 space-y-6">
                                <div class="bg-white rounded-lg shadow p-6">
                                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Objectif d'Épargne</h2>
                                    <div class="space-y-4">
                                        <div>
                                            <div class="flex justify-between mb-2">
                                                <span
                                                    class="text-sm font-medium text-gray-700">{{ $obj_current->montant_actuel ?? 0 }}€
                                                    / {{ $obj_current->montant ?? 0 }}€</span>
                                            </div>
                                            <div class="relative pt-1">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-emerald-100">
                                                    <div style="width: {{ isset($obj_current) ? (($obj_current->montant_actuel ?? 0) / ($obj_current->montant ?? 1)) * 100 : 0 }}%"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-500">
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-xs text-gray-500 mt-1">
                                                Commencé à : {{ $obj_current->date_obj_debut ?? 'Non défini' }}
                                            </p>
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

                                        @foreach ($listeSouhaits as $wish)
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center">
                                                    <div class="ml-3">
                                                        <p class="text-sm font-medium text-gray-900">
                                                            {{ $wish->nom }}
                                                        </p>
                                                        <p class="text-xs text-gray-500">{{ $wish->prix }} €</p>
                                                    </div>
                                                </div>
                                                <span class="text-xs text-gray-500">
                                                    {{ $wish->created_at->diffForHumans() }}</span>
                                            </div>
                                        @endforeach
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
                data: [
                    @foreach ($depensesParCategorie as $depenseParCategorie)
                        {
                            value: {{ $depenseParCategorie->total }},
                            name: "{{ $depenseParCategorie->categorie->title }}"
                        },
                    @endforeach
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

    <script>
        const chart = echarts.init(document.getElementById('chartDoughnut'));
        const option2 = {
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
                    @foreach ($depensesReccParCategorie as $depenseParCategorie)
                        {
                            value: {{ $depenseParCategorie->total }},
                            name: "{{ $depenseParCategorie->categorie->title }}"
                        },
                    @endforeach
                ]
            }]
        };
        chart.setOption(option2);
    </script>
</x-app-layout>
