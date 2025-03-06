<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Modifier Salaire') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Modifier Votre salaire et la date d'ajout la salaire dans le mois.") }}
        </p>
    </header>

    {{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form> --}}

    <form method="post" action="{{ route('profile.update.salary') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')

        <div>
            <x-input-label for="salaire" :value="__('Salaire')" />
            <x-text-input id="salaire" name="salaire" type="number" class="mt-1 block w-full" :value="old('salaire', $user->salaire)" required autofocus autocomplete="salaire" />
            <x-input-error class="mt-2" :messages="$errors->get('salaire')" />
        </div>

        <div>
            <x-input-label for="date_credit" :value="__('date de crédit')" />
            <x-text-input id="date_credit" name="date_credit" type="date" class="mt-1 block w-full" :value="old('date_credit', $user->date_credit)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('date_credit')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
