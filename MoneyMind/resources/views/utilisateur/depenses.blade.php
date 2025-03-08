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
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm flex text-gray-500 ">
                                                        <div class="flex gap-2">
                                                            <button
                                                                class="edit-btn text-gray-400 hover:text-emerald-600"
                                                                data-id="{{ $depense->id }}"
                                                                data-nom="{{ $depense->nom }}"
                                                                data-prix="{{ $depense->prix }}"
                                                                data-categorieId="{{ $depense->categorie->id }}">
                                                                <i class="fas fa-edit"></i>
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
                                                        </div>
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
                                            Budjet
                                            ({{ round((Auth::user()->Budjet * 100) / Auth::user()->salaire, 2) }}%)
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
                                                        class="text-sm text-gray-600">{{ $depenseParCategorie->categorie->title }}
                                                        ({{ round(($depenseParCategorie->total * 100) / $totalDepenses, 2) }}%)</span>
                                                    <span class="text-sm font-medium text-gray-900">
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

    {{-- ********** --}}

    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 hidden" id="modal-backdrop"></div>
    <div class="fixed inset-0 z-10 hidden" id="modal">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                <div class="absolute right-0 top-0 pr-4 pt-4">
                    <button type="button" class="text-gray-400 hover:text-gray-500"> <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 mb-6">Modifier un dépense </h3>
                        <form method="post" action="{{ route('utilisateur.depenses.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="space-y-4">
                                <input type="hidden" name='depense_id'>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nom de dépense</label>
                                    <x-text-input type="text" name="nom"
                                        class="mt-1 block w-full border-gray-300 shadow-sm focus:border-emerald-600 focus:ring-emerald-600 sm:text-sm"
                                        placeholder='Entrez le nom de depense reccurente' />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Prix cible</label>
                                    <x-text-input type="number" name="prix"
                                        class="mt-1 block w-full border-gray-300 shadow-sm focus:border-emerald-600 focus:ring-emerald-600 sm:text-sm"
                                        placeholder="0.00" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Catégorie</label>
                                    <select id="categorie" name="categorie_id"
                                        class="form-input mt-1 block w-full border-gray-300 shadow-sm focus:border-emerald-600 focus:ring-emerald-600 sm:text-sm"
                                        placeholder='categorie'>
                                        <option value="">-- Catégorie --</option>
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->title }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="mt-6 flex justify-end space-x-3"> <button type="button"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">
                                    Annuler
                                </button>
                                <button type="submit"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-emerald-600 border border-transparent hover:bg-emerald-500">
                                    Sauvegarder
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ********** --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.getElementById("modal");
            const backdrop = document.getElementById("modal-backdrop");
            const closeButton = modal.querySelector(".fas.fa-times").parentElement;
            const editButtons = document.querySelectorAll(".edit-btn");

            // Sélection des champs du formulaire
            const idInput = modal.querySelector("input[name='depense_id']");
            const nomInput = modal.querySelector("input[placeholder='Entrez le nom de depense reccurente']");
            const prixInput = modal.querySelector("input[placeholder='0.00']");
            //    const dateInput = modal.querySelector("input[placeholder='01/01/2001']");
            const categorieSelect = modal.querySelector("#categorie"); // Sélection du champ <select>

            function openModal(depenseRecc) {
                console.log("Modifier le depenseRecc avec l'ID :", depenseRecc.id);
                modal.classList.remove("hidden");
                backdrop.classList.remove("hidden");

                // Remplir les champs du formulaire
                idInput.value = depenseRecc.id;
                nomInput.value = depenseRecc.nom;
                prixInput.value = depenseRecc.prix;
                //    dateInput.value = depenseRecc.dateReccurente;

                // Sélectionner la bonne option pour la priorité
                categorieSelect.value = depenseRecc.categorieId;
                // categorieSelect.innerHTML = depenseRecc.categorie;
            }

            function closeModal() {
                modal.classList.add("hidden");
                backdrop.classList.add("hidden");
            }

            // Écouteur d'événement sur chaque bouton Modifier
            editButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const depenseRecc = {
                        id: this.getAttribute("data-id"),
                        nom: this.getAttribute("data-nom"),
                        prix: this.getAttribute("data-prix"),
                        categorieId: this.getAttribute("data-categorieId"),
                        //    dateReccurente: this.getAttribute("data-dateReccurente"),
                    };

                    openModal(depenseRecc);
                });
            });

            closeButton.addEventListener("click", closeModal);
            backdrop.addEventListener("click", closeModal);
        });
    </script>
    {{-- *************** --}}




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
