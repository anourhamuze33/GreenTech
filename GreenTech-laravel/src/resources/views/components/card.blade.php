<div class="product-card bg-white rounded-2xl shadow-xl overflow-hidden shine-effect">
    <div class="relative">
        <x-card-top />
        <div class="quick-view absolute bottom-4 left-4 right-4">
            <a href="{{route('product.show', $product->id)}}">
                <button
                    class="w-full bg-white/95 backdrop-blur-sm text-green-600 font-semibold py-3 rounded-xl hover:bg-white transition shadow-lg">
                    Voir Details
                </button>
            </a>
        </div>
    </div>
    <div class="p-6">
        <div class="flex items-center justify-between mb-2">
            <span
                class="text-xs text-green-600 font-semibold uppercase tracking-wide">{{$product->category->name}}</span>
            <div class="flex items-center space-x-1">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <span class="text-sm font-semibold text-green-600">{{$product->stock}}</span>
            </div>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">{{$product->name}}</h3>
        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($product->description, 70) }}</p>
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
                <span class="text-gray-600 text-sm ml-1">4.8</span>
            </div>
        </div>

        @if($product->stock===0)
        <div class="flex gap-2">
            <button class="flex-1 bg-gray-400 text-white font-semibold py-3 rounded-xl cursor-not-allowed shadow-lg"
                disabled>
                Epuise
            </button>
            <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 p-3 rounded-xl transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </button>
            <a href="{{route('favorites.toggle', $product->id)}}">
                @if(!in_array($product->id, $favoriteIds))
                <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 p-3 rounded-xl transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>
                @else
                <button class="bg-gray-100 hover:bg-red-100 p-3 rounded-xl transition">
                    <svg class="w-5 h-5 text-red-500 hover:text-red-600 transition" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>
                @endif
            </a>
        </div>
        @else


        <div class="flex gap-2">
            <button
                class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl transition transform hover:scale-105 shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Ajouter
            </button>
            <a href="{{route('favorites.toggle', $product->id)}}">
                @if(!in_array($product->id, $favoriteIds))
                <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 p-3 rounded-xl transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>
                @else
                <button class="bg-gray-100 hover:bg-red-100 p-3 rounded-xl transition">
                    <svg class="w-5 h-5 text-red-500 hover:text-red-600 transition" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>
                @endif
            </a>
        </div>
        @endif
        <!-- Added Date -->
        <div class="mt-3 pt-3 border-t border-gray-200">
            <p class="text-xs text-gray-500 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Ajouté le {{ $product->created_at->format('d/m/Y') }}
            </p>
        </div>
    </div>
</div>