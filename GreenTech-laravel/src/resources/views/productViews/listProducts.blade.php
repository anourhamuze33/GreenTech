@extends('layouts.app')

@section('title', 'Catalogue Produits')

@section('content')

<div class="flex flex-wrap items-center justify-between gap-4 mb-12">
    <div class="flex flex-wrap gap-3">
        <a href="{{ route('products.index') }}">
            @if(isset($cate))
            <button class="tous px-6 py-2.5 bg-white text-green-700 rounded-full font-medium shadow hover:shadow-lg
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
        <form action="{{ route('products.index') }}" method="GET" class="max-w-3xl mx-auto relative">
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
    <x-card :product="$product" :favoriteIds="$favoriteIds" />
    @endforeach
    <!-- Load More Button -->
    <a href="{{route('product.create')}}">
        <div class="text-center mt-16">
            <button
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-12 py-4 rounded-full shadow-xl hover:shadow-2xl transition transform hover:scale-105">
                Charger Plus de Produits
            </button>
        </div>
    </a>
</div>
{{ $products->links() }}
<script src="{{ asset('js/filter.js') }}"></script>
@endsection