
<!-- Profile Header -->
<div class="relative rounded-2xl p-8 mb-8 fade-in card-shadow-lg bg-white">
    <!-- Header Icons - Top Right -->
    <div class="absolute top-6 right-6 flex space-x-3">
        <!-- Notifications Icon -->
        <button class="p-2 rounded-lg hover:bg-gray-100 transition-all duration-200 relative" onclick="showNotifications()">
            <i class="fas fa-bell text-gray-600 text-lg"></i>
            <div class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-bold">3</div>
        </button>
        
        <!-- Settings Icon -->
        <button class="p-2 rounded-lg hover:bg-gray-100 transition-all duration-200" onclick="openSettingsModal()">
            <i class="fas fa-cog text-gray-600 text-lg"></i>
        </button>
    </div>
    
    <div class="flex flex-col lg:flex-row items-center lg:items-start space-y-6 lg:space-y-0 lg:space-x-10">

        <!-- Profile Image Section -->
        <div class="relative group">
            <div class="profile-image-container w-36 h-36 rounded-2xl overflow-hidden shadow-xl group-hover:shadow-2xl transition-all duration-300 relative"
                 onclick="document.getElementById('fileInput').click()">
                <img id="profileImage" 
                     src=""
                     alt="profile image" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                <div class="upload-overlay">
                    <i class="fas fa-camera text-white text-2xl"></i>
                </div>
            </div>
            
            <!-- Hidden file input -->
            <input type="file" 
                   id="fileInput" 
                   accept="image/*" 
                   onchange="handleImageUpload(event)">
            
            <!-- Camera button -->
            <button onclick="document.getElementById('fileInput').click()" 
                    class="absolute -bottom-2 -right-2 bg-blue-500 text-white p-3 rounded-xl shadow-lg hover:bg-blue-600 transition-all duration-200 hover:scale-105">
                <i class="fas fa-camera"></i>
            </button>
        </div>
        
        <!-- Profile Info -->
        <div class="flex-1 text-center lg:text-left">
            <div class="mb-6">
                <h1 class="text-4xl font-bold custom-text-primary mb-2">{{ auth()->user()->username }}</h1>
                <p class="custom-text-secondary text-lg mb-4">{{ auth()->user()->email }}</p>
                <div class="flex flex-wrap gap-3 justify-center lg:justify-start">
                    <span class="px-4 py-2 bg-blue-500 text-white text-sm rounded-xl font-medium">Cliente VIP</span>
                    <span class="px-4 py-2 bg-green-500 text-white text-sm rounded-xl font-medium">Verificado</span>
                    <span class="px-4 py-2 bg-purple-500 text-white text-sm rounded-xl font-medium">Premium</span>
                </div>
            </div>
            
            <!-- Stats -->
            <div class="grid grid-cols-3 gap-6 max-w-md mx-auto lg:mx-0">
                <div class="bg-gray-50 text-center p-4 rounded-xl">
                    <div class="text-3xl font-bold text-blue-600 mb-1">156</div>
                    <div class="text-sm text-gray-600 font-medium">Pedidos</div>
                </div>
                <div class="bg-gray-50 text-center p-4 rounded-xl">
                    <div class="text-3xl font-bold text-orange-500 mb-1">24</div>
                    <div class="text-sm text-gray-600 font-medium">Favoritos</div>
                </div>
                <div class="bg-gray-50 text-center p-4 rounded-xl">
                    <div class="text-3xl font-bold text-green-500 mb-1">8.5k</div>
                    <div class="text-sm text-gray-600 font-medium">Puntos</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Settings Modal -->
<div id="settingsModal" class="modal-overlay" onclick="closeModalOnOverlay(event)">
    <div class="modal-content" onclick="event.stopPropagation()">
        <!-- Modal Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-cog mr-2 text-gray-600"></i>
                Configuraciones
            </h2>
            <button onclick="closeSettingsModal()" class="text-gray-400 hover:text-gray-600 text-xl">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Settings Form -->
        <form id="settingsForm" method="POST" action="">
            @csrf
            @method('PUT')
            
            <!-- Username Section -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-user mr-1"></i>
                    Nombre de Usuario
                </label>
                <input type="text" 
                       name="username" 
                       id="usernameInput"
                       value="{{ auth()->user()->username }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                       placeholder="Ingresa tu nombre de usuario">
                <p class="text-xs text-gray-500 mt-1">Este será tu nombre visible en la plataforma</p>
            </div>

            <!-- Password Section -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-lock mr-1"></i>
                    Nueva Contraseña
                </label>
                <div class="relative">
                    <input type="password" 
                           name="password" 
                           id="passwordInput"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                           placeholder="Ingresa una nueva contraseña">
                    <button type="button" onclick="togglePassword('passwordInput')" class="absolute right-3 top-3 text-gray-500 hover:text-gray-700">
                        <i class="fas fa-eye" id="passwordInput-icon"></i>
                    </button>
                </div>
                <p class="text-xs text-gray-500 mt-1">Deja en blanco si no quieres cambiar la contraseña</p>
            </div>

            <!-- Confirm Password Section -->
            <div class="mb-8">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-lock mr-1"></i>
                    Confirmar Nueva Contraseña
                </label>
                <div class="relative">
                    <input type="password" 
                           name="password_confirmation" 
                           id="confirmPasswordInput"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                           placeholder="Confirma tu nueva contraseña">
                    <button type="button" onclick="togglePassword('confirmPasswordInput')" class="absolute right-3 top-3 text-gray-500 hover:text-gray-700">
                        <i class="fas fa-eye" id="confirmPasswordInput-icon"></i>
                    </button>
                </div>
            </div>

            <!-- Modal Actions -->
            <div class="flex space-x-3">
                <button type="button" 
                        onclick="closeSettingsModal()"
                        class="flex-1 px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-all duration-200">
                    <i class="fas fa-times mr-2"></i>
                    Cancelar
                </button>
                <button type="submit" 
                        class="flex-1 px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-all duration-200 font-medium">
                    <i class="fas fa-save mr-2"></i>
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>
@vite('resources/js/userUpdateImage.js')
