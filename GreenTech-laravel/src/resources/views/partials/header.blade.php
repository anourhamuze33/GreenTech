       <!-- HEADER -->
        <header class="gradient-bg text-white shadow-2xl sticky top-0 z-30 backdrop-blur-sm">
            <div class="container mx-auto px-6 py-2">
                <div class="flex items-center justify-between">
                    <!-- Page Title -->
                    <div class="flex items-center space-x-4">
                        <button onclick="toggleSidebar()" class="lg:hidden p-2 hover:bg-white/10 rounded-lg transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <div>
                            <h2 class="text-xl font-bold">Catalogue Produits</h2>
                            <p class="text-xs text-green-100">248 produits disponibles</p>
                        </div>
                    </div>

                    <!-- Right Actions -->
                    <div class="flex items-center space-x-4">
                        <button class="relative hover:scale-110 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">5</span>
                        </button>

                        <button class="relative hover:scale-110 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center pulse-animation">3</span>
                        </button>

                        <div class="w-10 h-10 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center cursor-pointer transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="container mx-auto px-6 pb-3">
                <form action="{{ route('products.index') }}" method="GET" class="max-w-3xl mx-auto relative">
                    <input name="search" type="text" placeholder="Rechercher des plantes, graines, outils..."
                        value="{{$search}}"
                    class="w-full px-6 py-3 rounded-xl bg-white/95 backdrop-blur-sm text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-green-300 shadow-lg">
                    <button class="absolute right-2 top-1/2 -translate-y-1/2 bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>
            </div>
        </header>