<!-- Branches Management Component -->
<div id="branches" class="tab-content">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Gestión de Sucursales</h2>
            <p class="text-gray-600">Administra todas las ubicaciones de tu empresa</p>
            <div class="flex items-center gap-4 mt-3">
                <span class="text-sm text-gray-500">Total: <span class="font-semibold text-gray-800" id="totalBranches">0</span></span>
                <span class="text-sm text-gray-500">Activas: <span class="font-semibold text-green-600" id="activeBranches">0</span></span>
                <span class="text-sm text-gray-500">Inactivas: <span class="font-semibold text-red-600" id="inactiveBranches">0</span></span>
            </div>
        </div>
        <div class="flex gap-3">
            <button id="importBranchesBtn" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center gap-2">
                <i class="fas fa-upload"></i>
                <span>Importar</span>
            </button>
            <button id="exportBranchesBtn" class="bg-blue-50 hover:bg-blue-100 text-blue-600 px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center gap-2">
                <i class="fas fa-download"></i>
                <span>Exportar</span>
            </button>
            <button id="createBranchBtn" class="btn-primary text-white px-6 py-2 rounded-lg font-semibold flex items-center gap-2 hover:transform hover:scale-105 transition-all duration-200">
                <i class="fas fa-plus"></i>
                <span>Nueva Sucursal</span>
            </button>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="glass-card p-4 mb-6">
        <div class="flex flex-col lg:flex-row gap-4">
            <div class="flex-1">
                <div class="relative">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" id="searchBranches" placeholder="Buscar sucursales por nombre, dirección..." 
                           class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                </div>
            </div>
            <div class="flex gap-3">
                <select id="statusFilter" class="px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                    <option value="">Todos los estados</option>
                    <option value="active">Activas</option>
                    <option value="inactive">Inactivas</option>
                </select>
                <select id="cityFilter" class="px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                    <option value="">Todas las ciudades</option>
                </select>
                <button id="clearFilters" class="px-4 py-2 text-gray-600 hover:text-gray-800 transition-colors">
                    <i class="fas fa-times"></i>
                    <span class="ml-1">Limpiar</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Branches Grid -->
    <div id="branchesGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-6">
        <!-- Sample Branch Card for Layout -->
        <div class="glass-card rounded-2xl overflow-hidden group hover:transform hover:scale-105 transition-all duration-300">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="text-lg font-bold text-gray-800">Sucursal Principal</h4>
                    <span class="px-3 py-1 bg-green-100 text-green-800 text-xs rounded-full font-semibold">
                        Activa
                    </span>
                </div>
                
                <div class="space-y-3 mb-6">
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-map-marker-alt w-5 mr-3 text-blue-500"></i>
                        <span class="text-sm">Av. Principal 123, Bogotá</span>
                    </div>
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-phone w-5 mr-3 text-blue-500"></i>
                        <span class="text-sm">+57 300 123 4567</span>
                    </div>
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-user-tie w-5 mr-3 text-blue-500"></i>
                        <span class="text-sm">Juan Pérez</span>
                    </div>
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-users w-5 mr-3 text-blue-500"></i>
                        <span class="text-sm">24 empleados</span>
                    </div>
                </div>
                
                <div class="flex gap-2">
                    <button class="flex-1 bg-blue-50 hover:bg-blue-100 text-blue-600 py-2 px-3 rounded-lg font-semibold transition-colors duration-200 text-sm">
                        <i class="fas fa-eye mr-1"></i>Ver
                    </button>
                    <button class="flex-1 bg-yellow-50 hover:bg-yellow-100 text-yellow-600 py-2 px-3 rounded-lg font-semibold transition-colors duration-200 text-sm">
                        <i class="fas fa-edit mr-1"></i>Editar
                    </button>
                    <button class="flex-1 bg-red-50 hover:bg-red-100 text-red-600 py-2 px-3 rounded-lg font-semibold transition-colors duration-200 text-sm">
                        <i class="fas fa-trash mr-1"></i>Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Empty State -->
    <div id="emptyState" class="hidden glass-card p-12 text-center">
        <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
            <i class="fas fa-building text-4xl text-gray-400"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-800 mb-2">No hay sucursales</h3>
        <p class="text-gray-600 mb-6">Comienza creando tu primera sucursal para expandir tu negocio.</p>
        <button id="createFirstBranchBtn" class="btn-primary text-white px-6 py-3 rounded-lg font-semibold">
            <i class="fas fa-plus mr-2"></i>Crear Primera Sucursal
        </button>
    </div>

    <!-- Loading State -->
    <div id="loadingState" class="glass-card p-12 text-center">
        <div class="animate-spin w-12 h-12 border-4 border-blue-200 border-t-blue-600 rounded-full mx-auto mb-4"></div>
        <p class="text-gray-600">Cargando sucursales...</p>
    </div>

    <!-- Pagination -->
    <div id="paginationContainer" class="hidden glass-card p-4">
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-600">
                Mostrando <span id="showingFrom">0</span> a <span id="showingTo">0</span> de <span id="totalRecords">0</span> sucursales
            </div>
            <div class="flex gap-2" id="paginationButtons">
                <button class="px-3 py-2 text-sm text-gray-600 hover:text-gray-800 disabled:opacity-50 disabled:cursor-not-allowed">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="px-3 py-2 text-sm rounded-lg bg-blue-600 text-white">1</button>
                <button class="px-3 py-2 text-sm rounded-lg text-gray-600 hover:text-gray-800 hover:bg-gray-100">2</button>
                <button class="px-3 py-2 text-sm rounded-lg text-gray-600 hover:text-gray-800 hover:bg-gray-100">3</button>
                <button class="px-3 py-2 text-sm text-gray-600 hover:text-gray-800">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Create/Edit Branch Modal -->
<div id="branchModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" id="modalOverlay"></div>

        <!-- Modal panel -->
        <div class="inline-block w-full max-w-2xl my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
            <!-- Modal Header -->
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 rounded-t-2xl">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold text-gray-800" id="modalTitle">Nueva Sucursal</h3>
                    <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600 transition-colors p-2">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="px-6 py-6">
                <form id="branchForm" class="space-y-6">
                    <input type="hidden" id="branchId" name="id">
                    
                    <!-- Basic Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nombre de la Sucursal *</label>
                            <input type="text" id="branchName" name="name" required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                   placeholder="Ej: Sucursal Centro">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Código *</label>
                            <input type="text" id="branchCode" name="code" required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                   placeholder="Ej: SUC001">
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Teléfono</label>
                            <input type="tel" id="branchPhone" name="phone"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                   placeholder="+57 300 123 4567">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <input type="email" id="branchEmail" name="email"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                   placeholder="sucursal@empresa.com">
                        </div>
                    </div>

                    <!-- Address -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Dirección *</label>
                        <input type="text" id="branchAddress" name="address" required
                               class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                               placeholder="Av. Principal 123">
                    </div>

                    <!-- Location Details -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Ciudad *</label>
                            <input type="text" id="branchCity" name="city" required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                   placeholder="Bogotá">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Departamento</label>
                            <input type="text" id="branchState" name="state"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                   placeholder="Cundinamarca">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Código Postal</label>
                            <input type="text" id="branchZipCode" name="zip_code"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                   placeholder="110111">
                        </div>
                    </div>

                    <!-- Manager and Status -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Encargado</label>
                            <select id="branchManager" name="manager_id"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                <option value="">Seleccionar encargado</option>
                                <option value="1">Juan Pérez</option>
                                <option value="2">María García</option>
                                <option value="3">Carlos López</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Estado</label>
                            <select id="branchStatus" name="status"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                <option value="active">Activa</option>
                                <option value="inactive">Inactiva</option>
                            </select>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Descripción</label>
                        <textarea id="branchDescription" name="description" rows="3"
                                  class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none"
                                  placeholder="Descripción de la sucursal..."></textarea>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 rounded-b-2xl">
                <div class="flex justify-end gap-3">
                    <button id="cancelBtn" type="button" class="px-6 py-2 text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg font-medium transition-colors duration-200">
                        Cancelar
                    </button>
                    <button id="saveBranchBtn" type="submit" form="branchForm" class="btn-primary text-white px-6 py-2 rounded-lg font-semibold hover:transform hover:scale-105 transition-all duration-200">
                        <span id="saveButtonText">Crear Sucursal</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 text-center">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" id="deleteModalOverlay"></div>
        
        <div class="inline-block w-full max-w-md my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">Confirmar Eliminación</h3>
                    </div>
                </div>
                
                <p class="text-gray-600 mb-6">
                    ¿Estás seguro de que deseas eliminar la sucursal "<span id="branchToDelete" class="font-semibold"></span>"? 
                    Esta acción no se puede deshacer.
                </p>
                
                <div class="flex justify-end gap-3">
                    <button id="cancelDeleteBtn" class="px-6 py-2 text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg font-medium transition-colors duration-200">
                        Cancelar
                    </button>
                    <button id="confirmDeleteBtn" class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors duration-200">
                        Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Branch Details Modal -->
<div id="branchDetailsModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" id="detailsModalOverlay"></div>

        <div class="inline-block w-full max-w-4xl my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
            <!-- Details Header -->
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 rounded-t-2xl">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold text-gray-800">Detalles de Sucursal</h3>
                    <button id="closeDetailsBtn" class="text-gray-400 hover:text-gray-600 transition-colors p-2">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Details Body -->
            <div class="p-6" id="branchDetailsContent">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Basic Information -->
                    <div class="space-y-6">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Información Básica</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600 font-medium">Nombre:</span>
                                    <span class="text-gray-800 font-semibold">Sucursal Principal</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600 font-medium">Código:</span>
                                    <span class="text-gray-800">SUC001</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600 font-medium">Estado:</span>
                                    <span class="px-3 py-1 bg-green-100 text-green-800 text-xs rounded-full font-semibold">
                                        Activa
                                    </span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600 font-medium">Creado:</span>
                                    <span class="text-gray-800">15/01/2024</span>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Contacto</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600 font-medium">Teléfono:</span>
                                    <span class="text-gray-800">+57 300 123 4567</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600 font-medium">Email:</span>
                                    <span class="text-gray-800">principal@empresa.com</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Location & Management -->
                    <div class="space-y-6">
                        <!-- Location -->
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Ubicación</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600 font-medium">Dirección:</span>
                                    <span class="text-gray-800">Av. Principal 123</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600 font-medium">Ciudad:</span>
                                    <span class="text-gray-800">Bogotá</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600 font-medium">Departamento:</span>
                                    <span class="text-gray-800">Cundinamarca</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600 font-medium">Código Postal:</span>
                                    <span class="text-gray-800">110111</span>
                                </div>
                            </div>
                        </div>

                        <!-- Management -->
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Gestión</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600 font-medium">Encargado:</span>
                                    <span class="text-gray-800">Juan Pérez</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600 font-medium">Empleados:</span>
                                    <span class="text-gray-800">24</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mt-8">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Descripción</h4>
                    <p class="text-gray-600 leading-relaxed">
                        Sucursal principal de la empresa ubicada en el centro de la ciudad. Cuenta con todas las facilidades 
                        necesarias para brindar el mejor servicio a nuestros clientes.
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                    <button class="bg-yellow-50 hover:bg-yellow-100 text-yellow-600 px-6 py-2 rounded-lg font-semibold transition-colors duration-200">
                        <i class="fas fa-edit mr-2"></i>Editar
                    </button>
                    <button class="bg-red-50 hover:bg-red-100 text-red-600 px-6 py-2 rounded-lg font-semibold transition-colors duration-200">
                        <i class="fas fa-trash mr-2"></i>Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>