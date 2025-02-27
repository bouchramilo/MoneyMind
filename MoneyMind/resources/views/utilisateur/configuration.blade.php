<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Configurations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- ********************************************************************************************************** --}}

                    <div class="max-w-4xl mx-auto space-y-8">
                        <div class="bg-white shadow rounded-lg p-6">
                            <h2 class="text-2xl font-semibold mb-6">Seuil Global de Dépenses</h2>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Seuil d'alerte global</label>
                                    <div class="mt-2 flex items-center space-x-4">
                                        <input type="range" class="w-full" min="0" max="100"
                                            value="80">
                                        <div class="relative">
                                            <input type="text"
                                                class="block w-20 !rounded-button border-gray-300 shadow-sm focus:border-custom focus:ring-custom"
                                                value="80"> <span
                                                class="absolute inset-y-0 right-3 flex items-center text-gray-500">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white shadow rounded-lg p-6">
                            <h2 class="text-2xl font-semibold mb-6">Configuration par Catégorie</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="border rounded-lg p-4">
                                    <div class="flex items-center mb-4">
                                        <i class="fas fa-shopping-cart text-custom text-xl mr-3"></i>
                                        <h3 class="text-lg font-medium">Achats</h3>
                                    </div>
                                    <div class="space-y-3">
                                        <div class="flex items-center justify-between">
                                            <input type="range" class="w-full mr-4" min="0" max="100"
                                                value="60"> <span class="text-sm font-medium">60%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="border rounded-lg p-4">
                                    <div class="flex items-center mb-4"> <i
                                            class="fas fa-utensils text-custom text-xl mr-3"></i>
                                        <h3 class="text-lg font-medium">Restauration</h3>
                                    </div>
                                    <div class="space-y-3">
                                        <div class="flex items-center justify-between"> <input type="range"
                                                class="w-full mr-4" min="0" max="100" value="40">
                                            <span class="text-sm font-medium">40%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="border rounded-lg p-4">
                                    <div class="flex items-center mb-4">
                                        <i class="fas fa-car text-custom text-xl mr-3"></i>
                                        <h3 class="text-lg font-medium">Transport</h3>
                                    </div>
                                    <div class="space-y-3">
                                        <div class="flex items-center justify-between">
                                            <input type="range" class="w-full mr-4" min="0" max="100"
                                                value="30"> <span class="text-sm font-medium">30%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="border rounded-lg p-4">
                                    <div class="flex items-center mb-4"> <i
                                            class="fas fa-home text-custom text-xl mr-3"></i>
                                        <h3 class="text-lg font-medium">Logement</h3>
                                    </div>
                                    <div class="space-y-3">
                                        <div class="flex items-center justify-between"> <input type="range"
                                                class="w-full mr-4" min="0" max="100" value="50">
                                            <span class="text-sm font-medium">50%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white shadow rounded-lg p-6">
                            <h2 class="text-2xl font-semibold mb-6">Aperçu des Alertes</h2>
                            <div class="space-y-4">
                                <div
                                    class="flex items-center justify-between p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                                    <div class="flex items-center"> <i
                                            class="fas fa-exclamation-triangle text-yellow-500 mr-3"></i>
                                        <div>
                                            <p class="font-medium">Alerte Restauration</p>
                                            <p class="text-sm text-gray-600">Seuil de 40% atteint</p>
                                        </div>
                                    </div>
                                    <span class="text-sm text-gray-500">Il y a 2 heures</span>
                                </div>
                                <div
                                    class="flex items-center justify-between p-4 bg-red-50 border border-red-200 rounded-lg">
                                    <div class="flex items-center">
                                        <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                                        <div>
                                            <p class="font-medium">Alerte Transport</p>
                                            <p class="text-sm text-gray-600">Dépassement du seuil (30%)</p>
                                        </div>
                                    </div>
                                    <span class="text-sm text-gray-500">Hier</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="border-t border-gray-200 py-4">
                            <button type="button"
                                class="bg-emerald-600 hover:bg-emerald-500 fixed bottom-8 right-8 inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-button shadow-sm text-white bg-custom hover:bg-custom/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom">
                                <i class="fas fa-save mr-2"></i>
                                Enregistrer les modifications
                            </button>
                        </div>
                    </div>

                    {{-- ********************************************************************************************************** --}}
                </div>
            </div>
        </div>
    </div>

    {{-- ********** --}}



    {{-- ********** --}}


</x-app-layout>
