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
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Campo oculto para el rol -->
                    <input type="hidden" name="role" value="user">
                    
                    <!-- Nombre completo -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-user text-blue-600 mr-2"></i>Nombre completo
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}"
                               required 
                               autofocus
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 @error('name') border-red-500 @enderror"
                               placeholder="Ingresa tu nombre completo">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Username -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-at text-blue-600 mr-2"></i>Nombre de usuario
                        </label>
                        <input type="text" 
                               id="username" 
                               name="username" 
                               value="{{ old('username') }}"
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 @error('username') border-red-500 @enderror"
                               placeholder="Elige un nombre de usuario único">
                        @error('username')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-envelope text-blue-600 mr-2"></i>Correo electrónico
                        </label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}"
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 @error('email') border-red-500 @enderror"
                               placeholder="tu@email.com">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-lock text-blue-600 mr-2"></i>Contraseña
                        </label>
                        <div class="relative">
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 @error('password') border-red-500 @enderror"
                                   placeholder="Mínimo 8 caracteres">
                            <button type="button" id="togglePassword" class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-lock text-blue-600 mr-2"></i>Confirmar contraseña
                        </label>
                        <div class="relative">
                            <input type="password" 
                                   id="password_confirmation" 
                                   name="password_confirmation" 
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                   placeholder="Repite tu contraseña">
                            <button type="button" id="togglePasswordConfirm" class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Términos y condiciones -->
                    <div class="flex items-start">
                        <input type="checkbox" 
                               id="terms" 
                               name="terms" 
                               required
                               class="mt-1 w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="terms" class="ml-3 text-sm text-gray-600">
                            Acepto los 
                            <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">términos y condiciones</a> 
                            y la 
                            <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">política de privacidad</a>
                        </label>
                    </div>

                    <!-- Botón de registro -->
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-3 px-4 rounded-lg transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        <i class="fas fa-user-plus mr-2"></i>Crear cuenta
                    </button>

                    <!-- Separador -->
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">¿Ya tienes cuenta?</span>
                        </div>
                    </div>

                    <!-- Link a login -->
                    <div class="text-center">
                        <a href="{{ route('login') }}" 
                           class="text-blue-600 hover:text-blue-700 font-medium transition-colors duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i>Inicia sesión aquí
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        document.getElementById('togglePasswordConfirm').addEventListener('click', function() {
            const password = document.getElementById('password_confirmation');
            const icon = this.querySelector('i');
            
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Form validation feedback
        document.querySelector('form').addEventListener('submit', function(e) {
            const button = this.querySelector('button[type="submit"]');
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Creando cuenta...';
            button.disabled = true;
        });
    </script>
</body>
</html>