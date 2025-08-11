<!-- Navbar -->
<nav class="custom-bg-white shadow-lg border-b custom-border sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <div class="flex items-center space-x-2 floating-animation">
                    <div class="w-8 h-8 custom-primary-bg rounded-lg flex items-center justify-center">
                        <i class="fas fa-store text-white text-sm"></i>
                    </div>
                    <span class="text-xl font-bold logo-text">marketplace-pro</span>
                </div>
            </div>

            <!-- Centro - Navegación y Búsqueda -->
            <div class="hidden md:flex items-center space-x-8 flex-1 justify-center max-w-2xl">
                <!-- Botones de navegación -->
                <div class="flex items-center space-x-6">
                    <a href="{{ route('home') }}" class="navbar-button custom-text-primary hover:custom-primary font-medium px-2 py-2">
                        Destacados
                    </a>
                    <a href="{{ route('productos') }}" class="navbar-button custom-text-primary hover:custom-primary font-medium px-2 py-2">
                        Productos
                    </a>
                    <div class="categories-container">
                        <button id="categoriesBtn" class="navbar-button custom-text-primary hover:custom-primary font-medium px-2 py-2 flex items-center space-x-1">
                            <span>Categorías</span>
                            <i class="fas fa-chevron-down text-xs transition-transform duration-300" id="categoriesIcon"></i>
                        </button>
                        <!-- Dropdown de Categorías -->
                        <div id="categoriesDropdown" class="categories-dropdown custom-bg-white rounded-lg shadow-xl border custom-border">
                            <div class="p-6">
                                <div class="grid grid-cols-4 gap-4">
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-laptop custom-primary text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Electrónicos</h3>
                                                <p class="text-sm custom-text-secondary">Computadoras, celulares</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-tshirt custom-secondary text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Ropa y Moda</h3>
                                                <p class="text-sm custom-text-secondary">Moda para todos</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-home custom-accent text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Hogar y Jardín</h3>
                                                <p class="text-sm custom-text-secondary">Decoración, muebles</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-gamepad custom-primary text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Gaming</h3>
                                                <p class="text-sm custom-text-secondary">Videojuegos, consolas</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-car custom-secondary text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Automóviles</h3>
                                                <p class="text-sm custom-text-secondary">Carros, repuestos</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-book custom-accent text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Libros</h3>
                                                <p class="text-sm custom-text-secondary">Literatura, educación</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-dumbbell custom-primary text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Deportes</h3>
                                                <p class="text-sm custom-text-secondary">Fitness, deportes</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-baby custom-secondary text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Bebés y Niños</h3>
                                                <p class="text-sm custom-text-secondary">Juguetes, ropa infantil</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-gem custom-accent text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Joyería</h3>
                                                <p class="text-sm custom-text-secondary">Anillos, collares</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-utensils custom-primary text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Cocina</h3>
                                                <p class="text-sm custom-text-secondary">Electrodomésticos</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-music custom-secondary text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Música</h3>
                                                <p class="text-sm custom-text-secondary">Instrumentos, audio</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-camera custom-accent text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Fotografía</h3>
                                                <p class="text-sm custom-text-secondary">Cámaras, lentes</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-tools custom-primary text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Herramientas</h3>
                                                <p class="text-sm custom-text-secondary">Construcción, bricolaje</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-heart custom-secondary text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Salud y Belleza</h3>
                                                <p class="text-sm custom-text-secondary">Cosméticos, cuidado</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-paw custom-accent text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Mascotas</h3>
                                                <p class="text-sm custom-text-secondary">Alimentos, accesorios</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-graduation-cap custom-primary text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Educación</h3>
                                                <p class="text-sm custom-text-secondary">Cursos, material</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-gift custom-secondary text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Regalos</h3>
                                                <p class="text-sm custom-text-secondary">Ideas especiales</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-plane custom-accent text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Viajes</h3>
                                                <p class="text-sm custom-text-secondary">Equipaje, accesorios</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-leaf custom-primary text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Ecológico</h3>
                                                <p class="text-sm custom-text-secondary">Productos sostenibles</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-item p-3 rounded-lg border custom-border transition-all duration-300 cursor-pointer">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-paint-brush custom-secondary text-lg"></i>
                                            <div>
                                                <h3 class="font-medium custom-text-primary">Arte y Crafts</h3>
                                                <p class="text-sm custom-text-secondary">Materiales creativos</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Barra de búsqueda -->
                <div class="flex-1 max-w-md">
                    <div class="relative">
                        <input type="text"
                               placeholder="Buscar productos..."
                               class="search-input w-full pl-10 pr-4 py-2 border custom-border rounded-lg focus:outline-none custom-bg-white">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search custom-text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lado derecho - Botones de autenticación, perfil y carrito -->
            <div class="flex items-center space-x-4">
                <!-- Botones de autenticación (cuando no está autenticado) -->
                @guest
                    <a href="{{ route('login') }}" class="navbar-button custom-text-primary hover:custom-primary font-medium px-3 py-2 flex items-center space-x-1 border border-transparent hover:border-custom-border rounded-lg transition-all duration-300">
                        <i class="fas fa-sign-in-alt"></i>
                        <span class="hidden sm:inline">Iniciar Sesión</span>
                    </a>
                    <!-- Botón modificado para abrir el modal -->
                    <a href="{{ route('register') }}" class="navbar-button custom-primary-bg hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-lg transition-all duration-300">
                        <span class="hidden sm:inline">Registrate</span>
                    </a>
                @endguest
                <!-- Menú de perfil (cuando está autenticado) -->
                @auth
                    <div class="profile-container relative">
                        <button id="profileBtn" class="navbar-button custom-text-primary hover:custom-primary font-medium px-3 py-2 flex items-center space-x-2">
                                <div class="w-8 h-8 custom-primary-bg rounded-full flex items-center justify-center">
                                @php
                                    $initial = auth()->user()->username ? strtoupper(substr(auth()->user()->username, 0, 1)) : strtoupper(substr(auth()->user()->name, 0, 1));
                                @endphp
                                <span class="text-white text-sm font-medium">{{ $initial }}</span>
                                    </div>
                                <span class="hidden sm:inline">{{ auth()->user()->username ?? auth()->user()->name }}</span>
                                <i class="fas fa-chevron-down text-xs transition-transform duration-300" id="profileIcon"></i>
                        </button>
                        <!-- Dropdown de perfil -->
                        <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 custom-bg-white rounded-lg shadow-xl border custom-border z-50">
                                <div class="py-1">
                                    <a href="{{ route('profile') }}" class="block px-4 py-2 custom-text-primary hover:custom-hover-bg">
                                        <i class="fas fa-user mr-2"></i>Mi Perfil
                                    </a>
                                    <a href="#" class="block px-4 py-2 custom-text-primary hover:custom-hover-bg">
                                        <i class="fas fa-shopping-bag mr-2"></i>Mis Pedidos
                                    </a>
                                    <a href="#" class="block px-4 py-2 custom-text-primary hover:custom-hover-bg">
                                        <i class="fas fa-heart mr-2"></i>Favoritos
                                    </a>
                                    <div class="border-t custom-border"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 custom-text-primary hover:custom-hover-bg">
                                            <i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesión
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>
                @endauth
                <!-- Carrito de compras -->
                <button class="navbar-button relative p-2 custom-text-primary hover:custom-primary">
                    <i class="fas fa-shopping-cart text-lg"></i>
                    <span class="cart-badge absolute -top-1 -right-1 custom-primary-bg text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-bold">3</span>
                </button>
            </div>

            <!-- Botón menú móvil -->
            <div class="md:hidden">
                <button id="mobileMenuBtn" class="custom-text-primary p-2">
                    <i class="fas fa-bars text-lg"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Menú móvil -->
    <div id="mobileMenu" class="md:hidden hidden custom-bg-white border-t custom-border">
        <div class="px-4 py-3 space-y-3">
            <div class="relative mb-3">
                <input type="text" placeholder="Buscar productos..."
                       class="search-input w-full pl-10 pr-4 py-2 border custom-border rounded-lg focus:outline-none">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search custom-text-secondary"></i>
                </div>
            </div>
            <a href="{{ route('home') }}" class="block py-2 custom-text-primary font-medium">Destacados</a>
            <a href="{{ route('productos') }}" class="block py-2 custom-text-primary font-medium">Productos</a>
            <button class="block py-2 custom-text-primary font-medium text-left w-full">Categorías</button>

            <!-- Botones de autenticación en móvil -->
            @guest
                <div class="border-t custom-border pt-3 mt-3">
                    <a href="{{ route('login') }}" class="block py-2 custom-text-primary font-medium">Iniciar Sesión</a>
                    <!-- Botón móvil modificado para abrir el modal -->
                    <button id="openRegisterModalMobile" class="block py-2 custom-primary font-medium text-left w-full">Registrarse</button>
                </div>
            @endguest

            @auth
                <div class="border-t custom-border pt-3 mt-3">
                    <a href="{{ route('profile') }}" class="block py-2 custom-text-primary font-medium">Mi Perfil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block py-2 custom-text-primary font-medium text-left w-full">Cerrar Sesión</button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>

<!-- Modal de Registro -->
<div id="registerModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-auto transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
        <!-- Header del Modal -->
        <div class="px-8 py-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold custom-text-primary">Crear Cuenta</h2>
                <button id="closeModal" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <p class="text-sm custom-text-secondary mt-2">Selecciona el tipo de cuenta que deseas crear</p>
        </div>

        <!-- Contenido del Modal -->
        <div class="px-8 py-6">
            <div class="space-y-4">
                <!-- Opción Usuario Individual -->
                <div class="group">
                    <a href="{{ route('register') }}?type=user"
                       class="block p-6 rounded-xl border-2 border-gray-200 hover:border-blue-500 hover:bg-blue-50 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center group-hover:bg-blue-200 transition-colors duration-300">
                                    <i class="fas fa-user text-blue-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold custom-text-primary group-hover:text-blue-600 transition-colors duration-300">
                                    Usuario Individual
                                </h3>
                                <p class="text-sm custom-text-secondary mt-1">
                                    Para comprar y vender productos como persona natural
                                </p>
                                <div class="flex items-center mt-2 text-xs text-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span>Continuar como usuario</span>
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Opción Empresa -->
                <div class="group">
                    <a href="{{ route('register') }}?type=business"
                       class="block p-6 rounded-xl border-2 border-gray-200 hover:border-green-500 hover:bg-green-50 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center group-hover:bg-green-200 transition-colors duration-300">
                                    <i class="fas fa-building text-green-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold custom-text-primary group-hover:text-green-600 transition-colors duration-300">
                                    Empresa
                                </h3>
                                <p class="text-sm custom-text-secondary mt-1">
                                    Para empresas que quieren vender sus productos y servicios
                                </p>
                                <div class="flex items-center mt-2 text-xs text-green-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span>Continuar como empresa</span>
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer del Modal -->
        <div class="px-8 py-4 bg-gray-50 rounded-b-2xl">
            <p class="text-xs text-center custom-text-secondary">
                ¿Ya tienes una cuenta?
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-medium">
                    Inicia sesión aquí
                </a>
            </p>
        </div>
    </div>
</div>

<style>
/* Estilos adicionales para el modal */
.modal-enter {
    opacity: 1;
    transform: scale(1);
}
.modal-exit {
    opacity: 0;
    transform: scale(0.95);
}
/* Animación de hover para los iconos */
.group:hover .fa-user,
.group:hover .fa-building {
    transform: scale(1.1);
    transition: transform 0.3s ease;
}
/* Efecto de glassmorphism opcional */
#registerModal {
    backdrop-filter: blur(4px);
}
/* Responsive adjustments */
@media (max-width: 480px) {
    #modalContent {
        margin: 1rem;
        max-width: calc(100vw - 2rem);
    }
}
</style>

<script>
(function() {
    // Variables para elementos del DOM
    const categoriesContainer = document.querySelector('.categories-container');
    const categoriesBtn = document.getElementById('categoriesBtn');
    const categoriesDropdown = document.getElementById('categoriesDropdown');
    const categoriesIcon = document.getElementById('categoriesIcon');
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    
    // Variables para funcionalidad de auth (solo existirán si están en el DOM)
    const loginBtn = document.getElementById('loginBtn');
    const mobileLoginBtn = document.getElementById('mobileLoginBtn');
    const loginModal = document.getElementById('loginModal');
    const closeLoginModal = document.getElementById('closeLoginModal');
    const loginIcon = document.getElementById('loginIcon');
    const profileBtn = document.getElementById('profileBtn');
    const profileDropdown = document.getElementById('profileDropdown');
    const profileIcon = document.getElementById('profileIcon');
    
    let categoriesTimeout;

    // ========== FUNCIONALIDADES DEL DROPDOWN DE CATEGORÍAS ==========
    
    // Función para mostrar dropdown de categorías
    function showCategoriesDropdown() {
        clearTimeout(categoriesTimeout);
        categoriesDropdown.classList.add('active');
        categoriesDropdown.classList.remove('hidden');
        categoriesIcon.style.transform = 'rotate(180deg)';
    }

    // Función para ocultar dropdown de categorías
    function hideCategoriesDropdown() {
        categoriesTimeout = setTimeout(() => {
            categoriesDropdown.classList.remove('active');
            categoriesDropdown.classList.add('hidden');
            categoriesIcon.style.transform = 'rotate(0deg)';
        }, 300);
    }

    // Event listeners para dropdown de categorías (hover y click)
    if (categoriesContainer && categoriesDropdown) {
        // Funcionalidad hover
        categoriesContainer.addEventListener('mouseenter', showCategoriesDropdown);
        categoriesContainer.addEventListener('mouseleave', hideCategoriesDropdown);
        categoriesDropdown.addEventListener('mouseenter', () => clearTimeout(categoriesTimeout));
        categoriesDropdown.addEventListener('mouseleave', hideCategoriesDropdown);
        
        // Funcionalidad click (para dispositivos táctiles)
        if (categoriesBtn) {
            categoriesBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                if (categoriesDropdown.classList.contains('hidden')) {
                    showCategoriesDropdown();
                } else {
                    hideCategoriesDropdown();
                }
            });
        }
    }

    // ========== FUNCIONALIDADES DE MODAL Y AUTENTICACIÓN ==========
    
    // Función para abrir modal con animación
    function openModal(modal, icon) {
        modal.classList.add('active');
        modal.classList.remove('hidden');
        if (icon) {
            icon.style.transform = 'rotate(180deg)';
        }
        document.body.style.overflow = 'hidden';
    }

    // Función para cerrar modal con animación
    function closeModal(modal, icon) {
        modal.classList.remove('active');
        modal.classList.add('hidden');
        if (icon) {
            icon.style.transform = 'rotate(0deg)';
        }
        document.body.style.overflow = 'auto';
    }

    // Event listeners para modal de login (solo si existe)
    if (loginBtn && loginModal) {
        loginBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            openModal(loginModal, loginIcon);
        });
    }

    if (mobileLoginBtn && loginModal) {
        mobileLoginBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            openModal(loginModal, loginIcon);
        });
    }

    if (closeLoginModal && loginModal) {
        closeLoginModal.addEventListener('click', () => {
            closeModal(loginModal, loginIcon);
        });
    }

    // Cerrar modal al hacer click fuera
    if (loginModal) {
        loginModal.addEventListener('click', (e) => {
            if (e.target === loginModal) {
                closeModal(loginModal, loginIcon);
            }
        });
    }

    // ========== FUNCIONALIDADES DEL PERFIL DE USUARIO ==========
    
    // Event listeners para dropdown de perfil (solo si existe)
    if (profileBtn && profileDropdown) {
        profileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            profileDropdown.classList.toggle('hidden');
            if (profileIcon) {
                profileIcon.classList.toggle('rotate-180');
            }
        });
    }

    // ========== FUNCIONALIDADES GENERALES ==========
    
    // Cerrar modales con tecla Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            if (loginModal && loginModal.classList.contains('active')) {
                closeModal(loginModal, loginIcon);
            }
            if (categoriesDropdown && !categoriesDropdown.classList.contains('hidden')) {
                hideCategoriesDropdown();
            }
            if (profileDropdown && !profileDropdown.classList.contains('hidden')) {
                profileDropdown.classList.add('hidden');
                if (profileIcon) {
                    profileIcon.classList.remove('rotate-180');
                }
            }
        }
    });

    // Cerrar dropdowns al hacer clic fuera
    document.addEventListener('click', function(e) {
        // Cerrar dropdown de categorías
        if (categoriesDropdown && categoriesBtn && !categoriesBtn.contains(e.target) && !categoriesDropdown.contains(e.target)) {
            categoriesDropdown.classList.add('hidden');
            categoriesDropdown.classList.remove('active');
            categoriesIcon.style.transform = 'rotate(0deg)';
        }
        
        // Cerrar dropdown de perfil
        if (profileDropdown && profileBtn && !profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
            profileDropdown.classList.add('hidden');
            if (profileIcon) {
                profileIcon.classList.remove('rotate-180');
            }
        }
    });

    // Menú móvil
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // ========== ANIMACIONES Y EFECTOS VISUALES ==========
    
    // Animación suave al hacer scroll
    window.addEventListener('scroll', () => {
        const navbar = document.querySelector('nav');
        if (navbar) {
            if (window.scrollY > 10) {
                navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
            } else {
                navbar.style.boxShadow = '0 1px 3px rgba(0, 0, 0, 0.1)';
            }
        }
    });

    // Efecto de typing en la barra de búsqueda
    const searchInputs = document.querySelectorAll('.search-input');
    searchInputs.forEach(input => {
        input.addEventListener('focus', () => {
            input.style.transform = 'scale(1.02)';
            input.style.transition = 'transform 0.2s ease';
        });
        input.addEventListener('blur', () => {
            input.style.transform = 'scale(1)';
        });
    });

    // Animación para los elementos de categoría del dropdown
    const dropdownCategoryItems = document.querySelectorAll('#categoriesDropdown .category-item');
    dropdownCategoryItems.forEach((item, index) => {
        item.style.animationDelay = `${index * 0.05}s`;
        
        // Efectos hover mejorados
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 4px 12px rgba(0,0,0,0.1)';
            this.style.transition = 'all 0.3s ease';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
        
        // Click handler para categorías
        item.addEventListener('click', () => {
            console.log('Categoría seleccionada:', item.querySelector('h3').textContent);
            hideCategoriesDropdown();
            // Aquí puedes agregar la lógica para navegar a la categoría
        });
    });

    // Animación para elementos de categoría generales
    const categoryItems = document.querySelectorAll('.category-item');
    categoryItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 4px 12px rgba(0,0,0,0.1)';
            this.style.transition = 'all 0.3s ease';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });

    // ========== FUNCIONES DE UTILIDAD ==========
    
    // Función para detectar dispositivos táctiles
    function isTouchDevice() {
        return (('ontouchstart' in window) ||
                (navigator.maxTouchPoints > 0) ||
                (navigator.msMaxTouchPoints > 0));
    }

    // Ajustar comportamiento según el dispositivo
    if (isTouchDevice()) {
        // En dispositivos táctiles, usar solo click para categorías
        if (categoriesContainer) {
            categoriesContainer.removeEventListener('mouseenter', showCategoriesDropdown);
            categoriesContainer.removeEventListener('mouseleave', hideCategoriesDropdown);
        }
    }

    // ========== INICIALIZACIÓN ==========
    
    // Función de inicialización que se ejecuta cuando el DOM está listo
    function initNavbar() {
        console.log('Navbar inicializado correctamente');
        
        // Verificar que todos los elementos críticos existen
        if (!categoriesDropdown) {
            console.warn('Dropdown de categorías no encontrado');
        }
        
        // Inicializar estados
        if (categoriesDropdown) {
            categoriesDropdown.classList.add('hidden');
        }
        
        if (profileDropdown) {
            profileDropdown.classList.add('hidden');
        }
        
        if (loginModal) {
            loginModal.classList.add('hidden');
        }
        
        if (mobileMenu) {
            mobileMenu.classList.add('hidden');
        }
    }

    // Ejecutar inicialización
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initNavbar);
    } else {
        initNavbar();
    }

})();</script>
@vite(['resources/css/navbar.css', 'resources/js/navbar.js'])
