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
                            <div class="bg-gray-50 rounded-lg p-6">
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Total de la liste</h3>
                                <p class="text-3xl font-bold text-custom">2,450 €</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Montant économisé</h3>
                                <p class="text-3xl font-bold text-green-600">875 €</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Progression globale</h3>
                                <div class="relative pt-1">
                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                                        <div style="width:35%"
                                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-custom">
                                        </div>
                                    </div>
                                    <p class="text-right text-sm font-medium text-gray-600">35%</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-semibold text-gray-900">Articles</h2>
                                <div class="flex items-center space-x-4">
                                    <button type="button"
                                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium text-white bg-emerald-600 dark:text-emerald-400 hover:bg-emerald-500 focus:outline-none">
                                        <i class="fas fa-plus mr-2"></i>
                                        Ajouter un article
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="divide-y divide-gray-200">
                            <div class="p-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-medium text-gray-900">iPhone 15 Pro</h3>
                                        <div class="mt-1 flex items-center space-x-2"> <span
                                                class="text-sm text-gray-500">Prix
                                                cible:</span>
                                            <span class="font-medium text-gray-900">1,299 €</span>
                                            <span class="text-sm text-gray-500">Économisé:</span>
                                            <span class="font-medium text-gray-900">450 €</span>
                                        </div>
                                        <div class="mt-4 relative pt-1">
                                            <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                                                <div style="width:35%"
                                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-custom">
                                                </div>
                                            </div>
                                            <p class="text-right text-sm font-medium text-gray-600">35%</p>
                                        </div>
                                    </div>
                                    <div class="ml-4 flex items-center space-x-3"> <button
                                            class="!rounded-button p-2 text-gray-400 hover:text-custom">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="!rounded-button p-2 text-gray-400 hover:text-red-600"> <i
                                                class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-medium text-gray-900">MacBook Air M2</h3>
                                        <div class="mt-1 flex items-center space-x-2">
                                            <span class="text-sm text-gray-500">Prix cible:</span>
                                            <span class="font-medium text-gray-900">1,499 €</span>
                                            <span class="text-sm text-gray-500">Économisé:</span>
                                            <span class="font-medium text-gray-900">750 €</span>
                                        </div>
                                        <div class="mt-4 relative pt-1">
                                            <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                                                <div style="width:50%"
                                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-custom">
                                                </div>
                                            </div>
                                            <p class="text-right text-sm font-medium text-gray-600">50%</p>
                                        </div>
                                    </div>
                                    <div class="ml-4 flex items-center space-x-3"> <button
                                            class="!rounded-button p-2 text-gray-400 hover:text-custom">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="!rounded-button p-2 text-gray-400 hover:text-red-600"> <i
                                                class="fas fa-trash"></i>
                                        </button>
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

    {{-- ********** --}}

    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 hidden" id="modal-backdrop"></div>
    <div class="fixed inset-0 z-10 hidden" id="modal">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                <div class="absolute right-0 top-0 pr-4 pt-4">
                    <button type="button" class="!rounded-button text-gray-400 hover:text-gray-500"> <i
                            class="fas fa-times"></i>
                    </button>
                </div>
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 mb-6">Ajouter un article</h3>
                        <form>
                            <div class="space-y-4">
                                <div> <label class="block text-sm font-medium text-gray-700">Nom de l'article</label>
                                    <input type="text"
                                        class="mt-1 block w-full !rounded-button border-gray-300 shadow-sm focus:border-custom focus:ring-custom sm:text-sm"
                                        placeholder="Entrez le nom de l'article">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Prix cible</label>
                                    <input type="number"
                                        class="mt-1 block w-full !rounded-button border-gray-300 shadow-sm focus:border-custom focus:ring-custom sm:text-sm"
                                        placeholder="0.00">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Montant économisé</label>
                                    <input type="number"
                                        class="mt-1 block w-full !rounded-button border-gray-300 shadow-sm focus:border-custom focus:ring-custom sm:text-sm"
                                        placeholder="0.00">
                                </div>
                            </div>
                            <div class="mt-6 flex justify-end space-x-3"> <button type="button"
                                    class="!rounded-button inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">
                                    Annuler
                                </button>
                                <button type="submit"
                                    class="!rounded-button inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-custom border border-transparent hover:bg-indigo-700">
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


</x-app-layout>
