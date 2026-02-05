@extends('layouts.app')

@section('title', 'Mes Favoris')

@section('content')

<!-- Header Section with Stats -->
<div class="mb-8">
    <div class="bg-gradient-to-r from-green-600 to-emerald-600 rounded-2xl p-8 shadow-2xl relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full -ml-24 -mb-24"></div>

        <div class="relative z-10 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2 flex items-center gap-3">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    Mes Produits Favoris
                </h1>
                <p class="text-green-100">Retrouvez tous vos produits préférés en un seul endroit</p>
            </div>
            <div class="hidden md:flex items-center gap-6">
                <div class="text-center bg-white/20 backdrop-blur-sm rounded-xl px-6 py-3 border border-white/30">
                    <p class="text-3xl font-bold text-white">{{ $nbrtotal }}</p>
                    <p class="text-green-100 text-sm">Favoris</p>
                </div>
                <div class="text-center bg-white/20 backdrop-blur-sm rounded-xl px-6 py-3 border border-white/30">
                    <p class="text-3xl font-bold text-white">{{ $nbrDisponible }}</p>
                    <p class="text-green-100 text-sm">Disponibles</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Filter and Sort Section -->
<div class="flex flex-wrap items-center justify-between gap-4 mb-8">
    <div class="flex flex-wrap gap-3">
        <a href="{{route('favorites.filter', 1)}}">
            @if(isset($filter)||!isset($filter))
            <button
                class="px-6 py-2.5 bg-green-600 text-white rounded-full font-medium shadow-lg hover:bg-green-700 transition">
                Tous ({{ $nbrtotal }})
            </button>
            @else
            <button
                class="px-6 py-2.5 bg-white text-green-700 rounded-full font-medium shadow hover:shadow-lg hover:bg-green-50 transition">
                Tous ({{ $nbrtotal }})
            </button>
            @endif
        </a>
        <a href="{{route('favorites.filter', 2)}}">
            @if(isset($filter) && $filter==2)
            <button
                class="px-6 py-2.5 bg-green-600 text-white rounded-full font-medium shadow-lg hover:bg-green-700 transition">
                Disponibles ({{ $nbrDisponible }})
            </button>
            @else
            <button
                class="px-6 py-2.5 bg-white text-green-700 rounded-full font-medium shadow hover:shadow-lg hover:bg-green-50 transition">
                Disponibles ({{ $nbrDisponible }})
            </button>
            @endif

        </a>
        <a href="{{route('favorites.filter', 3)}}">
            @if(isset($filter) && $filter==3)
            <button
                class="px-6 py-2.5 bg-red-600 text-white rounded-full font-medium shadow-lg hover:bg-red-700 transition">
                Épuisés ({{ $nbrEpuise }})
            </button>
            @else
            <button
                class="px-6 py-2.5 bg-white text-red-700 rounded-full font-medium shadow hover:shadow-lg hover:bg-red-50 transition">
                Épuisés ({{ $nbrEpuise }})
            </button>
            @endif
        </a>
    </div>

    <div class="flex items-center gap-3">
        <select
            class="px-4 py-2.5 bg-white border border-gray-300 rounded-lg font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-300">
            <option>Trier par: Date d'ajout</option>
            <option>Prix: Croissant</option>
            <option>Prix: Décroissant</option>
            <option>Nom: A-Z</option>
        </select>

        <button
            class="px-4 py-2.5 bg-red-50 border border-red-300 rounded-lg font-medium text-red-600 hover:bg-red-100 transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            <span class="hidden sm:inline">Tout supprimer</span>
        </button>
    </div>
</div>

@if($nbrtotal > 0)
<!-- Products Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach($products as $product)
    <div
        class="product-card bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 relative group">

        <div class="relative">
            <x-card-top />
            <div
                class="quick-view absolute bottom-4 left-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <a href="{{route('product.show', $product->id)}}">
                    <button
                        class="w-full bg-white/95 backdrop-blur-sm text-green-600 font-semibold py-3 rounded-xl hover:bg-white transition shadow-lg">
                        Voir Détails
                    </button>
                </a>
            </div>
        </div>
        <div class="p-6">
            <!-- Category and Stock -->
            <div class="flex items-center justify-between mb-2">
                <span
                    class="text-xs text-green-600 font-semibold uppercase tracking-wide bg-green-50 px-3 py-1 rounded-full">
                    {{$product->category->name}}
                </span>
                <div class="flex items-center space-x-1 bg-gray-100 px-2 py-1 rounded-lg">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span class="text-sm font-semibold text-green-600">{{$product->stock}}</span>
                </div>
            </div>

            <!-- Product Name -->
            <h3 class="text-xl font-bold text-gray-800 mb-2 line-clamp-1">{{$product->name}}</h3>

            <!-- Description -->
            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ Str::limit($product->description, 70) }}</p>

            <!-- Price and Rating -->
            <div class="flex items-center justify-between mb-4">
                <div>
                    <span class="text-2xl font-bold text-green-600">{{$product->price}} MAD</span>
                    <span class="text-sm text-gray-400 line-through ml-2">110 MAD</span>
                </div>
                <div class="flex items-center bg-yellow-50 px-2 py-1 rounded-lg">
                    <svg class="w-4 h-4 fill-current text-yellow-400" viewBox="0 0 20 20">
                        <path
                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                    </svg>
                    <span class="text-gray-700 text-sm ml-1 font-semibold">4.8</span>
                </div>
            </div>

            <!-- Action Buttons -->
            @if($product->stock === 0)
            <div class="flex gap-2">
                <button class="flex-1 bg-gray-400 text-white font-semibold py-3 rounded-xl cursor-not-allowed shadow-lg"
                    disabled>
                    Épuisé
                </button>
                <button class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 p-3 rounded-xl transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>
                <a href="{{route('favorites.toggle', $product->id)}}">
                    <button class="bg-red-100 hover:bg-red-200 text-red-600 p-3 rounded-xl transition hover:scale-110">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </a>
            </div>

            @else
            <div class="flex gap-2">
                <button
                    class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl transition transform hover:scale-105 shadow-lg flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Ajouter
                </button>
                <a href="{{route('favorites.toggle', $product->id)}}">
                    <button class="bg-red-100 hover:bg-red-200 text-red-600 p-3 rounded-xl transition hover:scale-110">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
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
    @endforeach
</div>

<!-- Pagination -->
<div class="mt-12">
    {{ $products->links() }}
</div>

@else
<!-- Empty State -->
<div class="flex flex-col items-center justify-center py-20">
    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-full p-8 mb-6">
        <svg class="w-24 h-24 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
    </div>
    <h3 class="text-2xl font-bold text-gray-800 mb-2">Aucun favori pour le moment</h3>
    <p class="text-gray-600 mb-6 text-center max-w-md">Commencez à ajouter vos produits préférés en cliquant sur le cœur
    </p>
    <a href="{{ route('products.index') }}">
        <button
            class="bg-green-600 hover:bg-green-700 text-white font-semibold px-8 py-3 rounded-xl transition transform hover:scale-105 shadow-lg flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
            </svg>
            Découvrir nos produits
        </button>
    </a>
</div>
@endif

@endsection