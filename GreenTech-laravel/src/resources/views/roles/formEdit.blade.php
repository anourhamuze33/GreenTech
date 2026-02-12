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
                    <h1 class="text-2xl font-bold text-white tracking-wide">Editer le Role</h1>
                    <p class="text-emerald-100/90 text-xs font-medium">Remplissez le nom du role</p>
                </div>
            </div>
        </div>

        <form action="{{route('role.update', $role->id)}}" method="POST" class="p-6 space-y-3">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div class="flex items-center">
                <label class="w-32 text-[#0a4d2e] font-bold text-sm">Nom</label>
                <input id="name" type="text" name="name" required value="{{$role->name}}"
                    class="flex-1 bg-white border-2 border-[#2b8a53] rounded-xl px-3 py-2 inner-soft-shadow focus:outline-none focus:ring-2 focus:ring-[#76d997] transition-all">
            </div>
            <div class="bg-white border-2 border-[#2b8a53] rounded-xl p-5 inner-soft-shadow">
                <h3 class="text-[#0a4d2e] font-bold text-base mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    Permissions
                </h3>

                <div class="grid grid-cols-2 gap-3">
                    @foreach($permissions as $permission)
                    <label class="checkbox-container text-[#0a4d2e] text-sm font-medium">
                        {{$permission->name}}
                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}"
                            @if(in_array($permission->id, $permIds)) checked @endif>
                        <span class="checkmark"></span>
                    </label>
                    @endforeach
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold px-6 py-3 rounded-xl shadow-lg transition-all transform hover:scale-[1.02] hover:shadow-xl flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>Editer le Role</span>
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