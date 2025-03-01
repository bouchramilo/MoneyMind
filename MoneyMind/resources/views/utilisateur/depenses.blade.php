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
                                <form class="space-y-4" method="POST"
                                    action="{{ route('utilisateur.depenses.store') }}">
                                    @csrf
                                    @method('POST')
                                    <div class="grid grid-cols-3 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                                            <x-text-input type="text" name="nom"
                                                class="w-full border-gray-300 focus:border-custom focus:ring-custom"
                                                placeholder="Nom de la dépense" />
                                            @error('nom')
                                                <div>
                                                    <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Montant
                                                (€)</label>
                                            <x-text-input type="text" name="prix"
                                                class="w-full border-gray-300 focus:border-custom focus:ring-custom"
                                                placeholder="0.00" />
                                            @error('prix')
                                                <div>
                                                    <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label
                                                class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                                            <select name="categorie_id"
                                                class="appearance-none relative block w-full pl-10 pr-3 py-3
                                              border border-gray-300 dark:border-gray-600 rounded-xl
                                              placeholder-gray-500 dark:placeholder-gray-400
                                              text-gray-900 dark:text-white
                                              bg-white dark:bg-gray-700
                                              focus:outline-none focus:ring-2 focus:ring-emerald-500
                                              focus:border-emerald-500 focus:z-10 sm:text-sm
                                              transition-colors duration-200">
                                                <option value="">Toutes les catégories</option>
                                                @foreach ($categories as $categorie)
                                                    <option value="{{ $categorie->id }}">{{ $categorie->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('categorie_id')
                                                <div>
                                                    <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                                                </div>
                                            @enderror
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
                                <div class="flex items-center justify-end mb-6">

                                    <div class="flex space-x-4">

                                        <select class="appearance-none relative block w-full pl-10 pr-3 py-2
                                              border border-gray-300 dark:border-gray-600 rounded-xl
                                              placeholder-gray-500 dark:placeholder-gray-400
                                              text-gray-900 dark:text-white
                                              bg-white dark:bg-gray-700
                                              focus:outline-none focus:ring-2 focus:ring-emerald-500
                                              focus:border-emerald-500 focus:z-10 sm:text-sm
                                              transition-colors duration-200">
                                            <option value="">Toutes les catégories</option>
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}">{{ $categorie->title }}</option>
                                            @endforeach
                                        </select>
                                        <button
                                            class="!rounded-button bg-gray-100 text-gray-700 px-4 py-2 text-sm font-medium hover:bg-gray-200">
                                            <i class="fas fa-filter mr-2"></i>Filtrer
                                        </button>
                                    </div>
                                </div>
                                <h2 class="text-lg font-medium">Liste des dépenses ({{ $depenses->count() }})</h2>
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
                                            @foreach ($depenses as $depense)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ \Carbon\Carbon::parse($depense->created_at)->translatedFormat('d F Y - H:i') }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ $depense->nom }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ $depense->prix }} €
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"> <span
                                                            class="px-2 py-1 text-xs font-medium bg-emerald-100 text-emerald-800 rounded-full">{{ $depense->categorie->title }}</span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm flex text-gray-500">
                                                        <button class="text-custom hover:text-custom/80 mr-3"><i
                                                                class="fas fa-edit"></i>
                                                        </button>
                                                        <form
                                                            action="{{ route('utilisateur.depenses.destroy', $depense->id) }}"
                                                            method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="text-red-600 hover:text-red-800"><i
                                                                    class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-1">
                            <div class="bg-white rounded-lg shadow p-6 mb-8">
                                <h2 class="text-lg font-medium mb-6">Résumé du mois</h2>
                                <div class="space-y-4">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">
                                            Salaire
                                        </span>
                                        <span class="text-2xl font-semibold text-gray-900">
                                            {{ Auth::user()->salaire }} €
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">
                                            Budjet ({{ round(Auth::user()->Budjet * 100 / Auth::user()->salaire ,2)}}%)
                                        </span>
                                        <span class="text-2xl font-semibold text-gray-900">
                                            {{ Auth::user()->Budjet }} €
                                        </span>
                                    </div>
                                    <div class="h-px bg-gray-200"></div>
                                </div>
                                <div class="space-y-4">
                                    <div class="flex justify-between items-center"> <span class="text-gray-600">
                                            Total des dépenses</span>
                                        <span class="text-2xl font-semibold text-gray-900">
                                            {{ $totalDepenses }} €
                                        </span>
                                    </div>
                                    <div class="h-px bg-gray-200"></div>
                                    <div>
                                        <h3 class="text-sm font-medium text-gray-700 mb-4">Par catégorie</h3>
                                        <div class="space-y-3">
                                            @foreach ($depensesParCategorie as $depenseParCategorie)
                                                <div class="flex justify-between items-center">
                                                    <span
                                                        class="text-sm text-gray-600">{{ $depenseParCategorie->categorie->title }} ({{ round($depenseParCategorie->total * 100 / $totalDepenses ,2)}}%)</span>
                                                    <span
                                                        class="text-sm font-medium text-gray-900">
                                                        {{ $depenseParCategorie->total }} €
                                                    </span>
                                                </div>
                                            @endforeach

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
</x-app-layout>
