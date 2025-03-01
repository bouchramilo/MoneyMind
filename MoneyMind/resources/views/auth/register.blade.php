<x-guest-layout>

    <div class="px-6 py-8">
        <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-white mb-2">
            Créer un compte
        </h2>
        <p class="text-center text-gray-600 dark:text-gray-300">
            Rejoignez MoneyMind et gérez votre budget intelligemment
        </p>
    </div>
    <div class="px-6 pb-8">

        <form class="space-y-6" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" placeholder="Nom Prénom" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-2">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" placeholder="exemple@email.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Salaire mensuel -->
            <div class="mt-2">
                <x-input-label for="salaire" :value="__('Salaire mensuel')" />
                <x-text-input type="number" name="salaire" id="salaire" step="0.01" min="0" class="block mt-1 w-full" :value="old('salaire')"
                    required autocomplete="username" placeholder="5000" />
                <x-input-error :messages="$errors->get('salaire')" class="mt-2" />
            </div>
            <!-- Date Salaire mensuel -->
            <div class="mt-2">
                <x-input-label for="salaire" :value="__('Salaire mensuel')" />
                <x-text-input type="date" name="date_credit" id="datesalaire" step="0.01" min="0" class="block mt-1 w-full" :value="old('salaire')"
                    required autocomplete="username" placeholder="5000" />
                <x-input-error :messages="$errors->get('date_credit')" class="mt-2" />
            </div>

            <!-- Photo Upload -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">
                    Photo de profil
                </label>
                <div
                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600
                            border-dashed rounded-xl hover:border-emerald-500 dark:hover:border-emerald-500
                            transition-colors duration-200">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                            viewBox="0 0 48 48">
                            <path
                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600 dark:text-gray-400">
                            <label for="photo"
                                class="relative cursor-pointer rounded-md font-medium
                                                     text-emerald-600 dark:text-emerald-500 hover:text-emerald-500
                                                     dark:hover:text-emerald-400 focus-within:outline-none">
                                <span>Télécharger un fichier</span>
                                <input id="photo" name="photo" type="file" class="sr-only" accept="image/*">
                            </label>
                            <p class="pl-1">ou glisser-déposer</p>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            PNG, JPG jusqu'à 10MB
                        </p>
                    </div>
                </div>
            </div>

            <!-- Password -->
            <div class="mt-2">
                <x-input-label for="password" :value="__('Mot de passe')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" placeholder="••••••••" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-2">
                <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- register btn -->
            <div class="flex items-center justify-center mt-2">
                <x-primary-button class="ms-4">
                    {{ __('Créer mon compte') }}
                </x-primary-button>
            </div>
        </form>
        <!-- Login Link -->
        <p class="mt-8 text-center text-sm text-gray-600 dark:text-gray-400">
            {{ __('Déjà un compte?') }}
            <a href="{{ route('login') }}"
                class="font-medium text-emerald-600 dark:text-emerald-400
                               hover:text-emerald-500 dark:hover:text-emerald-300">
                {{ __('Se connecter') }}
            </a>
        </p>

        <script>
            function toggleDarkMode() {
                const html = document.documentElement;
                html.classList.toggle('dark');

                if (html.classList.contains('dark')) {
                    localStorage.theme = 'dark';
                } else {
                    localStorage.theme = 'light';
                }
            }

            // Preview uploaded image
            document.getElementById('photo').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.createElement('img');
                        preview.src = e.target.result;
                        preview.classList.add('mt-2', 'rounded-full', 'w-16', 'h-16', 'object-cover', 'mx-auto');

                        const container = document.querySelector('.space-y-1');
                        const existingPreview = container.querySelector('img');
                        if (existingPreview) {
                            container.removeChild(existingPreview);
                        }
                        container.appendChild(preview);
                    }
                    reader.readAsDataURL(file);
                }
            });
        </script>
</x-guest-layout>
