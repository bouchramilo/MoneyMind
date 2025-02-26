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
                                                        <form method="post" action=""
                                                            class="mb-6 flex gap-2">
                                                            @csrf
                                                            <button
                                                                class="text-emerald-600 dark:text-emerald-400 hover:text-emerald-900 dark:hover:text-emerald-300">
                                                                <svg class="w-5 h-5" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                        <form method="post" action="{{ route('categories.destroy', $categorie->id) }}"
                                                            class="mb-6 flex gap-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            {{-- <input type="hidden" value="{{ $categorie->id }}" > --}}
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



                        <!-- Add/Edit Modal avec x-cloak -->
                        {{-- <div x-show="isModalOpen" x-cloak
                            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4"
                            x-transition>
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-md w-full"
                                @click.away="closeModal()">
                                <div class="p-6">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4"
                                        x-text="editingCategory ? 'Modifier la catégorie' : 'Ajouter une catégorie'">
                                    </h3>

                                    <form @submit.prevent="saveCategory">
                                        <!-- Icon Input -->
                                        <div class="mb-4">
                                            <label
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Icône
                                            </label>
                                            <div class="grid grid-cols-8 gap-2">
                                                <template x-for="icon in availableIcons" :key="icon">
                                                    <button type="button" @click="selectIcon(icon)"
                                                        :class="{ 'ring-2 ring-emerald-500': selectedIcon === icon }"
                                                        class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-700
                                                   flex items-center justify-center hover:bg-gray-200
                                                   dark:hover:bg-gray-600 transition-colors">
                                                        <span x-text="icon" class="text-xl"></span>
                                                    </button>
                                                </template>
                                            </div>
                                        </div>

                                        <!-- Name Input -->
                                        <div class="mb-4">
                                            <label for="categoryName"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Nom
                                            </label>
                                            <input type="text" id="categoryName" x-model="formData.name" required
                                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                          focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700
                                          dark:text-white transition-colors">
                                        </div>

                                        <!-- Description Input -->
                                        <div class="mb-6">
                                            <label for="categoryDescription"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Description
                                            </label>
                                            <textarea id="categoryDescription" x-model="formData.description" rows="3" required
                                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                             focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700
                                             dark:text-white transition-colors"></textarea>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="flex justify-end space-x-3">
                                            <button type="button" @click="closeModal"
                                                class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100
                                           dark:hover:bg-gray-700 rounded-lg transition-colors">
                                                Annuler
                                            </button>
                                            <button type="submit"
                                                class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700
                                           transition-colors">
                                                <span x-text="editingCategory ? 'Modifier' : 'Ajouter'"></span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <script>
        function categoriesManager() {
            return {
                categories: [{
                        id: 1,
                        icon: '🏠',
                        name: 'Logement',
                        description: 'Dépenses liées au logement'
                    },
                    {
                        id: 2,
                        icon: '🍔',
                        name: 'Alimentation',
                        description: 'Courses et restaurants'
                    },
                    {
                        id: 3,
                        icon: '🚗',
                        name: 'Transport',
                        description: 'Voiture, transport en commun'
                    }
                ],
                isModalOpen: false,
                editingCategory: null,
                formData: {
                    name: '',
                    description: '',
                    icon: ''
                },
                selectedIcon: '',
                availableIcons: ['🏠', '🍔', '🚗', '💰', '🎮', '👕', '💊', '✈️', '📱', '🎭', '📚', '🏋️'],

                openAddModal() {
                    this.editingCategory = null;
                    this.formData = {
                        name: '',
                        description: '',
                        icon: ''
                    };
                    this.selectedIcon = '';
                    this.isModalOpen = true;
                },

                openEditModal(category) {
                    this.editingCategory = category;
                    this.formData = {
                        ...category
                    };
                    this.selectedIcon = category.icon;
                    this.isModalOpen = true;
                },

                closeModal() {
                    this.isModalOpen = false;
                    this.editingCategory = null;
                    this.formData = {
                        name: '',
                        description: '',
                        icon: ''
                    };
                    this.selectedIcon = '';
                },

                selectIcon(icon) {
                    this.selectedIcon = icon;
                    this.formData.icon = icon;
                },

                saveCategory() {
                    if (this.editingCategory) {
                        // Update existing category
                        const index = this.categories.findIndex(c => c.id === this.editingCategory.id);
                        if (index !== -1) {
                            this.categories[index] = {
                                ...this.editingCategory,
                                ...this.formData
                            };
                        }
                    } else {
                        // Add new category
                        const newId = Math.max(...this.categories.map(c => c.id)) + 1;
                        this.categories.push({
                            id: newId,
                            ...this.formData
                        });
                    }
                    this.closeModal();
                },

                deleteCategory(id) {
                    if (confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')) {
                        this.categories = this.categories.filter(c => c.id !== id);
                    }
                }
            }
        }
    </script>

</x-app-layout>
