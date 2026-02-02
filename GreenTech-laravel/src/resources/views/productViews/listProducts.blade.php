@extends('layouts.app')

@section('title', 'Catalogue Produits')

@section('content')
<!-- Filter Pills -->
<div class="flex flex-wrap items-center justify-between gap-4 mb-12">
    <div class="flex flex-wrap gap-3">
        <a href="{{ route('products.index') }}">
        @if(isset($cate))
        <button
            class="tous px-6 py-2.5 bg-white text-green-700 rounded-full font-medium shadow hover:shadow-lg
            hover:bg-green-50 transition">
            Tous
        </button>
        @else
        <button
            class="tous px-6 py-2.5 bg-green-600 text-white rounded-full font-medium shadow-lg hover:bg-green-700 transition">
            Tous
        </button>
        @endif
        </a>

        @foreach ($categories as $category)
        @if(isset($cate) && $category->id==$cate)
            <button type="submit" data-category-id="{{ $category->id }}"
            class=" categories px-6 py-2.5 bg-green-600 text-white rounded-full font-medium shadow-lg hover:bg-green-700 transition">
            {{ $category->name }}
           </button>
        @endif
        @continue(isset($cate) && $category->id==$cate)
        <form action="{{ route('products.index') }}" method="GET"
            class="max-w-3xl mx-auto relative">
            <input type="hidden" name="category" value="{{$category->id}}">
            <button type="submit" data-category-id="{{ $category->id }}" class=" categories px-6 py-2.5 bg-white text-green-700 rounded-full font-medium shadow hover:shadow-lg
            hover:bg-green-50 transition">
                {{ $category->name }}
            </button>
        </form>
        @endforeach

    </div>

    <div class="flex items-center gap-3">
        <select
            class="px-4 py-2.5 bg-white border border-gray-300 rounded-lg font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-300">
            <option>Trier par: Populaire</option>
            <option>Prix: Croissant</option>
            <option>Prix: Decroissant</option>
            <option>Nouveautes</option>
            <option>Meilleures ventes</option>
        </select>

        <button class="p-2.5 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 10h16M4 14h16M4 18h16" />
            </svg>
        </button>

        <button class="p-2.5 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
        </button>
    </div>
</div>

<!-- Products Grid -->
<div class="containercard grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
    @foreach($products as $product)
    <x-card :product="$product" />
    @endforeach
    <!-- Product Card 6 - Lavender -->
    <div class="product-card bg-white rounded-2xl shadow-xl overflow-hidden shine-effect">
        <div class="relative">
            <x-card-top />
            <div class="quick-view absolute bottom-4 left-4 right-4">
                <button
                    class="w-full bg-white/95 backdrop-blur-sm text-green-600 font-semibold py-3 rounded-xl hover:bg-white transition shadow-lg">
                    Voir Details
                </button>
            </div>
        </div>
        <div class="p-6">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs text-purple-600 font-semibold uppercase tracking-wide">Plantes</span>
                <div class="flex items-center space-x-1">
                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span class="text-sm font-semibold text-red-600">0</span>
                </div>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Lavande Provence</h3>
            <p class="text-gray-600 text-sm mb-4">Lavande parfumee variete francaise</p>
            <div class="flex items-center justify-between mb-4">
                <div>
                    <span class="text-2xl font-bold text-green-600">95 MAD</span>
                </div>
                <div class="flex items-center text-yellow-400">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                        <path
                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                    </svg>
                    <span class="text-gray-600 text-sm ml-1">5.0</span>
                </div>
            </div>
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
            </div>
        </div>
    </div>
</div>

<!-- Load More Button -->
<a href="{{route('product.create')}}">
<div class="text-center mt-16">
    <button
    class="bg-green-600 hover:bg-green-700 text-white font-semibold px-12 py-4 rounded-full shadow-xl hover:shadow-2xl transition transform hover:scale-105">
    Charger Plus de Produits
</button>
</div>
</a>
{{ $products->links() }}
<script src="{{ asset('js/filter.js') }}"></script>
@endsection
