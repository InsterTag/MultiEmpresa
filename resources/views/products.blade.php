@extends('layouts.app')
@section('content')
    <!-- Main Content -->
        <div class="container mx-auto px-4 py-8">
        <div class="flex gap-8">
            <!-- Sidebar de Filtros -->
            <aside class="w-80 bg-white rounded-lg shadow-lg sticky-aside filter-sidebar p-6">
                <div class="mb-6">
                    <h2 class="text-xl font-bold custom-text-primary mb-4">Filtros</h2>

                    <!-- Búsqueda -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium custom-text-secondary mb-2">Buscar productos</label>
                        <input type="text" id="searchInput" placeholder="Buscar..."
                               class="w-full px-3 py-2 border custom-border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- Rango de Precio -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium custom-text-secondary mb-2">Rango de Precio</label>
                        <div class="flex gap-2">
                            <input type="number" id="minPrice" placeholder="Min"
                                   class="w-full px-3 py-2 border custom-border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <input type="number" id="maxPrice" placeholder="Max"
                                   class="w-full px-3 py-2 border custom-border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <!-- Categorías -->
                    <div class="mb-6">
                        <h3 class="font-semibold custom-text-primary mb-3">Categorías</h3>
                        <div id="categoriesFilter">
                            <div class="category-group">
                                <button class="category-btn w-full text-left px-3 py-2 rounded-lg filter-option custom-text-primary hover:custom-primary-bg hover:text-white transition-colors"
                                        data-category="electrodomesticos">
                                    <span class="flex justify-between items-center">
                                        Electrodomésticos
                                        <svg class="w-4 h-4 transform transition-transform category-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </span>
                                </button>
                                <div class="category-subcategories ml-4 mt-2 hidden">
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="marca" data-value="Samsung">
                                        <span class="text-sm custom-text-secondary">Samsung</span>
                                    </label>
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="marca" data-value="LG">
                                        <span class="text-sm custom-text-secondary">LG</span>
                                    </label>
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="marca" data-value="Oster">
                                        <span class="text-sm custom-text-secondary">Oster</span>
                                    </label>
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="marca" data-value="Dyson">
                                        <span class="text-sm custom-text-secondary">Dyson</span>
                                    </label>
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="marca" data-value="Nespresso">
                                        <span class="text-sm custom-text-secondary">Nespresso</span>
                                    </label>
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="tamaño" data-value="Grande">
                                        <span class="text-sm custom-text-secondary">Grande</span>
                                    </label>
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="tamaño" data-value="Mediano">
                                        <span class="text-sm custom-text-secondary">Mediano</span>
                                    </label>
                                </div>
                            </div>
                            <div class="category-group mt-4">
                                <button class="category-btn w-full text-left px-3 py-2 rounded-lg filter-option custom-text-primary hover:custom-primary-bg hover:text-white transition-colors"
                                        data-category="ropa">
                                    <span class="flex justify-between items-center">
                                        Ropa y Accesorios
                                        <svg class="w-4 h-4 transform transition-transform category-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </span>
                                </button>
                                <div class="category-subcategories ml-4 mt-2 hidden">
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="talla" data-value="S">
                                        <span class="text-sm custom-text-secondary">Talla S</span>
                                    </label>
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="talla" data-value="M">
                                        <span class="text-sm custom-text-secondary">Talla M</span>
                                    </label>
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="color" data-value="Azul">
                                        <span class="text-sm custom-text-secondary">Azul</span>
                                    </label>
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="color" data-value="Rojo">
                                        <span class="text-sm custom-text-secondary">Rojo</span>
                                    </label>
                                </div>
                            </div>
                            <div class="category-group mt-4">
                                <button class="category-btn w-full text-left px-3 py-2 rounded-lg filter-option custom-text-primary hover:custom-primary-bg hover:text-white transition-colors"
                                        data-category="tecnologia">
                                    <span class="flex justify-between items-center">
                                        Tecnología
                                        <svg class="w-4 h-4 transform transition-transform category-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </span>
                                </button>
                                <div class="category-subcategories ml-4 mt-2 hidden">
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="marca" data-value="Apple">
                                        <span class="text-sm custom-text-secondary">Apple</span>
                                    </label>
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="marca" data-value="Sony">
                                        <span class="text-sm custom-text-secondary">Sony</span>
                                    </label>
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="marca" data-value="Google">
                                        <span class="text-sm custom-text-secondary">Google</span>
                                    </label>
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="marca" data-value="Nintendo">
                                        <span class="text-sm custom-text-secondary">Nintendo</span>
                                    </label>
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="almacenamiento" data-value="64GB">
                                        <span class="text-sm custom-text-secondary">64GB</span>
                                    </label>
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="almacenamiento" data-value="128GB">
                                        <span class="text-sm custom-text-secondary">128GB</span>
                                    </label>
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="almacenamiento" data-value="256GB">
                                        <span class="text-sm custom-text-secondary">256GB</span>
                                    </label>
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="almacenamiento" data-value="825GB">
                                        <span class="text-sm custom-text-secondary">825GB</span>
                                    </label>
                                </div>
                            </div>
                            <div class="category-group mt-4">
                                <button class="category-btn w-full text-left px-3 py-2 rounded-lg filter-option custom-text-primary hover:custom-primary-bg hover:text-white transition-colors"
                                        data-category="hogar">
                                    <span class="flex justify-between items-center">
                                        Hogar
                                        <svg class="w-4 h-4 transform transition-transform category-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </span>
                                </button>
                                <div class="category-subcategories ml-4 mt-2 hidden">
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="tipo" data-value="Decoración">
                                        <span class="text-sm custom-text-secondary">Decoración</span>
                                    </label>
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="tipo" data-value="Muebles">
                                        <span class="text-sm custom-text-secondary">Muebles</span>
                                    </label>
                                </div>
                            </div>
                            <div class="category-group mt-4">
                                <button class="category-btn w-full text-left px-3 py-2 rounded-lg filter-option custom-text-primary hover:custom-primary-bg hover:text-white transition-colors"
                                        data-category="deportes">
                                    <span class="flex justify-between items-center">
                                        Deportes
                                        <svg class="w-4 h-4 transform transition-transform category-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </span>
                                </button>
                                <div class="category-subcategories ml-4 mt-2 hidden">
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="tipo" data-value="Fitness">
                                        <span class="text-sm custom-text-secondary">Fitness</span>
                                    </label>
                                    <label class="flex items-center py-1 filter-option">
                                        <input type="checkbox" class="mr-2 subcategory-filter" data-subcategory="tipo" data-value="Aire Libre">
                                        <span class="text-sm custom-text-secondary">Aire Libre</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Rating -->
                    <div class="mb-6">
                        <h3 class="font-semibold custom-text-primary mb-3">Calificación</h3>
                        <div id="ratingFilter">
                            <label class="flex items-center py-1 filter-option">
                                <input type="radio" name="rating" value="5" class="mr-2">
                                <div class="flex items-center">
                                    <div class="flex star-rating">★★★★★</div>
                                    <span class="ml-2 text-sm custom-text-secondary">5 estrellas</span>
                                </div>
                            </label>
                            <label class="flex items-center py-1 filter-option">
                                <input type="radio" name="rating" value="4" class="mr-2">
                                <div class="flex items-center">
                                    <div class="flex star-rating">★★★★☆</div>
                                    <span class="ml-2 text-sm custom-text-secondary">4+ estrellas</span>
                                </div>
                            </label>
                            <label class="flex items-center py-1 filter-option">
                                <input type="radio" name="rating" value="3" class="mr-2">
                                <div class="flex items-center">
                                    <div class="flex star-rating">★★★☆☆</div>
                                    <span class="ml-2 text-sm custom-text-secondary">3+ estrellas</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Botón Limpiar Filtros -->
                    <button id="clearFilters" class="w-full custom-primary-bg text-white py-2 px-4 rounded-lg hover:custom-primary-dark-bg transition-colors">
                        Limpiar Filtros
                    </button>
                </div>
            </aside>

            <!-- Contenedor Principal de Productos -->
            <main class="flex-1">
                <!-- Header con ordenamiento -->
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h1 class="text-3xl font-bold custom-text-primary">Catálogo de Productos</h1>
                        <p class="custom-text-secondary mt-1">Descubre nuestra amplia selección de productos</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <select id="sortSelect" class="px-4 py-2 border custom-border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="name">Nombre A-Z</option>
                            <option value="price-low">Precio: Menor a Mayor</option>
                            <option value="price-high">Precio: Mayor a Menor</option>
                            <option value="rating">Mejor Calificados</option>
                        </select>
                    </div>
                </div>

                <!-- Grid de Productos -->
                <div id="productsContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <!-- Los productos se cargarán aquí dinámicamente -->
                </div>

                <!-- Loading Indicator -->
                <div id="loadingIndicator" class="hidden text-center py-8">
                    <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 custom-primary-bg"></div>
                    <p class="mt-2 custom-text-secondary">Cargando más productos...</p>
                </div>

                <!-- No hay más productos -->
                <div id="noMoreProducts" class="hidden text-center py-8">
                    <p class="custom-text-secondary">No hay más productos para mostrar</p>
                </div>
            </main>
        </div>
    </div>

    <!-- Notificación -->
    <div id="notification" class="notification">
        Producto añadido al carrito
    </div>

    <!-- Modal del Carrito -->
    <div id="cartModal" class="modal">
        <div class="modal-content">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold custom-text-primary">Carrito</h2>
                <span class="close cursor-pointer">&times;</span>
            </div>
            <div id="cartItems">
                <!-- Los productos del carrito se mostrarán aquí -->
            </div>
            <div class="mt-4 pt-4 border-t">
                <div class="flex justify-between items-center mb-4">
                    <span class="font-bold">Total:</span>
                    <span id="cartTotal" class="font-bold">$0.00</span>
                </div>
                <button class="w-full bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition-colors">
                    Finalizar Compra
                </button>
            </div>
        </div>
    </div>

    <!-- Botón flotante del carrito -->
    <div class="floating-cart" id="floatingCart">
        <i class="fas fa-shopping-cart text-white text-2xl"></i>
        <span id="cartCount" class="cart-count" style="display: none;">0</span>
    </div>
@endsection
