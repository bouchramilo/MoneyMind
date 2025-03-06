<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mes Souhaits') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- ********************************************************************************************************** --}}

                    <div class="bg-white rounded-lg shadow p-6 mb-8">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-emerald-50 rounded-lg p-6">
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Total de la liste</h3>
                                <p class="text-3xl font-bold text-emerald-600">{{ $totalSouhaits }} €</p>
                            </div>
                            <div class="bg-emerald-50 rounded-lg p-6">
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Montant économisé</h3>
                                <p class="text-3xl font-bold text-green-600">{{ $montant_current }} €</p>
                            </div>
                            <div class="bg-emerald-50 rounded-lg p-6">
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Nombre d'article</h3>
                                <p class="text-3xl font-bold text-green-600">{{ $listeSouhaits->count() }}</p>
                            </div>

                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6 mb-8">
                        <h2 class="text-lg font-medium mb-6">Ajouter une souhait</h2>
                        <form class="space-y-4" method="POST" action="{{ route('utilisateur.souhaits.store') }}">
                            @csrf
                            @method('POST')
                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                                    <x-text-input type="text" name="nom"
                                        class="w-full border-gray-300 focus:border-emerald-600 focus:ring-emerald-600"
                                        placeholder="Nom de la souhait" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Montant
                                        (€)</label>
                                    <x-text-input type="number" name="prix"
                                        class="w-full border-gray-300 focus:border-emerald-600 focus:ring-emerald-600"
                                        placeholder="10.00" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Montant
                                        (€)</label>
                                    <select name="priorite"
                                        class="appearance-none relative block w-full pl-10 pr-3 py-3
                                              border border-gray-300 dark:border-gray-600 rounded-xl
                                              placeholder-gray-500 dark:placeholder-gray-400
                                              text-gray-900 dark:text-white
                                              bg-white dark:bg-gray-700
                                              focus:outline-none focus:ring-2 focus:ring-emerald-500
                                              focus:border-emerald-500 focus:z-10 sm:text-sm
                                              transition-colors duration-200"
                                        placeholder="10.00">
                                        <option value="">-- Priorité --</option>
                                        <option value="élevée">Elevée</option>
                                        <option value="moyenne">Moyenne</option>
                                        <option value="faible">Faible</option>
                                    </select>
                                </div>
                            </div>
                            <div class=" flex justify-end items-end">
                                <button type="submit"
                                    class="bg-emerald-600 h-12 dark:bg-emerald-400 text-white px-4 py-2 text-sm font-medium hover:bg-emerald-500 rounded-md">
                                    <i class="fas fa-plus mr-2"></i>Ajouter
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="p-6 border-b border-gray-200">

                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-semibold text-gray-900">
                                    Articles ({{ $listeSouhaits->count() }})
                                </h2>
                            </div>
                        </div>

                        <div class="divide-y divide-gray-200">

                            @foreach ($listeSouhaits as $souhait)
                                <div class="p-6">
                                    <div class="flex items-center justify-between">
                                        <div class="flex-1">
                                            <h3 class="text-lg font-medium text-gray-900">{{ $souhait->nom }}</h3>
                                            <div class="mt-1 flex items-center space-x-2">
                                                <span class="text-sm text-gray-500">Prix cible:</span>
                                                <span class="font-medium text-gray-900">{{ $souhait->prix }} €</span>
                                                <span class="text-sm text-gray-500">Priorité:</span>
                                                <span class="font-medium text-gray-900">{{ $souhait->priorite }}</span>
                                                <span class="text-sm text-gray-500">Économisé:</span>
                                                <span class="font-medium text-gray-900">{{ (($souhait->prix - $montant_current) > 0) ? $montant_current : $souhait->prix }} €</span>
                                            </div>
                                            <div class="mt-4 relative pt-1">
                                                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                                                    <div style="width:{{ ($montant_current / $souhait->prix) * 100 }}%"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-600">
                                                    </div>
                                                </div>
                                                <p class="text-right text-sm font-medium text-gray-600">
                                                    {{ number_format(($montant_current / $souhait->prix) * 100, 2) }}%</p>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex items-center space-x-3">
                                            <button class="edit-btn p-2 text-gray-400 hover:text-emerald-600"
                                                data-id="{{ $souhait->id }}" data-nom="{{ $souhait->nom }}"
                                                data-prix="{{ $souhait->prix }}"
                                                data-priorite="{{ $souhait->priorite }}">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <!-- Bouton Supprimer -->
                                            <form action="{{ route('utilisateur.souhaits.destroy', $souhait->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="p-2 text-gray-400 hover:text-red-600">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach



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
                        <h3 class="text-lg font-medium leading-6 text-gray-900 mb-6">Modifier un article</h3>
                        <form method="post" action="{{ route('utilisateur.souhaits.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="space-y-4">
                                <input type="hidden" name='souhaits_id'>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nom de l'article</label>
                                    <input type="text" name="nom"
                                        class="mt-1 block w-full border-gray-300 shadow-sm focus:border-emerald-600 focus:ring-emerald-600 sm:text-sm"
                                        placeholder='Entrez le nom de souhaits'>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Prix cible</label>
                                    <input type="number" name="prix"
                                        class="mt-1 block w-full border-gray-300 shadow-sm focus:border-emerald-600 focus:ring-emerald-600 sm:text-sm"
                                        placeholder="0.00">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Montant économisé</label>
                                    <select id="priorite" name="priorite"
                                        class="form-input mt-1 block w-full border-gray-300 shadow-sm focus:border-emerald-600 focus:ring-emerald-600 sm:text-sm"
                                        placeholder='Priorité'>
                                        <option value="">-- Priorité --</option>
                                        <option value="élevée">Elevée</option>
                                        <option value="moyenne">Moyenne</option>
                                        <option value="faible">Faible</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-6 flex justify-end space-x-3"> <button type="button"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">
                                    Annuler
                                </button>
                                <button type="submit"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-emerald-600 border border-transparent hover:bg-indigo-700">
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
            const idInput = modal.querySelector("input[name='souhaits_id']");
            const nomInput = modal.querySelector("input[placeholder='Entrez le nom de souhaits']");
            const prixInput = modal.querySelector("input[placeholder='0.00']");
            const prioriteSelect = modal.querySelector("#priorite"); // Sélection du champ <select>

            function openModal(souhait) {
                console.log("Modifier le souhait avec l'ID :", souhait.id);
                modal.classList.remove("hidden");
                backdrop.classList.remove("hidden");

                // Remplir les champs du formulaire
                idInput.value = souhait.id;
                nomInput.value = souhait.nom;
                prixInput.value = souhait.prix;

                // Sélectionner la bonne option pour la priorité
                prioriteSelect.value = souhait.priorite;
            }

            function closeModal() {
                modal.classList.add("hidden");
                backdrop.classList.add("hidden");
            }

            // Écouteur d'événement sur chaque bouton Modifier
            editButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const souhait = {
                        id: this.getAttribute("data-id"),
                        nom: this.getAttribute("data-nom"),
                        prix: this.getAttribute("data-prix"),
                        priorite: this.getAttribute("data-priorite"),
                    };

                    openModal(souhait);
                });
            });

            closeButton.addEventListener("click", closeModal);
            backdrop.addEventListener("click", closeModal);
        });
    </script>

</x-app-layout>
