<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Utilisateurs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="max-w-7xl mx-auto">
                        <!-- Page Title -->
                        <div class="mb-8">
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Tableau de Bord Administrateur
                            </h1>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">Statistiques et gestion des utilisateurs</p>
                        </div>

                        <!-- Stats Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                            <!-- Total Users Card -->
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                                            Utilisateurs Totaux
                                        </p>
                                        <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">
                                            {{ $users->count() }}
                                        </p>
                                    </div>
                                    <div class="p-3 bg-emerald-100 dark:bg-emerald-900 rounded-full">
                                        <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="flex items-center">
                                        <span class="text-green-500 text-sm font-medium">
                                            +{{ $users_last_mois }} ce mois
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Average Monthly Income Card -->
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                                            Revenu Mensuel Moyen
                                        </p>
                                        <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">
                                            {{ $revenuMensuelMoyen }} €
                                        </p>
                                    </div>
                                    <div class="p-3 bg-blue-100 dark:bg-blue-900 rounded-full">
                                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                                {{-- <div class="mt-4">
                                    <div class="flex items-center">
                                        <span class="text-blue-500 text-sm font-medium">
                                            Médiane: 2 200 €
                                        </span>
                                    </div>
                                </div> --}}
                            </div>

                            <!-- Inactive Users Card -->
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                                            Utilisateurs Inactifs
                                        </p>
                                        <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">
                                            {{ $usersInactifs->count() }}
                                        </p>
                                    </div>
                                    <div class="p-3 bg-red-100 dark:bg-red-900 rounded-full">
                                        <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button onclick="openInactiveUsersModal()"
                                        class="text-red-600 dark:text-red-400 text-sm font-medium hover:text-red-700
                                                            dark:hover:text-red-300">
                                        Gérer les comptes inactifs →
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden mb-8">
                            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                                    Liste des Utilisateurs et Revenus
                                </h3>
                            </div>

                            <!-- Table Container -->
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Utilisateur
                                            </th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Email
                                            </th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Revenu Mensuel
                                            </th>
                                            {{-- <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Statut
                                            </th> --}}
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Dernière Connexion
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                        <!-- Example User Row 1 -->
                                        @foreach ($users as $user)
                                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="h-10 w-10 flex-shrink-0">
                                                            <img class="h-10 w-10 rounded-full"
                                                                src="{{ asset('storage/' . $user->photo) }}"
                                                                alt="{{ $user->name }}">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div
                                                                class="text-sm font-medium text-gray-900 dark:text-white">
                                                                {{ $user->name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                                        {{ $user->email }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900 dark:text-white">
                                                        {{ $user->salaire }} €
                                                    </div>
                                                </td>
                                                {{-- <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                    Actif
                                                </span>
                                            </td> --}}
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                                    {{ $user->last_login->diffForHumans() }}
                                                </td>
                                            </tr>
                                        @endforeach

                                        <!-- Example User Row 2 -->
                                        {{-- <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="h-10 w-10 flex-shrink-0">
                                                        <img class="h-10 w-10 rounded-full"
                                                            src="https://ui-avatars.com/api/?name=Jane+Smith"
                                                            alt="User avatar">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                            Jane Smith
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                                    jane.smith@example.com
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 dark:text-white">
                                                    3 200 €
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                                    Inactif
                                                </span>
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                                Il y a 3 mois
                                            </td>
                                        </tr> --}}

                                        <!-- Example User Row 3 -->
                                        {{-- <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="h-10 w-10 flex-shrink-0">
                                                        <img class="h-10 w-10 rounded-full"
                                                            src="https://ui-avatars.com/api/?name=Robert+Johnson"
                                                            alt="User avatar">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                            Robert Johnson
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                                    robert.j@example.com
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 dark:text-white">
                                                    4 100 €
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                    Actif
                                                </span>
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                                Il y a 5 minutes
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div
                                class="bg-white dark:bg-gray-800 px-4 py-3 border-t border-gray-200 dark:border-gray-700 sm:px-6">
                                {{ $users->links() }}
                            </div>
                        </div>

                        <!-- Inactive Users Modal -->
                        <div id="inactiveUsersModal"
                            class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-2xl w-full">
                                <div class="p-6">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                                        Gestion des Comptes Inactifs
                                    </h3>

                                    <div class="mb-4">
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            Les comptes suivants n'ont pas été actifs depuis plus de 3 mois.
                                        </p>
                                    </div>

                                    <!-- Example Inactive User -->
                                    <div class="mt-4 space-y-2 max-h-96 overflow-y-auto">
                                        @foreach ($usersInactifs as $inactif)
                                            <div
                                                class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                                <div class="flex gap-2">
                                                    <div class="h-10 w-10 flex-shrink-0">
                                                        <img class="h-10 w-10 rounded-full"
                                                            src="{{ asset('storage/' . $inactif->photo) }}"
                                                            alt="{{ $inactif->name }}">
                                                    </div>

                                                    <div class="">
                                                        <p class="text-sm font-medium text-gray-900 dark:text-white">
                                                            {{ $inactif->name }}
                                                        </p>
                                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                                            Dernière connexion:
                                                            {{ $inactif->last_login->diffForHumans() }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <form action="{{ route('utilisateurs.destroy', $inactif->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="deleteUser(1)"
                                                        class="text-red-600 dark:text-red-400 hover:text-red-700
                                                           dark:hover:text-red-300 text-sm font-medium">
                                                        Supprimer
                                                    </button>
                                                </form>
                                            </div>
                                        @endforeach
                                        <!-- Add more inactive users here -->
                                    </div>

                                    <div class="mt-6 flex justify-end">
                                        <button onclick="closeInactiveUsersModal()"
                                            class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100
                                                       dark:hover:bg-gray-700 rounded-lg transition-colors">
                                            Fermer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        // Modal Functions
        function openInactiveUsersModal() {
            document.getElementById('inactiveUsersModal').classList.remove('hidden');
        }

        function closeInactiveUsersModal() {
            document.getElementById('inactiveUsersModal').classList.add('hidden');
        }

        function deleteUser(userId) {
            if (confirm('Êtes-vous sûr de vouloir supprimer ce compte ?')) {
                // Handle user deletion
                console.log('Deleting user:', userId);
            }
        }

        // Charts
        // const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
        // new Chart(userGrowthCtx, {
        //     type: 'line',
        //     data: {
        //         labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
        //         datasets: [{
        //             label: 'Nouveaux Utilisateurs',
        //             data: [65, 78, 90, 85, 95, 110],
        //             borderColor: '#059669',
        //             tension: 0.3
        //         }]
        //     },
        //     options: {
        //         responsive: true,
        //         maintainAspectRatio: false,
        //         scales: {
        //             y: {
        //                 beginAtZero: true
        //             }
        //         }
        //     }
        // });

        // const incomeDistributionCtx = document.getElementById('incomeDistributionChart').getContext('2d');
        // new Chart(incomeDistributionCtx, {
        //     type: 'bar',
        //     data: {
        //         labels: ['0-1000€', '1000-2000€', '2000-3000€', '3000-4000€', '4000€+'],
        //         datasets: [{
        //             label: 'Nombre d\'utilisateurs',
        //             data: [30, 45, 60, 35, 20],
        //             backgroundColor: '#0EA5E9'
        //         }]
        //     },
        //     options: {
        //         responsive: true,
        //         maintainAspectRatio: false,
        //         scales: {
        //             y: {
        //                 beginAtZero: true
        //             }
        //         }
        //     }
        // });
    </script>

</x-app-layout>
