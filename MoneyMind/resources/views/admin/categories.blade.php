<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Catégories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Main Container -->
                    <div class="p-6 lg:p-8  min-h-screen">
                        <!-- Header -->
                        <div class="mb-8">
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Gestion des Catégories</h1>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">Gérez les catégories de dépenses pour vos
                                utilisateurs</p>
                        </div>

                        <!-- Add Category Button -->
                        <form method="post" action="{{ route('categories.store') }}" class="mb-6 flex gap-2">
                            @csrf
                            <x-text-input id="categorie" class="block mt-1 w-full" type="text" name="title"
                                required placeholder="titre de catégorie" />
                            <button
                                class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors duration-200 flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                <span>Ajouter une catégorie</span>
                            </button>
                        </form>

                        <!-- Categories Table -->
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Icône
                                            </th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Titre
                                            </th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Date de création
                                            </th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach ($categories as $categorie)
                                            <tr
                                                class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div
                                                        class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-emerald-900
                                                flex items-center justify-center">
                                                        <span class="text-xl">🚗</span>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ $categorie->title }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ $categorie->created_at }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <div class="flex space-x-3">

                                                        <button
                                                            class="edit-btn text-emerald-600 dark:text-emerald-400 hover:text-emerald-900 dark:hover:text-emerald-300"
                                                            data-id="{{ $categorie->id }}"
                                                            data-nom="{{ $categorie->title }}">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                            </svg>
                                                        </button>
                                                        <form method="post"
                                                            action="{{ route('categories.destroy', $categorie->id) }}"
                                                            class="flex gap-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">
                                                                <svg class="w-5 h-5" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
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
                        <h3 class="text-lg font-medium leading-6 text-gray-900 mb-6">Modifier un catégorie</h3>
                        <form method="post" action="{{ route('categories.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="space-y-4">
                                <input type="hidden" name='categorie_id'>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nom de Catégorie</label>
                                    <x-text-input type="text" name="title"
                                        class="mt-1 block w-full border-gray-300 shadow-sm focus:border-emerald-600 focus:ring-emerald-600 sm:text-sm"
                                        placeholder='Entrez le nom de catégorie' />
                                </div>
                            </div>
                            <div class="mt-6 flex justify-end space-x-3">
                                <button type="button"
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
            const idInput = modal.querySelector("input[name='categorie_id']");
            const nomInput = modal.querySelector("input[placeholder='Entrez le nom de catégorie']");
            // const prixInput = modal.querySelector("input[placeholder='0.00']");
            // const dateInput = modal.querySelector("input[placeholder='01/01/2001']");
            // const prioriteSelect = modal.querySelector("#categorie"); // Sélection du champ <select>

            function openModal(depenseRecc) {
                console.log("Modifier le depenseRecc avec l'ID :", depenseRecc.id);
                modal.classList.remove("hidden");
                backdrop.classList.remove("hidden");

                // Remplir les champs du formulaire
                idInput.value = depenseRecc.id;
                nomInput.value = depenseRecc.nom;
                // prixInput.value = depenseRecc.prix;
                // dateInput.value = depenseRecc.dateReccurente;

                // Sélectionner la bonne option pour la priorité
                // prioriteSelect.value = depenseRecc.categorieId;
                // prioriteSelect.innerHTML = depenseRecc.categorie;
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
                        // prix: this.getAttribute("data-prix"),
                        // categorieId: this.getAttribute("data-categorieId"),
                        // dateReccurente: this.getAttribute("data-dateReccurente"),
                    };

                    openModal(depenseRecc);
                });
            });

            closeButton.addEventListener("click", closeModal);
            backdrop.addEventListener("click", closeModal);
        });
    </script>
    {{-- *************** --}}


    <!-- Dark Mode Store -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('darkMode', {
                on: localStorage.theme === 'dark' ||
                    (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)')
                        .matches),

                toggle() {
                    this.on = !this.on;
                    localStorage.theme = this.on ? 'dark' : 'light';
                    this.updateDocument();
                },

                updateDocument() {
                    if (this.on) {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }
                }
            });

            // Initialize dark mode
            Alpine.store('darkMode').updateDocument();
        });
    </script>

</x-app-layout>
