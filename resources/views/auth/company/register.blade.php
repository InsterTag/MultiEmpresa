<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Empresa - Marketplace Pro</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-green-50 to-emerald-100 min-h-screen">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-building text-white text-2xl"></i>
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Registro Empresa</h1>
                <p class="text-gray-600">Únete como empresa a Marketplace Pro</p>
            </div>

            <!-- Formulario -->
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <form method="POST" action="{{ route('register.company') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Campo oculto para el rol -->
                    <input type="hidden" name="role" value="business">
                    
                    <!-- Información de la Empresa -->
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            <i class="fas fa-building text-green-600 mr-2"></i>Información de la Empresa
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nombre de la empresa -->
                            <div class="md:col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-store text-green-600 mr-2"></i>Nombre de la empresa
                                </label>
                                <input type="text" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name') }}"
                                       required 
                                       autofocus
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('name') border-red-500 @enderror"
                                       placeholder="Nombre completo de la empresa">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nombre del representante -->
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-user-tie text-green-600 mr-2"></i>Representante legal
                                </label>
                                <input type="text" 
                                       id="last_name" 
                                       name="last_name" 
                                       value="{{ old('last_name') }}"
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('last_name') border-red-500 @enderror"
                                       placeholder="Nombre del representante">
                                @error('last_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Username -->
                            <div>
                                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-at text-green-600 mr-2"></i>Nombre de usuario
                                </label>
                                <input type="text" 
                                       id="username" 
                                       name="username" 
                                       value="{{ old('username') }}"
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('username') border-red-500 @enderror"
                                       placeholder="Usuario único para la empresa">
                                @error('username')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Documentación Legal -->
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            <i class="fas fa-file-contract text-green-600 mr-2"></i>Documentación Legal
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Tipo de documento -->
                            <div>
                                <label for="document_type" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-id-card text-green-600 mr-2"></i>Tipo de documento
                                </label>
                                <select id="document_type" 
                                        name="document_type" 
                                        required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('document_type') border-red-500 @enderror">
                                    <option value="">Seleccionar tipo</option>
                                    <option value="CC" {{ old('document_type') == 'CC' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                                    <option value="CE" {{ old('document_type') == 'CE' ? 'selected' : '' }}>Cédula de Extranjería</option>
                                    <option value="TI" {{ old('document_type') == 'TI' ? 'selected' : '' }}>Tarjeta de Identidad</option>
                                    <option value="TE" {{ old('document_type') == 'TE' ? 'selected' : '' }}>Tarjeta de Extranjería</option>
                                </select>
                                @error('document_type')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Número de documento -->
                            <div>
                                <label for="document" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-hashtag text-green-600 mr-2"></i>Número de documento
                                </label>
                                <input type="text" 
                                       id="document" 
                                       name="document" 
                                       value="{{ old('document') }}"
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('document') border-red-500 @enderror"
                                       placeholder="Número de identificación">
                                @error('document')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Información de Contacto -->
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            <i class="fas fa-address-book text-green-600 mr-2"></i>Información de Contacto
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-envelope text-green-600 mr-2"></i>Correo electrónico
                                </label>
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}"
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('email') border-red-500 @enderror"
                                       placeholder="contacto@empresa.com">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Teléfono -->
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-phone text-green-600 mr-2"></i>Teléfono
                                </label>
                                <input type="tel" 
                                       id="phone" 
                                       name="phone" 
                                       value="{{ old('phone') }}"
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('phone') border-red-500 @enderror"
                                       placeholder="+57 300 123 4567">
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Dirección -->
                            <div class="md:col-span-2">
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-map-marker-alt text-green-600 mr-2"></i>Dirección
                                </label>
                                <input type="text" 
                                       id="address" 
                                       name="address" 
                                       value="{{ old('address') }}"
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('address') border-red-500 @enderror"
                                       placeholder="Dirección completa de la empresa">
                                @error('address')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Seguridad -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            <i class="fas fa-shield-alt text-green-600 mr-2"></i>Seguridad
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-lock text-green-600 mr-2"></i>Contraseña
                                </label>
                                <div class="relative">
                                    <input type="password" 
                                           id="password" 
                                           name="password" 
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('password') border-red-500 @enderror"
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
                                    <i class="fas fa-lock text-green-600 mr-2"></i>Confirmar contraseña
                                </label>
                                <div class="relative">
                                    <input type="password" 
                                           id="password_confirmation" 
                                           name="password_confirmation" 
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300"
                                           placeholder="Repite la contraseña">
                                    <button type="button" id="togglePasswordConfirm" class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Términos y condiciones -->
                    <div class="flex items-start pt-6">
                        <input type="checkbox" 
                               id="terms" 
                               name="terms" 
                               required
                               class="mt-1 w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                        <label for="terms" class="ml-3 text-sm text-gray-600">
                            Acepto los 
                            <a href="#" class="text-green-600 hover:text-green-700 font-medium">términos y condiciones empresariales</a>, 
                            la <a href="#" class="text-green-600 hover:text-green-700 font-medium">política de privacidad</a>
                            y las <a href="#" class="text-green-600 hover:text-green-700 font-medium">condiciones de venta</a>
                        </label>
                    </div>

                    <!-- Botón de registro -->
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold py-4 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-green-300">
                        <i class="fas fa-building mr-2"></i>Registrar empresa
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
                        <a href="{{ route('login.company') }}" 
                           class="text-green-600 hover:text-green-700 font-medium transition-colors duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i>Inicia sesión aquí
                        </a>
                    </div>

                    <!-- Link a registro usuario -->
                    <div class="text-center pt-4 border-t border-gray-200">
                        <p class="text-sm text-gray-600 mb-2">¿Eres usuario individual?</p>
                        <a href="{{ route('register.company') }}?type=user" 
                           class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium transition-colors duration-300">
                            <i class="fas fa-user mr-2"></i>Registrarse como usuario
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
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Registrando empresa...';
            button.disabled = true;
        });

        // Phone number formatting
        document.getElementById('phone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.startsWith('57')) {
                value = value.slice(2);
            }
            if (value.length > 0) {
                if (value.length <= 3) {
                    value = `+57 ${value}`;
                } else if (value.length <= 6) {
                    value = `+57 ${value.slice(0, 3)} ${value.slice(3)}`;
                } else {
                    value = `+57 ${value.slice(0, 3)} ${value.slice(3, 6)} ${value.slice(6, 10)}`;
                }
            }
            e.target.value = value;
        });
    </script>
</body>
</html>