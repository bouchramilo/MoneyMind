<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

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
                    <div class="text-center">
                        <img id="imagePreview" src="{{ asset('storage/' . $user->photo) }}"
                             class="mt-2 rounded-full w-16 h-16 object-cover mx-auto"
                             alt="Photo de profil">
                    </div>
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

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
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

<script>
    document.getElementById('photo').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

</script>
