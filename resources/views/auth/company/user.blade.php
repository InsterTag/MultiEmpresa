<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuario - Marketplace Pro</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white text-2xl"></i>
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Registro Usuario</h1>
                <p class="text-gray-600">Crea tu cuenta personal en Marketplace Pro</p>
            </div>

            <!-- Formulario -->
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <!-- Nombre -->
                <div class="mb-4">
                    <label for="user_name" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-user text-blue-600 mr-2"></i>Nombre completo
                    </label>
                    <input type="text" 
                           id="user_name" 
                           name="user_name" 
                           value="{{ old('user_name') }}"
                           required 
                           autofocus
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('user_name') border-red-500 @enderror"
                           placeholder="Ingresa tu nombre completo">
                    @error('user_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="user_email" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-envelope text-blue-600 mr-2"></i>Correo electrónico
                    </label>
                    <input type="email" 
                           id="user_email" 
                           name="user_email" 
                           value="{{ old('user_email') }}"
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('user_email') border-red-500 @enderror"
                           placeholder="tu@email.com">
                    @error('user_email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Contraseña -->
                <div class="mb-4">
                    <label for="user_password" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-lock text-blue-600 mr-2"></i>Contraseña
                    </label>
                    <div class="relative">
                        <input type="password" 
                               id="user_password" 
                               name="user_password" 
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('user_password') border-red-500 @enderror"
                               placeholder="Mínimo 8 caracteres">
                        <button type="button" onclick="togglePassword('user_password')" class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('user_password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirmación de Contraseña -->
                <div class="mb-6">
                    <label for="user_password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-lock text-blue-600 mr-2"></i>Confirmar Contraseña
                    </label>
                    <input type="password" 
                           id="user_password_confirmation" 
                           name="user_password_confirmation" 
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Repite tu contraseña">
                </div>

                <!-- Botón para continuar -->
                <div class="text-center mt-4">
                    <button type="button" 
                        onclick="goToCompanyStep()" 
                        class="text-blue-600 hover:text-blue-700 font-medium transition-colors duration-300">
                    <i class="fas fa-building mr-2"></i>Continuar registrando empresa
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const icon = passwordField.nextElementSibling.querySelector('i');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
</body>
</html>