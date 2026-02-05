@extends('layouts.app')

@section('title', $product->name)

@section('content')

<section
    class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-green-100 via-emerald-50 to-white shadow-xl">

    {{-- Decorative blobs --}}
    <div class="absolute -top-20 -left-20 w-96 h-96 bg-green-300/30 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-emerald-400/20 rounded-full blur-3xl"></div>

    <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-16 p-12">

        {{-- LEFT: PRODUCT VISUAL --}}
        <div class="flex items-center justify-center">
            <div
                class="w-full h-[520px] rounded-3xl bg-white/70 backdrop-blur-xl shadow-inner flex items-center justify-center">
                <svg class="w-64 h-64 text-green-600 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                        d="M12 3v18M7 7c0-2 2.5-4 5-4s5 2 5 4M7 17c0 2 2.5 4 5 4s5-2 5-4" />
                </svg>
            </div>
        </div>

        {{-- RIGHT: PRODUCT INFO --}}
        <div class="flex flex-col justify-center">

            {{-- Category --}}
            <span
                class="inline-block w-fit px-4 py-1 rounded-full text-sm font-semibold bg-green-600/10 text-green-700">
                {{ $product->category->name ?? 'Catégorie' }}
            </span>

            {{-- Name --}}
            <h1 class="mt-6 text-5xl font-extrabold tracking-tight text-gray-800 leading-tight">
                {{ $product->name }}
            </h1>

            {{-- Description --}}
            <p class="mt-6 text-lg text-gray-600 max-w-xl leading-relaxed">
                {{ $product->description }}
            </p>
            <div class="mt-6 flex items-center gap-2">
                <!-- 5 Stars -->
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.955a1 1 0 00.95.69h4.153c.969 0 1.371 1.24.588 1.81l-3.36 2.44a1 1 0 00-.364 1.118l1.286 3.955c.3.921-.755 1.688-1.54 1.118l-3.36-2.44a1 1 0 00-1.175 0l-3.36 2.44c-.784.57-1.838-.197-1.539-1.118l1.285-3.955a1 1 0 00-.364-1.118L2.072 9.382c-.783-.57-.38-1.81.588-1.81h4.152a1 1 0 00.95-.69l1.287-3.955z" />
                </svg>
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.955a1 1 0 00.95.69h4.153c.969 0 1.371 1.24.588 1.81l-3.36 2.44a1 1 0 00-.364 1.118l1.286 3.955c.3.921-.755 1.688-1.54 1.118l-3.36-2.44a1 1 0 00-1.175 0l-3.36 2.44c-.784.57-1.838-.197-1.539-1.118l1.285-3.955a1 1 0 00-.364-1.118L2.072 9.382c-.783-.57-.38-1.81.588-1.81h4.152a1 1 0 00.95-.69l1.287-3.955z" />
                </svg>
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.955a1 1 0 00.95.69h4.153c.969 0 1.371 1.24.588 1.81l-3.36 2.44a1 1 0 00-.364 1.118l1.286 3.955c.3.921-.755 1.688-1.54 1.118l-3.36-2.44a1 1 0 00-1.175 0l-3.36 2.44c-.784.57-1.838-.197-1.539-1.118l1.285-3.955a1 1 0 00-.364-1.118L2.072 9.382c-.783-.57-.38-1.81.588-1.81h4.152a1 1 0 00.95-.69l1.287-3.955z" />
                </svg>
                <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.955a1 1 0 00.95.69h4.153c.969 0 1.371 1.24.588 1.81l-3.36 2.44a1 1 0 00-.364 1.118l1.286 3.955c.3.921-.755 1.688-1.54 1.118l-3.36-2.44a1 1 0 00-1.175 0l-3.36 2.44c-.784.57-1.838-.197-1.539-1.118l1.285-3.955a1 1 0 00-.364-1.118L2.072 9.382c-.783-.57-.38-1.81.588-1.81h4.152a1 1 0 00.95-.69l1.287-3.955z" />
                </svg>
                <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.955a1 1 0 00.95.69h4.153c.969 0 1.371 1.24.588 1.81l-3.36 2.44a1 1 0 00-.364 1.118l1.286 3.955c.3.921-.755 1.688-1.54 1.118l-3.36-2.44a1 1 0 00-1.175 0l-3.36 2.44c-.784.57-1.838-.197-1.539-1.118l1.285-3.955a1 1 0 00-.364-1.118L2.072 9.382c-.783-.57-.38-1.81.588-1.81h4.152a1 1 0 00.95-.69l1.287-3.955z" />
                </svg>
                <span class="text-gray-500 text-sm">(34 avis)</span>
            </div>
            {{-- Extra info --}}
            <div class="mt-10 flex gap-8 text-sm text-gray-500">
                <div>
                    <span class="block font-semibold text-gray-700">Fournisseur</span>
                    {{ $product->supplier ?? 'Inconnu' }}
                </div>
            </div>
            {{-- Price --}}
            <div class="mt-10 flex items-end gap-4">
                <span class="text-4xl font-bold text-green-700">
                    {{ $product->price }} MAD
                </span>

                @if($product->price)
                <span class="text-xl text-gray-400 line-through">
                    {{ $product->price }} MAD
                </span>
                @endif
            </div>

            {{-- Actions --}}
            <div class="mt-12 flex flex-wrap gap-4">
                <button
                    class="px-10 py-4 bg-green-600 hover:bg-green-700 text-white text-lg font-semibold rounded-2xl shadow-lg transition">
                    Ajouter au panier
                </button>
                <a href="{{route('favorites.toggle', $product->id)}}">
                @if(in_array($product->id, $favoriteIds))
                <button
                    class="px-8 py-4 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-2xl border border-red-500 transition">
                    Favoris
                </button>

                @else
                <button
                    class="px-8 py-4 bg-red/80 hover:bg-red text-white-700 font-semibold rounded-2xl border border-white-200 transition">
                    Favoris
                </button>
                @endif
                </a>
            </div>
            {{-- Extra info --}}
            <div class="mt-10 flex gap-8 text-sm text-gray-500">
                <div>
                    <span class="block font-semibold text-gray-700">Livraison</span>
                    24–48h
                </div>
                <div>
                    <span class="block font-semibold text-gray-700">Qualité</span>
                    Bio & fraîche
                </div>
                <div>
                    <span class="block font-semibold text-gray-700">Origine</span>
                    Locale
                </div>
            </div>
            {{-- Actions --}}
            <div class="mt-10 flex flex-wrap gap-4">

                <!-- Update Product -->
                <a href="{{ route('product.edit', $product->id) }}"
                    class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-2xl shadow transition">
                    Mettre à jour
                </a>

                <!-- Delete Product -->
                <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                    onsubmit="return confirm('etes-vous sur de vouloir supprimer ce produit ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-8 py-4 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-2xl shadow transition">
                        Supprimer
                    </button>
                </form>

            </div>
        </div>
    </div>
</section>

@endsection