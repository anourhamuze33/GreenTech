<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
        .input-group {
            position: relative;
        }

        .input-group input:focus + label,
        .input-group input:not(:placeholder-shown) + label {
            transform: translateY(-1.5rem) scale(0.85);
            color: #059669;
        }

        .input-group label {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.3s ease;
            pointer-events: none;
            color: #6b7280;
            font-weight: 500;
        }

        .btn-shine {
            position: relative;
            overflow: hidden;
        }

        .btn-shine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .btn-shine:hover::before {
            left: 100%;
        }

        .checkbox-custom {
            appearance: none;
            width: 1.25rem;
            height: 1.25rem;
            border: 2px solid #2b8a53;
            border-radius: 0.375rem;
            background-color: white;
            cursor: pointer;
            position: relative;
            transition: all 0.2s;
        }

        .checkbox-custom:checked {
            background-color: #10b981;
            border-color: #10b981;
        }

        .checkbox-custom:checked::after {
            content: '';
            position: absolute;
            left: 0.3rem;
            top: 0.05rem;
            width: 0.4rem;
            height: 0.65rem;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-lg relative z-10">
        <!-- Main Card -->
        <div class="glass-effect rounded-3xl shadow-2xl overflow-hidden">
            <!-- Left Side - Welcome Section -->
            <div class="bg-gradient-to-br from-[#0c5e3d] via-[#2b8a53] to-[#3ab37b] p-6 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 backdrop-blur-sm rounded-full mb-3 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-white mb-1">Bon Retour!</h1>
                <p class="text-emerald-50 text-sm">Connectez-vous pour continuer</p>
                
                <!-- Decorative leaves -->
                <div class="flex justify-center gap-4 mt-4">
                    <img src="../assets/plant.png" alt="leaf" class="w-6 h-6 opacity-40 brightness-0 invert">
                    <img src="../assets/plant1.png" alt="leaf" class="w-6 h-6 opacity-60 brightness-0 invert">
                    <img src="../assets/plant.png" alt="leaf" class="w-6 h-6 opacity-40 brightness-0 invert">
                </div>
            </div>

            <!-- Right Side - Form Section -->
            <div class="bg-white p-6">
                <form action="{{route('user.login')}}" method="POST" class="space-y-4">
                    @csrf

                    <!-- Email Field with Floating Label -->
                    <div class="input-group">
                        <input type="email" name="email" id="email" required placeholder=" "
                            class="w-full bg-gray-50 border-2 border-gray-300 rounded-xl px-4 py-3 text-gray-800 focus:outline-none focus:border-[#10b981] focus:bg-white transition-all">
                        <label for="email" class="bg-gray-50 px-2">Adresse Email</label>
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                    </div>

                    <!-- Password Field with Floating Label -->
                    <div class="input-group">
                        <input type="password" name="password" id="password" required placeholder=" "
                            class="w-full bg-gray-50 border-2 border-gray-300 rounded-xl px-4 py-3 text-gray-800 focus:outline-none focus:border-[#10b981] focus:bg-white transition-all">
                        <label for="password" class="bg-gray-50 px-2">Mot de Passe</label>
                        <button type="button" onclick="togglePassword()"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-[#2b8a53] transition">
                            <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="checkbox" name="remember" class="checkbox-custom">
                            <span class="text-gray-600 group-hover:text-gray-800">Se souvenir de moi</span>
                        </label>
                        <a href="{{route('auth.login')}}"
                        {{-- <a href="{{route('password.request')}}" --}}
                            class="text-green-600 hover:text-green-700 font-semibold hover:underline">
                            Mot de passe oublié?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="btn-shine w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold px-6 py-3 rounded-xl shadow-lg transition-all transform hover:scale-[1.02] hover:shadow-xl">
                        Se Connecter
                    </button>

                    <!-- Divider -->
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white text-gray-500">OU</span>
                        </div>
                    </div>

                    <!-- Social Login Buttons -->
                    <div class="grid grid-cols-2 gap-3">
                        <button type="button"
                            class="flex items-center justify-center gap-2 px-4 py-2.5 bg-white border-2 border-gray-300 rounded-xl hover:bg-gray-50 hover:border-gray-400 transition-all">
                            <svg class="w-5 h-5" viewBox="0 0 24 24">
                                <path fill="#4285F4"
                                    d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                <path fill="#34A853"
                                    d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                <path fill="#FBBC05"
                                    d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                                <path fill="#EA4335"
                                    d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                            </svg>
                            <span class="text-sm font-semibold text-gray-700">Google</span>
                        </button>

                        <button type="button"
                            class="flex items-center justify-center gap-2 px-4 py-2.5 bg-white border-2 border-gray-300 rounded-xl hover:bg-gray-50 hover:border-gray-400 transition-all">
                            <svg class="w-5 h-5" fill="#181717" viewBox="0 0 24 24">
                                <path
                                    d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                            </svg>
                            <span class="text-sm font-semibold text-gray-700">GitHub</span>
                        </button>
                    </div>

                    <!-- Register Link -->
                    <div class="text-center pt-2">
                        <p class="text-sm text-gray-600">
                            Vous n'avez pas de compte?
                            <a href="{{route('auth.register')}}"
                                class="text-green-600 font-semibold hover:text-green-700 hover:underline">
                                S'inscrire Maintenant
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bottom Info -->
        <div class="text-center mt-4">
            <p class="text-sm text-gray-600">
                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                Connexion sécurisée avec cryptage SSL
            </p>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                `;
            }
        }
    </script>
</body>

</html>