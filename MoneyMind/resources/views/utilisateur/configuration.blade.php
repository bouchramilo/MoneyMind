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
                            <form action="{{ route('utilisateur.configuration.categorie') }}" method="post">
                                @csrf
                                @method('POST')
                                <h2 class="text-2xl font-semibold mb-6">Seuil Global de Dépenses</h2>
                                <div class="space-y-4">
                                    <div>
                                        <input type="hidden" name="seuilType" value="seuil_global">
                                        <label class="block text-sm font-medium text-gray-700">Seuil d'alerte
                                            global</label>
                                        <div class="mt-2 flex items-center space-x-4">
                                            <input type="range" class="w-full" min="0" max="100"
                                                value="{{ $global[0]->pourcentage ?? 0 }}" disabled>
                                            <div class="relative">
                                                <input type="number" name="pourcentage"
                                                    class="block w-20 !rounded-button border-gray-300 shadow-sm focus:border-custom focus:ring-custom"
                                                    value="{{ $global[0]->pourcentage ?? 0 }}"> <span
                                                    class="absolute inset-y-0 right-3 flex items-center text-gray-500">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-end py-2">
                                    <button
                                        class="bg-emerald-600 hover:bg-emerald-500 bottom-8 right-8 inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-button shadow-sm text-white bg-custom focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom">
                                        <i class="fas fa-save mr-2"></i>
                                        Enregistrer
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="bg-white shadow rounded-lg p-6">
                            <h2 class="text-2xl font-semibold mb-6">Configuration par Catégorie</h2>
                            <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                                <form action="{{ route('utilisateur.configuration.categorie') }}" method="post"
                                    class="w-full">
                                    @csrf
                                    @method('POST')
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="flex flex-col space-x-4">
                                            <label
                                                class="block text-sm font-medium text-gray-700 px-4">Catégorie</label>
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
                                        </div>
                                        <div class="flex flex-col space-x-4">
                                            <input type="hidden" name="seuilType" value="seuil_categorie">
                                            <label
                                                class="block text-sm font-medium text-gray-700 px-4">Pourcentage</label>
                                            <x-text-input type="number" name="pourcentage"
                                                class="w-full border-gray-300 focus:border-custom focus:ring-custom"
                                                palceholder="25%" />
                                        </div>
                                    </div>
                                    <div class="flex justify-end py-2">
                                        <button
                                            class="bg-emerald-600 hover:bg-emerald-500 bottom-8 right-8 inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-button shadow-sm text-white bg-custom focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom">
                                            <i class="fas fa-save mr-2"></i>
                                            Enregistrer
                                        </button>
                                    </div>
                                </form>

                            </div>
                            {{-- <div class="flex justify-end py-2">
                            </div> --}}
                        </div>
                        <div class="bg-white shadow rounded-lg p-6">
                            <h2 class="text-2xl font-semibold mb-6">Vos configurations par Catégorie</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach ($configs as $config)
                                    <form method="post" action="" class="border rounded-lg p-4">
                                        @csrf
                                        @method('POST')
                                        <div class="flex items-center justify-between mb-4">
                                            <h3 class="text-lg font-medium">{{ $config->categorie->title }}</h3>
                                        </div>
                                        <div class="space-y-3">
                                            <div class="flex items-center justify-between gap-2">
                                                <input type="range" class="w-full mr-4" min="0" max="100"
                                                    value="{{ $config->pourcentage }}" disabled>
                                                <form action="{{ route('utilisateur.configuration.update') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="relative flex ">
                                                        <input type="hidden" name="config_id"
                                                            value="{{ $config->id }}">
                                                        <input type="text" name="pourcentage"
                                                            value="{{ $config->pourcentage }}"
                                                            class="block w-20 !rounded-button border-gray-300 shadow-sm focus:border-custom focus:ring-custom">
                                                        <span
                                                            class="absolute inset-y-0 right-3 flex items-center text-gray-500">%</span>
                                                    </div>
                                                    <button
                                                        class="bg-emerald-600 hover:bg-emerald-500 bottom-8 rounded-lg right-8 inline-flex items-center px-2 py-2 border border-transparent text-base font-medium rounded-button shadow-sm text-white bg-custom focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom ">
                                                        <span><i class="fas fa-save mx-2"></i></span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach

                            </div>

                        </div>

                        <div class="bg-white shadow rounded-lg p-6">
                            <h2 class="text-2xl font-semibold mb-6">Aperçu des Alertes</h2>
                            <div class="space-y-4">
                                @foreach ($aleartNotification as $notification)
                                    @if ($notification->categorie_id)
                                        <div
                                            class="flex items-center justify-between p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                                            <div class="flex items-center">
                                                <i class="fas fa-exclamation-triangle text-yellow-500 mr-3"></i>
                                                <div>
                                                    <div class="flex gap-4">
                                                        <p class="font-medium">Alerte
                                                            {{ $notification->categorie->title }}</p>
                                                        <span
                                                            class="text-sm text-gray-400">{{ $notification->dateTime_aleart->diffForHumans() }}</span>
                                                    </div>
                                                    <p class="text-sm text-gray-600">{{ $notification->mssg }}</p>
                                                </div>
                                            </div>
                                            <form method="POST"
                                                action="{{ route('utilisateur.configuration.destroy', $notification->id) }}"
                                                class="">
                                                @csrf
                                                @method('DELETE')
                                                <button> <i class="fas fa-times"></i></button>
                                            </form>
                                        </div>
                                    @else
                                        <div
                                            class="flex items-center justify-between p-4 bg-red-50 border border-red-200 rounded-lg">
                                            <div class="flex items-center">
                                                <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                                                <div>
                                                    <div class="flex gap-4">
                                                        <p class="font-medium">Alerte Budget</p>
                                                        <span
                                                            class="text-sm text-gray-400">{{ $notification->dateTime_aleart->diffForHumans() }}</span>
                                                    </div>
                                                    <p class="text-sm text-gray-600">{{ $notification->mssg }}</p>
                                                </div>
                                            </div>
                                            <form method="POST"
                                                action="{{ route('utilisateur.configuration.destroy', $notification->id) }}"
                                                class="">
                                                @csrf
                                                @method('DELETE')
                                                <button> <i class="fas fa-times"></i></button>
                                            </form>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
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
