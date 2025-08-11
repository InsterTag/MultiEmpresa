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