<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Produits - Jardin Vert</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Animated gradient background */
        .gradient-bg {
            background: linear-gradient(-45deg, #1b5e20, #2e7d32, #388e3c, #43a047);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Floating animation */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        /* Product card hover effect */
        .product-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .product-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        /* Shine effect on hover */
        .shine-effect {
            position: relative;
            overflow: hidden;
        }

        .shine-effect::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .shine-effect:hover::before {
            left: 100%;
        }

        /* Badge pulse animation */
        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.05);
                opacity: 0.8;
            }
        }

        .pulse-animation {
            animation: pulse 2s ease-in-out infinite;
        }

        /* Leaf decoration */
        .leaf-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 10c5 0 10 5 10 10s-5 10-10 10-10-5-10-10 5-10 10-10z' fill='%2366bb6a' opacity='0.05'/%3E%3C/svg%3E");
        }
    </style>
</head>

<body class="bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 min-h-screen">

    <!-- HEADER -->
    <header class="gradient-bg text-white shadow-2xl sticky top-0 z-50 backdrop-blur-sm">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div
                        class="w-14 h-14 bg-white rounded-full flex items-center justify-center shadow-lg float-animation">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold tracking-wide">Jardin Vert</h1>
                        <p class="text-xs text-green-100">Votre boutique de jardinage</p>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="#" class="hover:text-green-200 transition font-medium">Accueil</a>
                    <a href="#"
                        class="hover:text-green-200 transition font-medium border-b-2 border-white pb-1">Produits</a>
                    <a href="#" class="hover:text-green-200 transition font-medium">Catégories</a>
                    <a href="#" class="hover:text-green-200 transition font-medium">Contact</a>
                </nav>

                <!-- Cart & User -->
                <div class="flex items-center space-x-4">
                    <button class="relative hover:scale-110 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span
                            class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center pulse-animation">3</span>
                    </button>
                    <button class="bg-white/20 hover:bg-white/30 px-4 py-2 rounded-full backdrop-blur-sm transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="container mx-auto px-6 pb-6">
            <div class="max-w-2xl mx-auto relative">
                <input type="text" placeholder="Rechercher des plantes, graines, outils..."
                    class="w-full px-6 py-4 rounded-full bg-white/95 backdrop-blur-sm text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-green-300 shadow-lg">
                <button
                    class="absolute right-2 top-1/2 -translate-y-1/2 bg-green-600 hover:bg-green-700 text-white px-6 py-2.5 rounded-full transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="container mx-auto px-6 py-12 leaf-pattern">

        <!-- Page Title Section -->
        <div class="text-center mb-16">
            <h2 class="text-5xl font-bold text-green-800 mb-4">Nos Produits</h2>
            <div
                class="w-32 h-1.5 bg-gradient-to-r from-green-400 via-green-600 to-green-400 mx-auto rounded-full mb-6">
            </div>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Découvrez notre sélection de produits pour votre jardin
            </p>
        </div>

        <!-- Filter Pills -->
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <button
                class="px-6 py-2.5 bg-green-600 text-white rounded-full font-medium shadow-lg hover:bg-green-700 transition">
                Tous
            </button>
            <button
                class="px-6 py-2.5 bg-white text-green-700 rounded-full font-medium shadow hover:shadow-lg hover:bg-green-50 transition">
                Plantes
            </button>
            <button
                class="px-6 py-2.5 bg-white text-green-700 rounded-full font-medium shadow hover:shadow-lg hover:bg-green-50 transition">
                Graines
            </button>
            <button
                class="px-6 py-2.5 bg-white text-green-700 rounded-full font-medium shadow hover:shadow-lg hover:bg-green-50 transition">
                Outils
            </button>
        </div>
        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

            <!-- Product Card 1 -->
            @foreach($products as $product)
            <div class="product-card bg-white rounded-2xl shadow-xl overflow-hidden shine-effect">
                <div class="relative">
                    <div class="h-64 bg-gradient-to-br from-green-100 to-emerald-100 flex items-center justify-center">
                        <svg class="w-32 h-32 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span
                        class="absolute top-4 right-4 bg-red-500 text-white text-xs font-bold px-3 py-1.5 rounded-full pulse-animation">
                        -20%
                    </span>
                    <span
                        class="absolute top-4 left-4 bg-green-600 text-white text-xs font-bold px-3 py-1.5 rounded-full">
                        Nouveau
                    </span>
                </div>
                <div class="p-6">
                    <span
                        class="text-xs text-green-600 font-semibold uppercase tracking-wide">{{$product->category->name}}</span>
                    <h3 class="text-xl font-bold text-gray-800 mt-2 mb-3">{{$product->name}}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{$product->description}}</p>
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <span class="text-2xl font-bold text-green-600">{{$product->price}} MAD</span>
                            <span class="text-sm text-gray-400 line-through ml-2">110 MAD</span>
                        </div>
                        <div class="flex items-center text-yellow-400">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <span class="text-gray-600 text-sm ml-1">4.8 (24)</span>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button
                            class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl transition transform hover:scale-105 shadow-lg">
                            Ajouter
                        </button>
                        <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 p-3 rounded-xl transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-16">
            <a href="{{route('product.create')}}">
                <button
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold px-12 py-4 rounded-full shadow-xl hover:shadow-2xl transition transform hover:scale-105">
                    Charger Plus de Produits
                </button>
            </a>
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="gradient-bg text-white mt-20">
        <div class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">

                <!-- About -->
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center">
                            <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">Jardin Vert</h3>
                    </div>
                    <p class="text-green-100 text-sm leading-relaxed">
                        Votre partenaire de confiance pour tous vos besoins de jardinage. Qualité, passion et expertise
                        depuis 2020.
                    </p>
                    <div class="flex space-x-4 mt-6">
                        <a href="#"
                            class="w-10 h-10 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-bold mb-6">Liens Rapides</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-green-100 hover:text-white transition flex items-center">
                                <span class="mr-2">→</span> À propos
                            </a></li>
                        <li><a href="#" class="text-green-100 hover:text-white transition flex items-center">
                                <span class="mr-2">→</span> Nos Produits
                            </a></li>
                        <li><a href="#" class="text-green-100 hover:text-white transition flex items-center">
                                <span class="mr-2">→</span> Blog
                            </a></li>
                        <li><a href="#" class="text-green-100 hover:text-white transition flex items-center">
                                <span class="mr-2">→</span> FAQ
                            </a></li>
                        <li><a href="#" class="text-green-100 hover:text-white transition flex items-center">
                                <span class="mr-2">→</span> Contact
                            </a></li>
                    </ul>
                </div>

                <!-- Categories -->
                <div>
                    <h4 class="text-lg font-bold mb-6">Catégories</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-green-100 hover:text-white transition flex items-center">
                                <span class="mr-2">🌿</span> Plantes d'Intérieur
                            </a></li>
                        <li><a href="#" class="text-green-100 hover:text-white transition flex items-center">
                                <span class="mr-2">🌳</span> Plantes d'Extérieur
                            </a></li>
                        <li><a href="#" class="text-green-100 hover:text-white transition flex items-center">
                                <span class="mr-2">🌾</span> Graines Bio
                            </a></li>
                        <li><a href="#" class="text-green-100 hover:text-white transition flex items-center">
                                <span class="mr-2">🛠️</span> Outils de Jardin
                            </a></li>
                        <li><a href="#" class="text-green-100 hover:text-white transition flex items-center">
                                <span class="mr-2">💧</span> Irrigation
                            </a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-lg font-bold mb-6">Contactez-Nous</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-green-100 text-sm">123 Rue du Jardin, Casablanca, Maroc</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="text-green-100 text-sm">+212 5XX-XXXXXX</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-green-100 text-sm">contact@jardinvert.ma</span>
                        </li>
                    </ul>

                    <!-- Newsletter -->
                    <div class="mt-6">
                        <p class="text-green-100 text-sm mb-3">Abonnez-vous à notre newsletter</p>
                        <div class="flex">
                            <input type="email" placeholder="Votre email"
                                class="flex-1 px-4 py-2 rounded-l-lg bg-white/10 backdrop-blur-sm border border-white/20 text-white placeholder-green-200 focus:outline-none focus:bg-white/20">
                            <button
                                class="bg-white text-green-600 px-4 py-2 rounded-r-lg font-semibold hover:bg-green-50 transition">
                                OK
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-white/20">
            <div class="container mx-auto px-6 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-green-100 text-sm mb-4 md:mb-0">
                        © 2026 Jardin Vert. Tous droits réservés.
                    </p>
                    <div class="flex space-x-6 text-sm">
                        <a href="#" class="text-green-100 hover:text-white transition">Politique de confidentialité</a>
                        <a href="#" class="text-green-100 hover:text-white transition">Conditions d'utilisation</a>
                        <a href="#" class="text-green-100 hover:text-white transition">Mentions légales</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>