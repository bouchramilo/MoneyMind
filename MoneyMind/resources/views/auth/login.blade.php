<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Form Header -->
    <div class="px-6 py-8">
        <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-white mb-2">
            Bienvenue
        </h2>
        <p class="text-center text-gray-600 dark:text-gray-300">
            Connectez-vous à votre compte
        </p>
    </div>

    <div class="px-6 pb-8">

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email Input -->
            <div>
                <x-input-label for="email" :value="__('Adresse Email')"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </div>
                    <x-text-input id="email" name="email" :value="old('email')" type="email"
                        class="appearance-none relative block w-full pl-10 pr-3 py-3
                                  border border-gray-300 dark:border-gray-600 rounded-xl
                                  placeholder-gray-500 dark:placeholder-gray-400
                                  text-gray-900 dark:text-white
                                  bg-white dark:bg-gray-700
                                  focus:outline-none focus:ring-2 focus:ring-emerald-500
                                  focus:border-emerald-500 focus:z-10 sm:text-sm
                                  transition-colors duration-200"
                        placeholder="exemple@email.com" required autofocus autocomplete="username" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password Input -->
            <div>
                <x-input-label for="password" :value="__('Mot de passe')"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <x-text-input id="password" name="password" type="password"
                        class="appearance-none relative block w-full pl-10 pr-3 py-3
                                  border border-gray-300 dark:border-gray-600 rounded-xl
                                  placeholder-gray-500 dark:placeholder-gray-400
                                  text-gray-900 dark:text-white
                                  bg-white dark:bg-gray-700
                                  focus:outline-none focus:ring-2 focus:ring-emerald-500
                                  focus:border-emerald-500 focus:z-10 sm:text-sm
                                  transition-colors duration-200"
                        placeholder="Votre mot de passe" required autocomplete="current-password" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox"
                        class="h-4 w-4 text-emerald-600 focus:ring-emerald-500
                                  border-gray-300 dark:border-gray-600 rounded
                                  transition-colors duration-200">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                        Se souvenir de moi
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a class="text-sm font-medium text-emerald-600 dark:text-emerald-400
                                 hover:text-emerald-500 dark:hover:text-emerald-300"
                        href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-primary-button class="ms-3">
                    {{ __('Se connecter') }}
                </x-primary-button>
            </div>
        </form>
        <!-- Register Link -->
        <p class="mt-8 text-center text-sm text-gray-600 dark:text-gray-400">
            Pas encore de compte?
            <a href="{{ route('register') }}"
                class="font-medium text-emerald-600 dark:text-emerald-400
                                     hover:text-emerald-500 dark:hover:text-emerald-300">
                Créer un compte
            </a>
        </p>
    </div>
</x-guest-layout>
