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
            background-image: url('../../assets/background3.png');
            background-repeat: repeat;
            z-index: -1;
        }

        .inner-soft-shadow {
            box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.08);
        }

        input:focus {
            box-shadow: 0 0 0 3px rgba(76, 163, 113, 0.3);
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
                    <img src="../../assets/plant1.png" alt="icon" class="w-10 h-10 opacity-90">
                </div>

                <!-- Text -->
                <div class="flex flex-col">
                    <h1 class="text-2xl font-bold text-white tracking-wide">Ajouter un Produit</h1>
                    <p class="text-emerald-100/90 text-xs font-medium">Remplileze les informations du produit</p>
                </div>
            </div>
        </div>

        <form action="{{route('product.update', $product->id)}}" method="POST" class="p-8 space-y-5">
            @csrf
            @method('PUT')
            <div class="flex items-center">
                <label class="w-32 text-[#0a4d2e] font-bold text-sm">Name</label>
                <input type="text" name="name" value="{{$product->name}}"
                    class="flex-1 bg-white border-2 border-[#2b8a53] rounded-xl px-4 py-2 inner-soft-shadow focus:outline-none focus:ring-2 focus:ring-[#76d997] transition-all">
            </div>
            <div class="flex items-center">
                <label class="w-32 text-[#0a4d2e] font-bold text-sm">Description</label>
                <input type="text" name="description" value="{{$product->description}}"
                    class="flex-1 bg-white border-2 border-[#2b8a53] rounded-xl px-4 py-2 inner-soft-shadow focus:outline-none focus:ring-2 focus:ring-[#76d997] transition-all">
            </div>
            <div class="flex items-center">
                <label class="w-32 text-[#0a4d2e] font-bold text-sm">Supplier</label>
                <input name="supplier" type="text" value="{{$product->supplier}}"
                    class="flex-1 bg-white border-2 border-[#2b8a53] rounded-xl px-4 py-2 inner-soft-shadow focus:outline-none focus:ring-2 focus:ring-[#76d997] transition-all">
            </div>

            <div class="flex items-center">
                <label class="w-32 text-[#0a4d2e] font-bold text-sm">Prix (MAD)</label>
                <div class="flex-1 flex border-2 border-[#2b8a53] rounded-xl overflow-hidden">
                    <input name="price" type="number" placeholder="0.00" value="{{$product->price}}"
                        class="flex-1 bg-white px-2 py-2 inner-soft-shadow focus:outline-none">
                    <div
                        class="w-12 bg-[#4ca371] flex items-center justify-center text-white font-bold text-sm border-l border-[#2b8a53]">
                        MAD
                    </div>
                </div>
            </div>



            <div class="flex items-center">
                <label class="w-32 text-[#0a4d2e] font-bold text-sm">Stock</label>
                <div class="flex-1 flex overflow-hidden border-2 border-[#2b8a53] rounded-xl">
                    <input name="stock" type="number" placeholder="0" value="{{$product->stock}}"
                        class="flex-1 bg-white px-1.5 py-2 inner-soft-shadow focus:outline-none">
                    <div
                        class="w-12 bg-[#4ca371] flex items-center justify-center text-white font-bold text-xl border-l border-[#2b8a53]">
                        O
                    </div>
                </div>
            </div>


            <div class="flex items-center">
                <label class="w-32 text-[#0a4d2e] font-bold text-sm">Catégorie</label>
                <div class="flex-1 flex overflow-hidden border-2 border-[#2b8a53] rounded-xl h-11">
                    <select required name="category_id" value="{{$product->category_id}}"
                        class="flex-1 bg-white px-4 py-2 text-xs inner-soft-shadow focus:outline-none appearance-none">
                        <option value="">Sélectionnez une catégorie</option>
                        @foreach ($categories as $category)
                        <option selected value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    <div class="w-12 bg-[#4ca371] flex items-center justify-center border-l border-[#2b8a53]">
                        <img src="../../assets/plant.png" class="w-4 h-4 brightness-0 invert opacity-80">
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-bold px-8 py-3 rounded-xl shadow-lg transition transform hover:scale-105">
                    Update le Produit
                </button>
            </div>
        </form>
    </div>

    <div class="fixed bottom-6 right-6 opacity-40">
        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" class="text-white">
            <path d="M12 0L14.5 9.5L24 12L14.5 14.5L12 24L9.5 14.5L0 12L9.5 9.5L12 0Z" fill="currentColor" />
        </svg>
    </div>

</body>

</html>