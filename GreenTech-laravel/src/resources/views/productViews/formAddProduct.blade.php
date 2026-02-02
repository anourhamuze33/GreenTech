<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Produit</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('../assets/background3.png');
            background-repeat: repeat;
            z-index: -1;
        }

        .inner-soft-shadow {
            box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.08);
        }

        input:focus,
        textarea:focus {
            box-shadow: 0 0 0 3px rgba(76, 163, 113, 0.3);
        }

        .ai-gradient {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        .ai-gradient:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
        }

        .sparkle {
            position: relative;
            overflow: hidden;
        }

        .sparkle::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .sparkle:hover::before {
            width: 300px;
            height: 300px;
            opacity: 0;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">

    <div
        class="max-w-md w-full bg-[#f0f9f6] rounded-[2.5rem] shadow-[0_10px_25px_rgba(0,0,0,0.15),0_4px_6px_rgba(0,0,0,0.1)] overflow-hidden">
        <!-- Header with gradient -->
        <div class="bg-gradient-to-r from-[#0c5e3d] to-[#3ab37b] p-6 border-b-[2px] border-[#9ee6b8]">
            <div class="flex flex-row items-center gap-4">
                <!-- Image with border -->
                <div
                    class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-inner border-[3px] border-[#4ca371]">
                    <img src="../assets/plant1.png" alt="icon" class="w-10 h-10 opacity-90">
                </div>

                <!-- Text -->
                <div class="flex flex-col">
                    <h1 class="text-2xl font-bold text-white tracking-wide">Ajouter un Produit</h1>
                    <p class="text-emerald-100/90 text-xs font-medium">Remplissez les informations du produit</p>
                </div>
            </div>
        </div>

        <form action="{{route('product.store')}}" method="POST" class="p-6 space-y-3">
            @csrf
            
            <!-- Name Field -->
            <div class="flex items-center">
                <label  class="w-32 text-[#0a4d2e] font-bold text-sm">Nom</label>
                <input id="name" type="text" name="name" required
                    class="flex-1 bg-white border-2 border-[#2b8a53] rounded-xl px-3 py-2 inner-soft-shadow focus:outline-none focus:ring-2 focus:ring-[#76d997] transition-all">
            </div>

            <!-- Description Field with AI Button -->
            <div class="space-y-1.5">
                <div class="flex items-start">
                    <label class="w-32 text-[#0a4d2e] font-bold text-sm pt-2">Description</label>
                    <textarea id="description" name="description" rows="2" 
                        class="flex-1 bg-white border-2 border-[#2b8a53] rounded-xl px-3 py-2 inner-soft-shadow focus:outline-none focus:ring-2 focus:ring-[#76d997] transition-all resize-none"></textarea>
                </div>
                
                <!-- AI Button - Enhanced Design -->
                <div class="flex justify-start pl-32">
                    <button type="button" id="aiBtn"
                        class="ai-gradient sparkle text-white font-semibold px-8 py-2 rounded-lg shadow-lg transition-all transform hover:scale-105 hover:shadow-xl flex items-center gap-2 group">
                        <svg class="w-4 h-4 group-hover:rotate-180 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <span class="text-sm">Générer avec l'IA</span>
                        <svg class="w-3.5 h-3.5 opacity-70" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0L14.5 9.5L24 12L14.5 14.5L12 24L9.5 14.5L0 12L9.5 9.5L12 0Z" />
                        </svg>
                    </button>
                </div>
                <p id="aiMessage" class="text-xs pl-32 text-emerald-700 font-medium italic bg-emerald-50 rounded-lg px-3 py-1.5 border border-emerald-200 hidden"></p>
            </div>

            <!-- Supplier Field -->
            <div class="flex items-center">
                <label class="w-32 text-[#0a4d2e] font-bold text-sm">Fournisseur</label>
                <input name="supplier" type="text"
                    class="flex-1 bg-white border-2 border-[#2b8a53] rounded-xl px-3 py-2 inner-soft-shadow focus:outline-none focus:ring-2 focus:ring-[#76d997] transition-all">
            </div>

            <!-- Category Field -->
            <div class="flex items-center">
                <label class="w-32 text-[#0a4d2e] font-bold text-sm">Catégorie</label>
                <div class="flex-1 flex overflow-hidden border-2 border-[#2b8a53] rounded-xl h-10">
                    <select required name="category_id"
                        class="flex-1 bg-white px-3 py-2 text-sm inner-soft-shadow focus:outline-none appearance-none">
                        <option value="" disabled selected>Sélectionnez une catégorie</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    <div class="w-10 bg-[#4ca371] flex items-center justify-center border-l border-[#2b8a53]">
                        <img src="../assets/plant.png" class="w-3.5 h-3.5 brightness-0 invert opacity-80">
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t-2 border-[#9ee6b8] pt-3">
                <p class="text-[#0a4d2e] font-semibold text-xs mb-2 uppercase tracking-wide">Informations Financières</p>
            </div>

            <!-- Price Field -->
            <div class="flex items-center">
                <label class="w-32 text-[#0a4d2e] font-bold text-sm">Prix</label>
                <div class="flex-1 flex border-2 border-[#2b8a53] rounded-xl overflow-hidden">
                    <input name="price" type="number" step="0.01" placeholder="0.00" required
                        class="flex-1 bg-white px-3 py-2 inner-soft-shadow focus:outline-none">
                    <div
                        class="w-14 bg-[#4ca371] flex items-center justify-center text-white font-bold text-xs border-l border-[#2b8a53]">
                        MAD
                    </div>
                </div>
            </div>

            <!-- Stock Field -->
            <div class="flex items-center">
                <label class="w-32 text-[#0a4d2e] font-bold text-sm">Stock</label>
                <div class="flex-1 flex overflow-hidden border-2 border-[#2b8a53] rounded-xl">
                    <input name="stock" type="number" placeholder="0" required
                        class="flex-1 bg-white px-3 py-2 inner-soft-shadow focus:outline-none">
                    <div
                        class="w-14 bg-[#4ca371] flex items-center justify-center text-white font-bold border-l border-[#2b8a53]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold px-6 py-3 rounded-xl shadow-lg transition-all transform hover:scale-[1.02] hover:shadow-xl flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>Ajouter le Produit</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Decorative Element -->
    <div class="fixed bottom-6 right-6 opacity-30 pointer-events-none">
        <svg width="50" height="50" viewBox="0 0 24 24" fill="none" class="text-emerald-700">
            <path d="M12 0L14.5 9.5L24 12L14.5 14.5L12 24L9.5 14.5L0 12L9.5 9.5L12 0Z" fill="currentColor" />
        </svg>
    </div>
<script src="{{ asset('js/ai.js') }}"></script>
</body>

</html>