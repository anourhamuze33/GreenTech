<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Jardin Vert')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Animated gradient background */
        .gradient-bg {
            background: linear-gradient(-45deg, #1b5e20, #2e7d32, #388e3c, #43a047);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Floating animation */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        /* Product card hover effect */
        .product-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .product-card:hover .quick-view {
            opacity: 1;
            transform: translateY(0);
        }

        /* Quick view overlay */
        .quick-view {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }

        /* Shine effect on hover */
        .shine-effect {
            position: relative;
            overflow: hidden;
        }

        .shine-effect::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .shine-effect:hover::before {
            left: 100%;
        }

        /* Badge pulse animation */
        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.05);
                opacity: 0.8;
            }
        }

        .pulse-animation {
            animation: pulse 2s ease-in-out infinite;
        }

        /* Sidebar animation */
        .sidebar {
            transition: transform 0.3s ease;
        }

        .sidebar-hidden {
            transform: translateX(-100%);
        }

        /* Stock indicator */
        @keyframes stockBlink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .stock-low {
            animation: stockBlink 2s ease-in-out infinite;
        }

        /* Leaf pattern */
        .leaf-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 10c5 0 10 5 10 10s-5 10-10 10-10-5-10-10 5-10 10-10z' fill='%2366bb6a' opacity='0.05'/%3E%3C/svg%3E");
        }

        /* Smooth scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #2e7d32;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #1b5e20;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 min-h-screen">

    @include('partials.sidebar')
    
    <div class="ml-64">

        @include('partials.header')

        <main class="container mx-auto px-6 py-12 leaf-pattern">
            @yield('content')
        </main>

        @include('partials.footer')
    </div>
    </body>

</html>