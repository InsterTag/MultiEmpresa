    @vite(['resources/css/navbar.css', 'resources/js/navbar.js'])
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
                        <button class="navbar-button custom-text-primary hover:custom-primary font-medium px-2 py-2">
                            Destacados
                        </button>
                        <button class="navbar-button custom-text-primary hover:custom-primary font-medium px-2 py-2">
                            Productos
                        </button>
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
                <!-- Lado derecho - Login y Carrito -->
                <div class="flex items-center space-x-4">
                    <button id="loginBtn" class="navbar-button custom-text-primary hover:custom-primary font-medium px-3 py-2 flex items-center space-x-1">
                        <i class="fas fa-user"></i>
                        <span class="hidden sm:inline">Iniciar Sesión</span>
                        <i class="fas fa-chevron-down text-xs transition-transform duration-300" id="loginIcon"></i>
                    </button>

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
                <a href="#" class="block py-2 custom-text-primary font-medium">Destacados</a>
                <a href="#" class="block py-2 custom-text-primary font-medium">Productos</a>
                <button class="block py-2 custom-text-primary font-medium text-left w-full">Categorías</button>
            </div>
        </div>
    </nav>
    @include('modals.loginModal')