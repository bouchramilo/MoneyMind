<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MoneyMind</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Animation on scroll library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:pt-8 lg:p-0 items-center lg:justify-center min-h-screen flex-col">
    <header class="w-full lg:max-w-6xl max-w-[450px] text-sm mb-6 not-has-[nav]:hidden bg-white dark:bg-gray-800 ">
        @if (Route::has('login'))
            <nav
                class="flex flex-col lg:flex-row md:flex-row items-center justify-between gap-4 mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">
                        MoneyMind
                    </a>
                </div>
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border dark:border-[#3E3E3A] dark:hover:border-emerald-600 rounded-full text-sm leading-normal text-emerald-600 hover:text-emerald-700 transition-colors">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] text-sm leading-normal text-emerald-600 hover:text-emerald-700 transition-colors rounded-full">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border dark:border-[#3E3E3A] dark:hover:border-[#62605b] text-sm leading-normal text-white bg-emerald-600 rounded-full hover:bg-emerald-700
                                  transition-all transform hover:scale-105 shadow-sm hover:shadow-md">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            </nav>
        @endif
    </header>
    {{-- ***************************************************** --}}

    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 px-4 sm:px-6 overflow-hidden">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-2 gap-8 md:gap-12 items-center">
                <!-- Text Content -->
                <div data-aos="fade-right" data-aos-duration="1000" class="text-center md:text-left">
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-4 md:mb-6 leading-tight">
                        Gérez votre budget <span class="text-emerald-600">intelligemment</span> avec l'IA
                    </h1>
                    <p class="text-lg md:text-xl text-gray-600 mb-6 md:mb-8 max-w-2xl mx-auto md:mx-0">
                        Simplifiez votre gestion financière avec des suggestions personnalisées et un suivi automatique
                        de vos dépenses.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <a href="/register"
                            class="px-8 py-3 bg-emerald-600 text-white rounded-full hover:bg-emerald-700
                              transition-all transform hover:scale-105 shadow-lg hover:shadow-xl
                              text-base md:text-lg font-medium w-full sm:w-auto text-center">
                            Commencer gratuitement
                        </a>
                        <a href="#demo"
                            class="px-8 py-3 border-2 border-emerald-600 text-emerald-600
                              rounded-full hover:bg-emerald-50 transition-all
                              text-base md:text-lg font-medium w-full sm:w-auto text-center">
                            Voir la démo
                        </a>
                    </div>
                </div>

                <!-- Image Content -->
                <div data-aos="fade-left" data-aos-duration="1000"
                    class="relative w-full max-w-lg mx-auto md:max-w-none order-first md:order-last mb-8 md:mb-0">
                    <!-- Decorative background -->
                    <div
                        class="absolute -inset-4 bg-emerald-100 rounded-2xl transform rotate-6
                            opacity-70 blur-sm transition-transform group-hover:rotate-8">
                    </div>

                    <!-- Main image -->
                    <div class="relative">
                        <img src="{{ asset('images/logo_2.png') }}" alt="Dashboard Preview"
                            class="relative rounded-xl shadow-2xl w-full h-auto object-cover
                                transform transition-transform duration-300 hover:scale-[1.02]">

                        <!-- Floating elements -->
                        <div
                            class="absolute -right-4 -bottom-4 bg-white rounded-lg shadow-lg p-4
                                transform rotate-3 hidden md:block">
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                                <span class="text-sm font-medium text-gray-600">Budget optimisé</span>
                            </div>
                        </div>

                        <div
                            class="absolute -left-4 top-1/2 bg-white rounded-lg shadow-lg p-4
                                transform -rotate-3 hidden md:block">
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                                <span class="text-sm font-medium text-gray-600">IA Intégrée</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative blob -->
        <div
            class="absolute top-1/2 right-0 transform translate-x-1/2 -translate-y-1/2
                w-96 h-96 bg-emerald-50 rounded-full blur-3xl opacity-50
                pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 transform -translate-x-1/2
                w-96 h-96 bg-emerald-50 rounded-full blur-3xl opacity-50
                pointer-events-none">
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="relative py-20 bg-white overflow-hidden">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-16" data-aos="fade-up">
                Fonctionnalités principales
            </h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature Card 1 -->
                <div data-aos="fade-up" data-aos-delay="100"
                    class="p-6 rounded-xl bg-gray-50 hover:shadow-xl transition-all transform hover:-translate-y-2">
                    <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <!-- Add your SVG path here -->
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Suivi Automatique</h3>
                    <p class="text-gray-600">Gestion automatisée des salaires et dépenses récurrentes pour un contrôle
                        sans effort.</p>
                </div>

                <!-- Feature Card 2 -->
                <div data-aos="fade-up" data-aos-delay="200"
                    class="p-6 rounded-xl bg-gray-50 hover:shadow-xl transition-all transform hover:-translate-y-2">
                    <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <!-- Add your SVG path here -->
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Suivi Automatique</h3>
                    <p class="text-gray-600">Gestion automatisée des salaires et dépenses récurrentes pour un contrôle
                        sans effort.</p>
                </div>

                <!-- Feature Card 3 -->
                <div data-aos="fade-up" data-aos-delay="300"
                    class="p-6 rounded-xl bg-gray-50 hover:shadow-xl transition-all transform hover:-translate-y-2">
                    <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <!-- Add your SVG path here -->
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Suivi Automatique</h3>
                    <p class="text-gray-600">Gestion automatisée des salaires et dépenses récurrentes pour un contrôle
                        sans effort.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How it works Section -->
    <section id="how-it-works" class="relative py-20 bg-gray-50 overflow-hidden container">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-16" data-aos="fade-up">
                Comment ça marche
            </h2>
            <div class="relative">
                <!-- Timeline line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-emerald-200 hidden md:block">
                </div>

                <!-- Timeline items -->
                <div class="grid grid-cols-1 gap-12 relative z-10">
                    <!-- Étape 1 -->
                    <div data-aos="fade-right"
                        class="relative flex items-center justify-end md:justify-start md:even:justify-end group">
                        <div
                            class="w-full md:w-5/12 p-6 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:-translate-y-1">
                            <div
                                class="absolute top-1/2 -translate-y-1/2 hidden md:block
                                      group-even:left-[calc(100%+2rem)] group-even:right-auto
                                      group-odd:right-[calc(100%+2rem)] group-odd:left-auto
                                      w-4 h-4 bg-emerald-400 rounded-full border-4 border-white">
                            </div>
                            <span
                                class="inline-block px-3 py-1 bg-emerald-100 text-emerald-600 rounded-full text-sm font-semibold mb-3">Étape
                                1</span>
                            <h3 class="text-xl font-semibold mb-2">Créez votre compte</h3>
                            <p class="text-gray-600">Inscrivez-vous en quelques clics et configurez votre profil
                                financier avec votre salaire mensuel et la date de crédit.</p>
                        </div>
                    </div>

                    <!-- Étape 2 -->
                    <div data-aos="fade-left"
                        class="relative flex items-center justify-end md:justify-start md:even:justify-end group">
                        <div
                            class="w-full md:w-5/12 p-6 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:-translate-y-1">
                            <div
                                class="absolute top-1/2 -translate-y-1/2 hidden md:block
                                      group-even:left-[calc(100%+2rem)] group-even:right-auto
                                      group-odd:right-[calc(100%+2rem)] group-odd:left-auto
                                      w-4 h-4 bg-emerald-400 rounded-full border-4 border-white">
                            </div>
                            <span
                                class="inline-block px-3 py-1 bg-emerald-100 text-emerald-600 rounded-full text-sm font-semibold mb-3">Étape
                                2</span>
                            <h3 class="text-xl font-semibold mb-2">Configurez vos dépenses récurrentes</h3>
                            <p class="text-gray-600">Ajoutez vos dépenses mensuelles fixes comme le loyer, les
                                abonnements et les factures pour un suivi automatique.</p>
                            <div class="mt-4 p-3 bg-emerald-50 rounded-lg">
                                <p class="text-sm text-emerald-600">💡 Exemple: "Loyer - 3000 DH, prélevé chaque 1er du
                                    mois"</p>
                            </div>
                        </div>
                    </div>

                    <!-- Étape 3 -->
                    <div data-aos="fade-right"
                        class="relative flex items-center justify-end md:justify-start md:even:justify-end group">
                        <div
                            class="w-full md:w-5/12 p-6 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:-translate-y-1">
                            <div
                                class="absolute top-1/2 -translate-y-1/2 hidden md:block
                                      group-even:left-[calc(100%+2rem)] group-even:right-auto
                                      group-odd:right-[calc(100%+2rem)] group-odd:left-auto
                                      w-4 h-4 bg-emerald-400 rounded-full border-4 border-white">
                            </div>
                            <span
                                class="inline-block px-3 py-1 bg-emerald-100 text-emerald-600 rounded-full text-sm font-semibold mb-3">Étape
                                3</span>
                            <h3 class="text-xl font-semibold mb-2">Définissez vos objectifs</h3>
                            <p class="text-gray-600">Fixez des objectifs d'épargne et créez votre liste de souhaits
                                pour suivre votre progression.</p>
                            <div class="mt-4 flex gap-3">
                                <div class="flex-1 p-3 bg-emerald-50 rounded-lg">
                                    <p class="text-sm text-emerald-600">🎯 Objectif: "Épargner 500 DH/mois"</p>
                                </div>
                                <div class="flex-1 p-3 bg-emerald-50 rounded-lg">
                                    <p class="text-sm text-emerald-600">🛍️ Souhait: "Nouveau téléphone"</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Étape 4 -->
                    <div data-aos="fade-left"
                        class="relative flex items-center justify-end md:justify-start md:even:justify-end group">
                        <div
                            class="w-full md:w-5/12 p-6 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:-translate-y-1">
                            <div
                                class="absolute top-1/2 -translate-y-1/2 hidden md:block
                                      group-even:left-[calc(100%+2rem)] group-even:right-auto
                                      group-odd:right-[calc(100%+2rem)] group-odd:left-auto
                                      w-4 h-4 bg-emerald-400 rounded-full border-4 border-white">
                            </div>
                            <span
                                class="inline-block px-3 py-1 bg-emerald-100 text-emerald-600 rounded-full text-sm font-semibold mb-3">Étape
                                4</span>
                            <h3 class="text-xl font-semibold mb-2">Recevez des conseils personnalisés</h3>
                            <p class="text-gray-600">Notre IA analyse vos habitudes de dépenses et vous propose des
                                suggestions pour optimiser votre budget.</p>
                            <div class="mt-4 p-4 bg-emerald-50 rounded-lg border border-emerald-100">
                                <p class="text-sm text-emerald-700 italic">"Conseil: Réduisez vos dépenses de
                                    restauration de 15% ce mois-ci pour atteindre votre objectif d'épargne plus
                                    rapidement! 🎯"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-200 w-full dark:bg-gray-800 shadow-sm mt-auto">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div class="text-gray-500 dark:text-gray-400 text-sm">
                    © 2024 MoneyMind. Tous droits réservés.
                </div>
            </div>
        </div>
    </footer>


    {{-- ***************************************************** --}}

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif

    {{-- ***************************************************** --}}
    <!-- Initialize AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 100,
            duration: 800,
        });
    </script>

    <!-- Add this script at the end of your body tag -->
    <script>
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            const menuClosedIcon = document.getElementById('menu-closed-icon');
            const menuOpenIcon = document.getElementById('menu-open-icon');

            mobileMenu.classList.toggle('hidden');
            menuClosedIcon.classList.toggle('hidden');
            menuOpenIcon.classList.toggle('hidden');
        }

        // Close mobile menu when clicking on a link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('mobile-menu').classList.add('hidden');
                document.getElementById('menu-closed-icon').classList.remove('hidden');
                document.getElementById('menu-open-icon').classList.add('hidden');
            });
        });

        // Close mobile menu when scrolling
        let lastScroll = 0;
        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            if (currentScroll > lastScroll) {
                document.getElementById('mobile-menu').classList.add('hidden');
                document.getElementById('menu-closed-icon').classList.remove('hidden');
                document.getElementById('menu-open-icon').classList.add('hidden');
            }
            lastScroll = currentScroll;
        });
    </script>
    {{-- ***************************************************** --}}

</body>

</html>
