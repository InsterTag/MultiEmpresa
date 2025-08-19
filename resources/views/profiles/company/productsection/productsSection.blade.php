@extends('layouts.company')
@section('content')
        <!-- Main Content -->
        <div class="flex-1 lg:ml-0 p-6">
            <!-- Header -->
            <div class="glass-effect rounded-2xl p-6 mb-6 animate-fade-in">
                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800 mb-2">Gestión de Productos</h1>
                        <p class="text-gray-600">Administra tu inventario, precios y características de productos</p>
                    </div>
                    <div class="mt-4 lg:mt-0 flex flex-col lg:flex-row gap-4">
                        <button class="bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-lg transition-colors" onclick="showSection('add-product')">
                            <i class="fas fa-plus mr-2"></i>
                            Nuevo Producto
                        </button>
                        <button class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg transition-colors">
                            <i class="fas fa-download mr-2"></i>
                            Exportar
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation Tabs -->
            <div class="glass-effect rounded-2xl p-4 mb-6 animate-fade-in" style="animation-delay: 0.1s;">
                <div class="flex flex-wrap gap-2">
                    <button class="tab-btn active bg-primary text-white px-6 py-2 rounded-lg transition-colors" onclick="showSection('product-list')" data-tab="product-list">
                        <i class="fas fa-list mr-2"></i>
                        Lista de Productos
                    </button>
                    <button class="tab-btn bg-gray-100 text-gray-700 px-6 py-2 rounded-lg transition-colors hover:bg-gray-200" onclick="showSection('add-product')" data-tab="add-product">
                        <i class="fas fa-plus mr-2"></i>
                        Agregar Producto
                    </button>
                    <button class="tab-btn bg-gray-100 text-gray-700 px-6 py-2 rounded-lg transition-colors hover:bg-gray-200" onclick="showSection('categories')" data-tab="categories">
                        <i class="fas fa-tags mr-2"></i>
                        Categorías
                    </button>
                    <button class="tab-btn bg-gray-100 text-gray-700 px-6 py-2 rounded-lg transition-colors hover:bg-gray-200" onclick="showSection('inventory')" data-tab="inventory">
                        <i class="fas fa-boxes mr-2"></i>
                        Inventario
                    </button>
                </div>
            </div>

            <!-- Product List Section -->
            <div id="product-list" class="section-content">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="stat-card glass-effect rounded-2xl p-6 animate-fade-in">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-primary/10 rounded-lg">
                                <i class="fas fa-box text-primary text-xl"></i>
                            </div>
                            <span class="text-green-500 text-sm font-semibold">+3</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">156</h3>
                        <p class="text-gray-600">Total Productos</p>
                    </div>

                    <div class="stat-card glass-effect rounded-2xl p-6 animate-fade-in" style="animation-delay: 0.1s;">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-accent/10 rounded-lg">
                                <i class="fas fa-check-circle text-accent text-xl"></i>
                            </div>
                            <span class="text-green-500 text-sm font-semibold">142</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">142</h3>
                        <p class="text-gray-600">En Stock</p>
                    </div>

                    <div class="stat-card glass-effect rounded-2xl p-6 animate-fade-in" style="animation-delay: 0.2s;">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-secondary/10 rounded-lg">
                                <i class="fas fa-exclamation-triangle text-secondary text-xl"></i>
                            </div>
                            <span class="text-red-500 text-sm font-semibold">8</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">8</h3>
                        <p class="text-gray-600">Stock Bajo</p>
                    </div>

                    <div class="stat-card glass-effect rounded-2xl p-6 animate-fade-in" style="animation-delay: 0.3s;">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-red-100 rounded-lg">
                                <i class="fas fa-times-circle text-red-500 text-xl"></i>
                            </div>
                            <span class="text-red-500 text-sm font-semibold">6</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">6</h3>
                        <p class="text-gray-600">Agotados</p>
                    </div>
                </div>

                <!-- Search and Filters -->
                <div class="glass-effect rounded-2xl p-6 mb-8 animate-fade-in" style="animation-delay: 0.4s;">
                    <div class="flex flex-col lg:flex-row gap-4">
                        <div class="flex-1">
                            <div class="relative">
                                <input type="text" placeholder="Buscar productos..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </div>
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 min-w-0 lg:min-w-48">
                            <option>Todas las categorías</option>
                            <option>Electrónicos</option>
                            <option>Ropa</option>
                            <option>Hogar</option>
                        </select>
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 min-w-0 lg:min-w-48">
                            <option>Todos los estados</option>
                            <option>En stock</option>
                            <option>Stock bajo</option>
                            <option>Agotado</option>
                        </select>
                    </div>
                </div>

                <!-- Products Table -->
                <div class="glass-effect rounded-2xl p-6 animate-fade-in" style="animation-delay: 0.5s;">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-200">
                                    <th class="text-left py-3 px-4 font-semibold text-gray-800">Producto</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-800 hidden md:table-cell">SKU</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-800 hidden lg:table-cell">Categoría</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-800">Precio</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-800 hidden sm:table-cell">Stock</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-800">Estado</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-800">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-200 hover:bg-white/30 transition-colors">
                                    <td class="py-4 px-4">
                                        <div class="flex items-center">
                                            <img src="https://via.placeholder.com/50x50/3b82f6/ffffff?text=IMG" alt="Producto" class="w-12 h-12 rounded-lg mr-3">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">iPhone 14 Pro Max</h4>
                                                <p class="text-sm text-gray-600 hidden sm:block">256GB - Color Morado</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-gray-600 hidden md:table-cell">IPH14PM-256-MOR</td>
                                    <td class="py-4 px-4 text-gray-600 hidden lg:table-cell">Electrónicos</td>
                                    <td class="py-4 px-4 font-semibold text-gray-800">$1,299.99</td>
                                    <td class="py-4 px-4 text-gray-600 hidden sm:table-cell">24</td>
                                    <td class="py-4 px-4">
                                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">En Stock</span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex gap-2">
                                            <button class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition-colors" title="Ver">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="p-2 text-yellow-600 hover:bg-yellow-100 rounded-lg transition-colors" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition-colors hidden sm:block" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200 hover:bg-white/30 transition-colors">
                                    <td class="py-4 px-4">
                                        <div class="flex items-center">
                                            <img src="https://via.placeholder.com/50x50/ef4444/ffffff?text=IMG" alt="Producto" class="w-12 h-12 rounded-lg mr-3">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">MacBook Pro M2</h4>
                                                <p class="text-sm text-gray-600 hidden sm:block">13" - 8GB RAM 256GB SSD</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-gray-600 hidden md:table-cell">MBP13-M2-256</td>
                                    <td class="py-4 px-4 text-gray-600 hidden lg:table-cell">Electrónicos</td>
                                    <td class="py-4 px-4 font-semibold text-gray-800">$1,799.99</td>
                                    <td class="py-4 px-4 text-gray-600 hidden sm:table-cell">5</td>
                                    <td class="py-4 px-4">
                                        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">Stock Bajo</span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex gap-2">
                                            <button class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition-colors" title="Ver">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="p-2 text-yellow-600 hover:bg-yellow-100 rounded-lg transition-colors" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition-colors hidden sm:block" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="flex flex-col lg:flex-row justify-between items-center mt-6 pt-6 border-t border-gray-200">
                        <p class="text-gray-600 text-sm mb-4 lg:mb-0">Mostrando 1-10 de 156 productos</p>
                        <div class="flex gap-2">
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="px-3 py-2 bg-primary text-white rounded-lg">1</button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">2</button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">3</button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Product Section -->
            <div id="add-product" class="section-content hidden">
                <div class="glass-effect rounded-2xl p-6 animate-fade-in">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Agregar Nuevo Producto</h2>
                    
                    <form class="space-y-6">
                        <!-- Basic Info -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">Nombre del Producto *</label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ingrese el nombre del producto">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">SKU *</label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Código único del producto">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">Categoría *</label>
                                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option>Seleccionar categoría</option>
                                    <option>Electrónicos</option>
                                    <option>Ropa</option>
                                    <option>Hogar</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">Precio *</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">$</span>
                                    <input type="number" class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="0.00">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">Stock Inicial *</label>
                                <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="0">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-2">Descripción</label>
                            <textarea rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Descripción detallada del producto"></textarea>
                        </div>

                        <!-- Image Upload -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-2">Imágenes del Producto</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                                <p class="text-gray-600 mb-2">Arrastra y suelta las imágenes aquí o</p>
                                <button type="button" class="bg-primary text-white px-4 py-2 rounded-lg">Seleccionar Archivos</button>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-6">
                            <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-lg transition-colors">
                                <i class="fas fa-save mr-2"></i>
                                Guardar Producto
                            </button>
                            <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-lg transition-colors">
                                <i class="fas fa-times mr-2"></i>
                                Cancelar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Categories Section -->
            <div id="categories" class="section-content hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Categories List -->
                    <div class="glass-effect rounded-2xl p-6 animate-fade-in">
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-4 sm:mb-0">Categorías</h2>
                            <button class="bg-primary text-white px-4 py-2 rounded-lg">
                                <i class="fas fa-plus mr-2"></i>Nueva
                            </button>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-white/30 rounded-lg backdrop-blur-sm hover:bg-white/40 transition-colors">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-laptop text-primary text-sm"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800">Electrónicos</h4>
                                        <p class="text-sm text-gray-600">89 productos</p>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <button class="p-2 text-yellow-600 hover:bg-yellow-100 rounded-lg transition-colors">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition-colors">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-white/30 rounded-lg backdrop-blur-sm hover:bg-white/40 transition-colors">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-accent/10 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-tshirt text-accent text-sm"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800">Ropa</h4>
                                        <p class="text-sm text-gray-600">45 productos</p>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <button class="p-2 text-yellow-600 hover:bg-yellow-100 rounded-lg transition-colors">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition-colors">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add Category Form -->
                    <div class="glass-effect rounded-2xl p-6 animate-fade-in">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">Nueva Categoría</h2>
                        
                        <form class="space-y-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">Nombre *</label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">Descripción</label>
                                <textarea rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                            </div>
                            <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white py-3 rounded-lg transition-colors">
                                <i class="fas fa-save mr-2"></i>
                                Crear Categoría
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Inventory Section -->
            <div id="inventory" class="section-content hidden">
                <div class="glass-effect rounded-2xl p-6 animate-fade-in">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 sm:mb-0">Control de Inventario</h2>
                        <button class="bg-primary text-white px-4 py-2 rounded-lg">
                            <i class="fas fa-plus mr-2"></i>Ajuste de Stock
                        </button>
                    </div>
                    
                    <!-- Inventory Alerts -->
                    <div class="space-y-4">
                        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                            <div class="flex items-start">
                                <i class="fas fa-exclamation-triangle text-red-500 mr-3 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold text-red-800">Stock Crítico</h4>
                                    <p class="text-sm text-red-600">6 productos están agotados y requieren reposición inmediata</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <div class="flex items-start">
                                <i class="fas fa-exclamation-circle text-yellow-500 mr-3 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold text-yellow-800">Stock Bajo</h4>
                                    <p class="text-sm text-yellow-600">8 productos tienen stock por debajo del mínimo recomendado</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Tab switching functionality
            function showSection(sectionId) {
                // Hide all sections
                document.querySelectorAll('.section-content').forEach(section => {
                    section.classList.add('hidden');
                });
                
                // Show selected section
                document.getElementById(sectionId).classList.remove('hidden');
                
                // Update tab buttons
                document.querySelectorAll('.tab-btn').forEach(btn => {
                    btn.classList.remove('active', 'bg-primary', 'text-white');
                    btn.classList.add('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
                });
                
                // Activate selected tab
                const activeBtn = document.querySelector(`[data-tab="${sectionId}"]`);
                if (activeBtn) {
                    activeBtn.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
                    activeBtn.classList.add('active', 'bg-primary', 'text-white');
                }
            }

            // Set last update time (from the original dashboard pattern)
            document.addEventListener('DOMContentLoaded', function() {
                const now = new Date();
                const timeString = now.toLocaleString('es-ES', {
                    day: '2-digit',
                    month: '2-digit', 
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });
                
                const lastUpdateEl = document.getElementById('lastUpdate');
                if (lastUpdateEl) {
                    lastUpdateEl.textContent = timeString;
                }
            });
        </script>
@endsection