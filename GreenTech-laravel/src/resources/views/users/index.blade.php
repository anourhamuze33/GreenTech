@extends('layouts.app')

@section('content')
<div class="p-8">

    {{-- Header --}}
    <div
        class="bg-gradient-to-r from-green-600 to-green-500 p-8 rounded-2xl shadow-xl mb-10 text-white flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold mb-2">Gestion des Utilisateurs</h1>
            <p class="text-green-100">Liste des comptes enregistrés</p>
        </div>

        <button
            class="bg-white text-green-600 px-6 py-3 rounded-lg font-semibold hover:bg-green-50 transition shadow-lg">
            + Nouvel Utilisateur
        </button>
    </div>

    {{-- Users Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

        @foreach($users as $user)
        <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition border border-gray-100">
            <div class="flex items-center gap-4 mb-6">
                <div
                    class="w-16 h-16 bg-green-600 text-white flex items-center justify-center rounded-full text-xl font-bold">
                    US
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800">{{$user->name}}</h2>
                    <p class="text-sm text-gray-500">{{$user->emil}}</p>
                </div>
            </div>

            <div class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-500">Rôle</span>
                    <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">
                        {{$user->role}}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Statut</span>
                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">
                        Actif
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Créé le</span>
                    <span class="text-gray-700">{{$user->created_at}}</span>
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <a href="{{route('user.edit', $user->id)}}">
                    <button class="px-4 py-2 bg-blue-100 text-blue-600 rounded-lg">Modifier</button>
                </a>
                <form action="{{route('user.destroy', $user->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="px-4 py-2 bg-red-100 text-red-600 rounded-lg">Supprimer</button>
                </form>
            </div>
        </div>
        @endforeach
        {{-- Duplicate card for demo --}}
        <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition border border-gray-100">
            <div class="flex items-center gap-4 mb-6">
                <div
                    class="w-16 h-16 bg-green-600 text-white flex items-center justify-center rounded-full text-xl font-bold">
                    JD
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Jardin Doe</h2>
                    <p class="text-sm text-gray-500">jardin@example.com</p>
                </div>
            </div>

            <div class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-500">Rôle</span>
                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">
                        Jardinier
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Statut</span>
                    <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-semibold">
                        Inactif
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Créé le</span>
                    <span class="text-gray-700">15/01/2024</span>
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <a href="{{route('user.edit', $user->id)}}">
                    <button class="px-4 py-2 bg-blue-100 text-blue-600 rounded-lg">Modifier</button>
                </a>
                <form action="{{ route('user.destroy', $user->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="px-4 py-2 bg-red-100 text-red-600 rounded-lg">Supprimer</button>
                </form>
            </div>
        </div>

    </div>

    {{-- Pagination style --}}
    {{ $users->links() }}

</div>
@endsection