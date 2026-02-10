    <!-- LEFT SIDEBAR -->
    <aside id="sidebar" class="sidebar fixed left-0 top-0 h-full w-64 bg-white shadow-2xl z-40 overflow-y-auto">
        <div class="p-6">
            <!-- Logo -->
            <div class="flex items-center space-x-3 mb-8 pb-6 border-b border-gray-200">
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17 8C8 10 5.9 16.17 3.82 21.34l1.89.92c.85-2.15 1.98-4.77 3.65-7.27C11.59 17.88 13.81 19 16 19c3.31 0 6-2.69 6-6 0-4-3-6-5-5zm-2 7c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z"/>
                        <path d="M12.5 9.5c-1.38 0-2.5 1.12-2.5 2.5s1.12 2.5 2.5 2.5 2.5-1.12 2.5-2.5-1.12-2.5-2.5-2.5z" opacity="0.5"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-lg font-bold text-gray-800">Jardin Vert</h1>
                    <p class="text-xs text-gray-500">Menu Principal</p>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="space-y-2">
                <a href="#" class="flex items-center space-x-3 px-4 py-3 bg-gray-100 rounded-lg text-gray-800 font-medium hover:bg-green-50 hover:text-green-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Accueil</span>
                </a>

                <a href="{{route('products.index')}}" class="flex items-center space-x-3 px-4 py-3 bg-green-600 rounded-lg text-white font-medium shadow-lg transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span>Produits</span>
                </a>

                <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    <span>Categories</span>
                </a>

                <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span>Commandes</span>
                </a>

                <a href="{{route('favorites.index')}}" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    <span>Favoris</span>
                </a>

                <a href="{{route('users.index')}}" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <span>users</span>
                </a>
                <a href="{{route('roles.index')}}" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <span>roles</span>
                </a>

                <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-green-50 hover:text-green-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Parametres</span>
                </a>
            </nav>

            <!-- Promo Banner -->
            <div class="mt-8 p-4 bg-gradient-to-br from-green-500 to-green-600 rounded-xl text-white">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-semibold">Offre Speciale</span>
                    <span class="text-xs bg-white/20 px-2 py-1 rounded-full">-30%</span>
                </div>
                <p class="text-xs mb-3 opacity-90">Profitez de notre promotion sur tous les outils de jardin</p>
                <button class="w-full bg-white text-green-600 text-sm font-semibold py-2 rounded-lg hover:bg-green-50 transition">
                    Voir les offres
                </button>
            </div>
        </div>
    </aside>
