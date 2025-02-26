{{-- <button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button> --}}


<!-- Submit Button -->
<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'group relative w-full flex justify-center py-3 px-4
    text-sm font-medium rounded-xl text-white
    bg-emerald-600 dark:bg-emerald-500
    hover:bg-emerald-700 dark:hover:bg-emerald-600
    focus:outline-none focus:ring-2 focus:ring-offset-2
    focus:ring-emerald-500 dark:focus:ring-offset-gray-800
    transition-colors duration-200',
    ]) }}>
    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
        <svg class="h-5 w-5 text-emerald-500 dark:text-emerald-400 group-hover:text-emerald-400" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </span>
    {{ $slot }}
</button>
