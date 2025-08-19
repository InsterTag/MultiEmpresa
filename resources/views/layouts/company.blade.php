<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Empresarial - TechCorp Solutions</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        @vite(['resources/css/company.css'])
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            'primary': '#3b82f6',
                            'primary-dark': '#1d4ed8',
                            'secondary': '#f59e0b',
                            'accent': '#10b981',
                            'purple': '#8b5cf6',
                        }
                    }
                }
            }
        </script>
    
</head>
<body class="min-h-screen">
    <!-- Mobile Menu Button -->
    <button id="mobileMenuBtn" class="lg:hidden fixed top-4 left-4 z-50 glass-effect rounded-lg p-3 shadow-lg">
        <i class="fas fa-bars text-gray-700"></i>
    </button>

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('profiles.company.sidebar.sidebar')
  
            @yield('content')

    </div>
            

    <!-- Overlay for mobile menu -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden hidden"></div>
</body>
</html>