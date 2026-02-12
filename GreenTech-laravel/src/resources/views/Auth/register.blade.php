<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
        select:focus {
            box-shadow: 0 0 0 3px rgba(76, 163, 113, 0.3);
        }

        .role-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .role-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.2);
        }

        .role-card.selected {
            border-color: #10b981;
            background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
        }

        .role-card input[type="radio"] {
            display: none;
        }

        .checkmark {
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .role-card.selected .checkmark {
            opacity: 1;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">

    <div
        class="max-w-md w-full bg-[#f0f9f6] rounded-[2.5rem] shadow-[0_10px_25px_rgba(0,0,0,0.15),0_4px_6px_rgba(0,0,0,0.1)] overflow-hidden">
        <div class="bg-gradient-to-r from-[#0c5e3d] to-[#3ab37b] p-6 border-b-[2px] border-[#9ee6b8]">
            <div class="flex flex-row items-center gap-4">
                <div
                    class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-inner border-[3px] border-[#4ca371]">
                    <img src="../assets/plant1.png" alt="icon" class="w-10 h-10 opacity-90">
                </div>

                <!-- Text -->
                <div class="flex flex-col">
                    <h1 class="text-2xl font-bold text-white tracking-wide">Inscription</h1>
                    <p class="text-emerald-100/90 text-xs font-medium">Créez votre compte gratuitement</p>
                </div>
            </div>
        </div>

        <form action="{{route('user.register')}}" method="POST" class="p-6 space-y-3">
            @csrf

            <div class="flex items-center">
                <label class="w-32 text-[#0a4d2e] font-bold text-sm">Nom Complet</label>
                <input type="text" name="name" required
                    class="flex-1 bg-white border-2 border-[#2b8a53] rounded-xl px-3 py-2 inner-soft-shadow focus:outline-none focus:ring-2 focus:ring-[#76d997] transition-all"
                    placeholder="Jean Dupont">
            </div>

            <!-- Email Field -->
            <div class="flex items-center">
                <label class="w-32 text-[#0a4d2e] font-bold text-sm">Email</label>
                <input type="email" name="email" required
                    class="flex-1 bg-white border-2 border-[#2b8a53] rounded-xl px-3 py-2 inner-soft-shadow focus:outline-none focus:ring-2 focus:ring-[#76d997] transition-all"
                    placeholder="exemple@email.com">
            </div>

            <!-- Password Field -->
            <div class="flex items-center">
                <label class="w-32 text-[#0a4d2e] font-bold text-sm">Mot de Passe</label>
                <div class="flex-1 relative">
                    <input type="password" name="password" id="password" required
                        class="w-full bg-white border-2 border-[#2b8a53] rounded-xl px-3 py-2 pr-10 inner-soft-shadow focus:outline-none focus:ring-2 focus:ring-[#76d997] transition-all"
                        placeholder="••••••••">
                    <button type="button" onclick="togglePassword('password')"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-[#2b8a53]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Confirm Password Field -->
            <div class="flex items-center">
                <label class="w-32 text-[#0a4d2e] font-bold text-sm">Confirmer</label>
                <div class="flex-1 relative">
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="w-full bg-white border-2 border-[#2b8a53] rounded-xl px-3 py-2 pr-10 inner-soft-shadow focus:outline-none focus:ring-2 focus:ring-[#76d997] transition-all"
                        placeholder="••••••••">
                    <button type="button" onclick="togglePassword('password_confirmation')"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-[#2b8a53]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t-2 border-[#9ee6b8] pt-3">
                <p class="text-[#0a4d2e] font-semibold text-xs mb-2 uppercase tracking-wide">Type de Compte</p>
            </div>

            <!-- Role Selection -->
            <div class="space-y-2">
                <!-- Client Role Card -->
                @foreach($roles as $role)
                @continue($role->id == 10)
                <label class="role-card block bg-white border-2 border-[#2b8a53] rounded-xl p-4 relative">
                    <input type="radio" name="role_select" value="{{$role->id}}"
                        onchange="selectRole('{{$role->name}}')">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-[#0a4d2e] font-bold text-base">{{$role->name}}</h3>
                            <p class="text-gray-600 text-xs">Acheter des plantes et produits</p>
                        </div>
                        <div class="checkmark w-6 h-6 bg-green-600 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                </label>
                @endforeach
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold px-6 py-3 rounded-xl shadow-lg transition-all transform hover:scale-[1.02] hover:shadow-xl flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    <span>Créer mon Compte</span>
                </button>
            </div>

            <!-- Login Link -->
            <div class="text-center pt-2">
                <p class="text-sm text-gray-600">
                    Vous avez déjà un compte?
                    <a href="{{route('auth.login')}}"
                        class="text-green-600 font-semibold hover:text-green-700 hover:underline">
                        Se Connecter
                    </a>
                </p>
            </div>
        </form>
    </div>

    <!-- Decorative Element -->
    <div class="fixed bottom-6 right-6 opacity-30 pointer-events-none">
        <svg width="50" height="50" viewBox="0 0 24 24" fill="none" class="text-emerald-700">
            <path d="M12 0L14.5 9.5L24 12L14.5 14.5L12 24L9.5 14.5L0 12L9.5 9.5L12 0Z" fill="currentColor" />
        </svg>
    </div>

    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            input.type = input.type === 'password' ? 'text' : 'password';
        }

        function selectRole(role) {
            document.querySelectorAll('.role-card').forEach(card => {
                card.classList.remove('selected');
            });
            event.target.closest('.role-card').classList.add('selected');
            document.getElementById('roleInput').value = role;
        }
    </script>
</body>

</html>