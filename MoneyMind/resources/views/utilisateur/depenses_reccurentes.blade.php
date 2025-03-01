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

                        <div class="grid grid-cols-4 gap-6 mb-8">
                            <div class="bg-white rounded-lg shadow p-6">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Total Mensuel</h3>
                                <p class="text-3xl font-bold text-custom">{{ $totalDepenses }} €</p>
                            </div>
                            <div class="bg-white rounded-lg shadow p-6">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Salaire</h3>
                                <p class="text-3xl font-bold text-custom">{{ Auth::user()->salaire }}</p>
                            </div>
                            <div class="bg-white rounded-lg shadow p-6">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Budjet</h3>
                                <p class="text-3xl font-bold text-custom">{{ Auth::user()->Budjet }}</p>
                            </div>
                            <div class="bg-white rounded-lg shadow p-6">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Prochain Paiement</h3>
                                <p class="text-3xl font-bold text-custom">
                                    {{ $prochainPaiement->date_reccurente ?? null }}</p>
                            </div>
                        </div>



                        <div class="grid grid-cols-3 gap-6 mb-8">
                            <div class="col-span-2 bg-white rounded-lg shadow">
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-6">
                                        <h2 class="text-lg font-medium text-gray-900">Liste des Dépenses
                                            ({{ $depenses_recc->count() }})</h2>
                                        <div class="flex space-x-4">
                                            <select class="border-gray-300 rounded-md text-sm">
                                                <option value="">Toutes les catégories</option>
                                                @foreach ($categories as $categorie)
                                                    <option value="{{ $categorie->id }}">{{ $categorie->title }}
                                                    </option>
                                                @endforeach
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
                                                    Catégorie</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Prochain Paiement</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($depenses_recc as $depense)
                                                <tr>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $depense->nom }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $depense->prix }} €
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $depense->categorie->title }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ \Carbon\Carbon::parse($depense->date_reccurente)->translatedFormat('d/m/Y - H:i') }}

                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap flex text-sm text-gray-500">
                                                        <button class="text-custom hover:text-custom-dark mr-3">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <form
                                                            action="{{ route('utilisateur.depenses_reccurentes.destroy', $depense->id) }}"
                                                            method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="text-red-600 hover:text-red-800">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="bg-gray-100 rounded-lg shadow p-4">
                                <div>
                                    <h2 class="text-lg font-medium text-gray-900 mb-6">Répartition des Dépenses</h2>
                                    <div id="chartDoughnut" class="h-64"></div>
                                </div>
                                <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
                                    <div class="px-6 py-4 border-b border-gray-200">
                                        <h3 class="text-lg font-medium text-gray-900">Nouvelle Dépense Récurrente</h3>
                                    </div>
                                    <form class="px-4 py-4 " method="post"
                                        action="{{ route('utilisateur.depenses_reccurentes.store') }}">
                                        @csrf
                                        @method('POST')
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Nom de la
                                                dépense</label>
                                            <x-text-input type="text" name="nom"
                                                class="w-full border-gray-300 rounded-md shadow-sm"
                                                placeholder="Ex: Loyer" />
                                            @error('nom')
                                                <div>
                                                    <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Montant</label>
                                            <x-text-input type="number" name="prix"
                                                class="w-full border-gray-300 rounded-md shadow-sm"
                                                placeholder="0,00 €" />
                                            @error('prix')
                                                <div>
                                                    <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label
                                                class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                                            <select name="categorie_id"
                                                class="border-gray-300 shadow-sm appearance-none relative block w-full pl-10 pr-3 py-3
                                              border dark:border-gray-600 rounded-xl
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
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Date de
                                                début</label>
                                            <x-text-input type="date" name="date_reccurente"
                                                class="w-full border-gray-300 rounded-md shadow-sm" />
                                            @error('date_reccurente')
                                                <div>
                                                    <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="px-6 py-4 flex justify-end space-x-4 rounded-b-lg">

                                            <button type="submit"
                                                class="rounded-md px-4 py-2 text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-500">
                                                Sauvegarder
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </main>

                    {{-- <div id="modal"
                        class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
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
                    </div> --}}

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
                    @foreach ($depensesParCategorie as $depenseParCategorie)
                        {
                            value: {{ $depenseParCategorie->total }},
                            name: "{{ $depenseParCategorie->categorie->title }}"
                        },
                    @endforeach
                ]
            }]
        };
        chart.setOption(option);
    </script>
</x-app-layout>
