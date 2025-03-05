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

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">

                        <div class="bg-white rounded-lg shadow p-6">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Total Épargné</h2>
                            <div class="flex items-baseline">
                                <span
                                    class="text-4xl font-bold text-custom">{{ $progressions->last()->montant_epargne_actuel ?? 0 }}€</span>
                                <span class="ml-2 text-sm text-gray-500">/ {{ $objectif_current->montant ?? 0 }}€</span>
                            </div>
                            <div class="mt-4">
                                <div class="relative pt-1">
                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200">
                                        <div
                                            class="w-[{{ $progressions->last()->pourcentage_atteint ?? 0 }}%] shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-600">
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600 mt-2">
                                    {{ $progressions->last()->pourcentage_atteint ?? 0 }}%
                                    de l'objectif atteint</p>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow p-6">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Objectif Mensuel</h2>
                            <form action="{{ route('utilisateur.objectifs.store') }}" method="POST" class="space-y-4">
                                @csrf
                                @method('POST')
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Montant mensuel
                                        souhaité</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <x-text-input type="number" name="montant"
                                            class=" block w-full pl-7 pr-12 sm:text-sm border-gray-300"
                                            value="{{ $objectif_current->montant ?? 0 }}" />
                                    </div>
                                </div>
                                <button type="submit"
                                    class=" w-full px-4 py-2 text-sm font-medium rounded-xl text-white bg-emerald-600 dark:bg-emerald-500  hover:bg-emerald-700 dark:hover:bg-emerald-600  focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-emerald-500 dark:focus:ring-offset-gray-800  transition-colors duration-200">
                                    Mettre à jour
                                </button>
                            </form>
                        </div>


                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="bg-white rounded-lg shadow">
                            <div class="p-6">
                                <h2 class="text-lg font-semibold text-gray-900 mb-4">Mes Objectifs</h2>
                                <div class="space-y-6">

                                    @foreach ($objectifs as $objectif)
                                        <div class="border rounded-lg p-4">
                                            <div class="flex justify-between items-start mb-2">
                                                <div>
                                                    <h3 class="font-medium text-gray-900">
                                                        @if (($objectif->progressions->last()?->montant_epargne_actuel ?? 0) === $objectif->montant)
                                                            Complet
                                                        @else
                                                            En Cours
                                                        @endif
                                                    </h3>

                                                    <p class="text-sm text-gray-500">Commancé à :
                                                        {{ $objectif->date_obj_debut }}
                                                        @if ($objectif->date_obj_fin != null)
                                                        de
                                                            {{ $objectif->date_obj_fin }}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="relative pt-1">
                                                <div class="flex mb-2 items-center justify-between">
                                                    <div>
                                                        <span class="text-xs font-semibold inline-block text-custom">
                                                            {{ $objectif->progressions->last()?->pourcentage_atteint ?? '0' }}%

                                                        </span>
                                                    </div>
                                                    <div class="text-right">
                                                        <span class="text-xs font-semibold inline-block text-gray-600">
                                                            {{ $objectif->progressions->last()?->montant_epargne_actuel ?? 0 }}€
                                                            / {{ $objectif->montant }}€
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200">
                                                    <div
                                                        class="w-[{{ $objectif->progressions->last()?->pourcentage_atteint ?? '0' }}%] shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-600">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    {{-- <div class="border rounded-lg p-4">
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
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow">
                            <div class="bg-white rounded-lg shadow h-full p-6">
                                <h2 class="text-lg font-semibold text-gray-900 mb-4">Progression Annuelle</h2>
                                <div id="yearlyProgress" class="h-full"></div>
                            </div>
                        </div>
                    </div>

                    {{-- ********************************************************************************************************** --}}
                </div>
            </div>
        </div>
    </div>

    @if ($progressions->isNotEmpty())
        <script>
            const yearlyProgressChart = echarts.init(document.getElementById('yearlyProgress'));
            const yearlyProgressOption = {
                animation: false,
                tooltip: {
                    trigger: 'axis'
                },
                xAxis: {
                    type: 'category',
                    data: [
                        @foreach ($progressions as $progression)
                            '{{ date('Y-m-d', strtotime($progression->date_mise_a_jour)) }}',
                        @endforeach
                    ],
                    axisLine: {
                        lineStyle: {
                            color: '#999999'
                        }
                    }
                },
                yAxis: {
                    type: 'value',
                    axisLine: {
                        lineStyle: {
                            color: '#999999'
                        }
                    }
                },
                series: [{
                    data: [
                        @foreach ($progressions as $progression)
                            {{ $progression->montant_epargne_actuel }},
                        @endforeach
                    ],
                    type: 'line',
                    smooth: true,
                    color: '#00ff00'
                }]
            };
            yearlyProgressChart.setOption(yearlyProgressOption);

            window.addEventListener('resize', function() {
                yearlyProgressChart.resize();
            });
        </script>
    @endif

    {{-- <script>
        const yearlyProgressChart = echarts.init(document.getElementById('yearlyProgress'));
        const yearlyProgressOption = {
            animation: false,
            tooltip: {
                trigger: 'axis'
            },
            xAxis: {
                type: 'category',
                data: [
                    @foreach ($progressions as $progression)
                    {{ $progression->date_mise_a_jour }},
                    @endforeach
                ],
                axisLine: {
                    lineStyle: {
                        color: '#999999'
                    }
                }
            },
            yAxis: {
                type: 'value',
                axisLine: {
                    lineStyle: {
                        color: '#999999'
                    }
                }
            },
            series: [{
                data: [
                    @foreach ($progressions as $progression)
                    {{ $progression->montant_epargne_actuel }},
                    @endforeach
                ],
                type: 'line',
                smooth: true,
                color: '#00ff00'
            }]
        };
        yearlyProgressChart.setOption(yearlyProgressOption);

        window.addEventListener('resize', function() {
            yearlyProgressChart.resize();
        });
    </script> --}}

</x-app-layout>
