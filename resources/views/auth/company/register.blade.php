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
            <form method="POST" action="{{ route('register.company') }}" class="bg-white rounded-2xl shadow-xl p-8">
                @csrf
                
                <!-- Información de la Empresa -->
                <div class="space-y-6">
                    <!-- Nombre de la empresa -->
                    <div>
                        <label for="company_name" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-store text-green-600 mr-2"></i>Nombre de la empresa
                        </label>
                        <input type="text" 
                               id="company_name" 
                               name="company_name" 
                               value="{{ old('company_name') }}"
                               required 
                               autofocus
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('company_name') border-red-500 @enderror"
                               placeholder="Nombre completo de la empresa">
                        @error('company_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- NIT de la empresa -->
                    <div>
                        <label for="nit" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-id-card text-green-600 mr-2"></i>NIT de la empresa
                        </label>
                        <input type="text" 
                               id="nit" 
                               name="nit" 
                               value="{{ old('nit') }}"
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('nit') border-red-500 @enderror"
                               placeholder="Número de Identificación Tributaria">
                        @error('nit')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Sitio web -->
                    <div>
                        <label for="website" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-globe text-green-600 mr-2"></i>Sitio web
                        </label>
                        <input type="url" 
                               id="website" 
                               name="website" 
                               value="{{ old('website') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('website') border-red-500 @enderror"
                               placeholder="https://www.tuempresa.com">
                        @error('website')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="company_email" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-envelope text-green-600 mr-2"></i>Correo electrónico
                        </label>
                        <input type="email" 
                               id="company_email" 
                               name="company_email" 
                               value="{{ old('company_email') }}"
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('company_email') border-red-500 @enderror"
                               placeholder="contacto@empresa.com">
                        @error('company_email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Teléfono -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-phone text-green-600 mr-2"></i>Teléfono
                        </label>
                        <input type="text" 
                               id="phone" 
                               name="phone" 
                               value="{{ old('phone') }}"
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('phone') border-red-500 @enderror"
                               placeholder="Número de teléfono">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Dirección -->
                    <div>
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

                <!-- Términos y condiciones -->
                <div class="flex items-start pt-6">
                    <input type="checkbox" 
                           id="terms" 
                           name="terms" 
                           value="1"
                           required
                           class="mt-1 w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500 @error('terms') border-red-500 @enderror">
                    <label for="terms" class="ml-3 text-sm text-gray-600">
                        Acepto los 
                        <a href="#" class="text-green-600 hover:text-green-700 font-medium">términos y condiciones empresariales</a>, 
                        la <a href="#" class="text-green-600 hover:text-green-700 font-medium">política de privacidad</a>
                        y las <a href="#" class="text-green-600 hover:text-green-700 font-medium">condiciones de venta</a>
                    </label>
                    @error('terms')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botón de registro -->
                <button type="submit" 
                        class="w-full mt-6 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 font-bold py-4 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-green-300">
                    <i class="fas fa-building mr-2"></i>Registrar empresa
                </button>
                
                <div class="text-center mt-4">
                    <button type="button" onclick="goToUserStep()" class="text-gray-600 hover:text-gray-800">
                        ← Volver a registro de usuario
                    </button>
                </div>
            </form>
        </div>
    </div>  

    <script>
        // Form validation feedback
        document.querySelector('form')?.addEventListener('submit', function(e) {
            const button = this.querySelector('button[type="submit"]');
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Registrando empresa...';
            button.disabled = true;
        });

        // Formato para el NIT
        document.getElementById('nit')?.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 0) {
                value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{1})/, '$1.$2.$3-$4');
            }
            e.target.value = value;
        });

        // Función para volver al paso anterior
        function goToUserStep() {
            document.getElementById('stepCompany').classList.add('hidden');
            document.getElementById('stepUser').classList.remove('hidden');
        }
    </script>
</body>
</html>