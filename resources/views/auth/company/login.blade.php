<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Empresa - Marketplace Pro</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-green-50 to-emerald-100 min-h-screen">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-building text-white text-2xl"></i>
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Portal Empresarial</h1>
                <p class="text-gray-600">Accede a tu cuenta empresarial</p>
            </div>

            <!-- Formulario -->
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <form method="POST" action="{{ route('login.company') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Campo oculto para indicar tipo de usuario -->
                    <input type="hidden" name="user_type" value="business">
                    
                    <!-- Email o Username -->
                    <div>
                        <label for="login" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-envelope text-green-600 mr-2"></i>Email corporativo o usuario
                        </label>
                        <input type="text" 
                               id="login" 
                               name="login" 
                               value="{{ old('login') }}"
                               required 
                               autofocus
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('login') border-red-500 @enderror @error('email') border-red-500 @enderror"
                               placeholder="contacto@empresa.com o usuario_empresa">
                        @error('login')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-lock text-green-600 mr-2"></i>Contraseña empresarial
                        </label>
                        <div class="relative">
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('password') border-red-500 @enderror"
                                   placeholder="Contraseña de la empresa">
                            <button type="button" id="togglePassword" class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember me y Forgot password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   id="remember" 
                                   name="remember" 
                                   {{ old('remember') ? 'checked' : '' }}
                                   class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                            <label for="remember" class="ml-2 text-sm text-gray-600">
                                Mantener sesión activa
                            </label>
                        </div>
                        <a href="#" 
                           class="text-sm text-green-600 hover:text-green-700 font-medium transition-colors duration-300">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>

                    <!-- Botón de login -->
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold py-3 px-4 rounded-lg transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-green-300">
                        <i class="fas fa-sign-in-alt mr-2"></i>Acceder al portal empresarial
                    </button>

                    <!-- Mensaje de seguridad -->
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-shield-alt text-green-600"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-green-800">
                                    Acceso seguro empresarial
                                </h3>
                                <p class="mt-1 text-sm text-green-700">
                                    Este portal está protegido con cifrado de extremo a extremo para garantizar la seguridad de los datos de tu empresa.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Separador -->
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">¿Primera vez aquí?</span>
                        </div>
                    </div>

                    <!-- Link a registro -->
                    <div class="text-center">
                        <a href="{{ route('register') }}?type=business" 
                           class="text-green-600 hover:text-green-700 font-medium transition-colors duration-300">
                            <i class="fas fa-building mr-2"></i>Registrar mi empresa
                        </a>
                    </div>

                    <!-- Beneficios empresariales -->
                    <div class="bg-gray-50 rounded-lg p-4 mt-6">
                        <h4 class="text-sm font-semibold text-gray-800 mb-3">
                            <i class="fas fa-star text-yellow-500 mr-2"></i>Beneficios empresariales:
                        </h4>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                Panel de control avanzado
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                Gestión completa de inventario
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                Reportes y análisis detallados
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                Soporte prioritario 24/7
                            </li>
                        </ul>
                    </div>

                    <!-- Link a login usuario -->
                    <div class="text-center pt-4 border-t border-gray-200">
                        <p class="text-sm text-gray-600 mb-2">¿Eres usuario individual?</p>
                        <a href="{{ route('login') }}?type=user" 
                           class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium transition-colors duration-300">
                            <i class="fas fa-user mr-2"></i>Iniciar sesión personal
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

        // Form validation feedback
        document.querySelector('form').addEventListener('submit', function(e) {
            const button = this.querySelector('button[type="submit"]');
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Validando credenciales...';
            button.disabled = true;
        });

        // Auto-detect email or username
        document.getElementById('login').addEventListener('input', function(e) {
            const value = e.target.value;
            const label = document.querySelector('label[for="login"]');
            const icon = label.querySelector('i');
            
            if (value.includes('@')) {
                icon.className = 'fas fa-envelope text-green-600 mr-2';
                this.placeholder = 'contacto@empresa.com';
            } else {
                icon.className = 'fas fa-user text-green-600 mr-2';
                this.placeholder = 'usuario_empresa';
            }
        });
    </script>
</body>
</html>