@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'appearance-none relative block w-full pl-10 pr-3 py-3
                                              border border-gray-300 dark:border-gray-600 rounded-xl
                                              placeholder-gray-500 dark:placeholder-gray-400
                                              text-gray-900 dark:text-white
                                              bg-white dark:bg-gray-700
                                              focus:outline-none focus:ring-2 focus:ring-emerald-500
                                              focus:border-emerald-500 focus:z-10 sm:text-sm
                                              transition-colors duration-200']) }}>
