 <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 pb-12">
        
        <!-- Overview Tab -->
        <div id="content-overview" class="tab-content fade-in">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="custom-bg-white rounded-lg p-6 shadow-sm hover-scale">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm custom-text-secondary">Empresas Activas</p>
                            <p id="active-companies-count" class="text-3xl font-bold custom-text-primary">--</p>
                        </div>
                        <div class="custom-primary-bg p-3 rounded-lg">
                            <i data-lucide="building-2" class="w-6 h-6 text-white"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center">
                        <span class="custom-accent text-sm font-medium">+12%</span>
                        <span class="text-sm custom-text-secondary ml-1">vs mes anterior</span>
                    </div>
                </div>

                <div class="custom-bg-white rounded-lg p-6 shadow-sm hover-scale">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm custom-text-secondary">Usuarios Activos</p>
                            <p id="active-users-count" class="text-3xl font-bold custom-text-primary">--</p>
                        </div>
                        <div class="bg-green-500 p-3 rounded-lg">
                            <i data-lucide="users" class="w-6 h-6 text-white"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center">
                        <span class="custom-accent text-sm font-medium">+8%</span>
                        <span class="text-sm custom-text-secondary ml-1">vs mes anterior</span>
                    </div>
                </div>

                <div class="custom-bg-white rounded-lg p-6 shadow-sm hover-scale">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm custom-text-secondary">Mensajes Pendientes</p>
                            <p id="pending-messages-count" class="text-3xl font-bold custom-text-primary">--</p>
                        </div>
                        <div class="bg-amber-500 p-3 rounded-lg">
                            <i data-lucide="message-circle" class="w-6 h-6 text-white"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center">
                        <span class="text-red-500 text-sm font-medium">3 nuevos</span>
                        <span class="text-sm custom-text-secondary ml-1">hoy</span>
                    </div>
                </div>

                <div class="custom-bg-white rounded-lg p-6 shadow-sm hover-scale">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm custom-text-secondary">Ventas Totales</p>
                            <p id="total-sales" class="text-3xl font-bold custom-text-primary">--</p>
                        </div>
                        <div class="bg-emerald-500 p-3 rounded-lg">
                            <i data-lucide="trending-up" class="w-6 h-6 text-white"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center">
                        <span class="custom-accent text-sm font-medium">+15%</span>
                        <span class="text-sm custom-text-secondary ml-1">vs mes anterior</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="custom-bg-white rounded-lg p-6 shadow-sm mb-8">
                <h3 class="text-lg font-semibold custom-text-primary mb-4">Acciones Rápidas</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <button onclick="openCreateCompanyModal()" class="flex items-center space-x-3 p-4 border custom-border rounded-lg custom-hover-bg transition-colors">
                        <div class="custom-primary-bg p-2 rounded-lg">
                            <i data-lucide="plus" class="w-4 h-4 text-white"></i>
                        </div>
                        <span class="font-medium custom-text-primary">Crear Nueva Empresa</span>
                    </button>
                    
                    <button onclick="switchTab('users')" class="flex items-center space-x-3 p-4 border custom-border rounded-lg custom-hover-bg transition-colors">
                        <div class="bg-green-500 p-2 rounded-lg">
                            <i data-lucide="user-plus" class="w-4 h-4 text-white"></i>
                        </div>
                        <span class="font-medium custom-text-primary">Gestionar Usuarios</span>
                    </button>
                    
                    <button onclick="switchTab('messages')" class="flex items-center space-x-3 p-4 border custom-border rounded-lg custom-hover-bg transition-colors">
                        <div class="bg-amber-500 p-2 rounded-lg">
                            <i data-lucide="mail" class="w-4 h-4 text-white"></i>
                        </div>
                        <span class="font-medium custom-text-primary">Ver Mensajes</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Companies Tab -->
        <div id="content-companies" class="tab-content hidden">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold custom-text-primary">Gestión de Empresas</h2>
                <button onclick="openCreateCompanyModal()" class="custom-primary-bg text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                    <i data-lucide="plus" class="w-4 h-4 inline mr-2"></i>
                    Nueva Empresa
                </button>
            </div>

            <!-- Companies Table -->
            <div class="custom-bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="p-4 border-b custom-border">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <h3 class="text-lg font-medium custom-text-primary">Empresas Registradas</h3>
                        <div class="mt-3 sm:mt-0">
                            <input type="text" placeholder="Buscar empresa..." class="px-3 py-2 border custom-border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y custom-border">
                        <thead class="custom-bg-light">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium custom-text-secondary uppercase tracking-wider">Empresa</th>
                                <th class="px-6 py-3 text-left text-xs font-medium custom-text-secondary uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-3 text-left text-xs font-medium custom-text-secondary uppercase tracking-wider">Fecha Registro</th>
                                <th class="px-6 py-3 text-left text-xs font-medium custom-text-secondary uppercase tracking-wider">Usuarios</th>
                                <th class="px-6 py-3 text-left text-xs font-medium custom-text-secondary uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="companies-table-body" class="custom-bg-white divide-y custom-border">
                            <!-- Companies will be loaded here by Laravel -->
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="px-6 py-3 border-t custom-border">
                    <div class="flex items-center justify-between">
                        <p class="text-sm custom-text-secondary">
                            Mostrando <span class="font-medium">1</span> a <span class="font-medium">10</span> de <span class="font-medium">97</span> resultados
                        </p>
                        <div class="flex space-x-1">
                            <!-- Pagination buttons will be generated by Laravel -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users Tab -->
        <div id="content-users" class="tab-content hidden">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold custom-text-primary">Gestión de Usuarios</h2>
                <button class="custom-primary-bg text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                    <i data-lucide="download" class="w-4 h-4 inline mr-2"></i>
                    Exportar Datos
                </button>
            </div>

            <!-- Users Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="custom-bg-white p-4 rounded-lg shadow-sm">
                    <div class="flex items-center space-x-3">
                        <div class="bg-green-100 p-2 rounded-lg">
                            <i data-lucide="user-check" class="w-5 h-5 text-green-600"></i>
                        </div>
                        <div>
                            <p class="text-sm custom-text-secondary">Usuarios Activos</p>
                            <p id="active-users-detail" class="text-xl font-bold custom-text-primary">--</p>
                        </div>
                    </div>
                </div>
                
                <div class="custom-bg-white p-4 rounded-lg shadow-sm">
                    <div class="flex items-center space-x-3">
                        <div class="bg-yellow-100 p-2 rounded-lg">
                            <i data-lucide="user-x" class="w-5 h-5 text-yellow-600"></i>
                        </div>
                        <div>
                            <p class="text-sm custom-text-secondary">Usuarios Inactivos</p>
                            <p id="inactive-users-detail" class="text-xl font-bold custom-text-primary">--</p>
                        </div>
                    </div>
                </div>
                
                <div class="custom-bg-white p-4 rounded-lg shadow-sm">
                    <div class="flex items-center space-x-3">
                        <div class="bg-blue-100 p-2 rounded-lg">
                            <i data-lucide="user-plus" class="w-5 h-5 text-blue-600"></i>
                        </div>
                        <div>
                            <p class="text-sm custom-text-secondary">Nuevos (30 días)</p>
                            <p id="new-users-detail" class="text-xl font-bold custom-text-primary">--</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Users Table -->
            <div class="custom-bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="p-4 border-b custom-border">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <h3 class="text-lg font-medium custom-text-primary">Lista de Usuarios</h3>
                        <div class="mt-3 sm:mt-0 flex space-x-2">
                            <select class="px-3 py-2 border custom-border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Todos los estados</option>
                                <option>Activos</option>
                                <option>Inactivos</option>
                            </select>
                            <input type="text" placeholder="Buscar usuario..." class="px-3 py-2 border custom-border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y custom-border">
                        <thead class="custom-bg-light">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium custom-text-secondary uppercase tracking-wider">Usuario</th>
                                <th class="px-6 py-3 text-left text-xs font-medium custom-text-secondary uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium custom-text-secondary uppercase tracking-wider">Empresa</th>
                                <th class="px-6 py-3 text-left text-xs font-medium custom-text-secondary uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-3 text-left text-xs font-medium custom-text-secondary uppercase tracking-wider">Último Acceso</th>
                                <th class="px-6 py-3 text-left text-xs font-medium custom-text-secondary uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="users-table-body" class="custom-bg-white divide-y custom-border">
                            <!-- Users will be loaded here by Laravel -->
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="px-6 py-3 border-t custom-border">
                    <div class="flex items-center justify-between">
                        <p class="text-sm custom-text-secondary">
                            Mostrando resultados de usuarios
                        </p>
                        <div class="flex space-x-1">
                            <!-- Pagination buttons will be generated by Laravel -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Messages Tab -->
        <div id="content-messages" class="tab-content hidden">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold custom-text-primary">Mensajes y Sugerencias</h2>
                <div class="flex space-x-2">
                    <button class="px-4 py-2 border custom-border rounded-lg custom-hover-bg transition-colors">
                        <i data-lucide="filter" class="w-4 h-4 inline mr-2"></i>
                        Filtros
                    </button>
                    <button class="px-4 py-2 border custom-border rounded-lg custom-hover-bg transition-colors">
                        <i data-lucide="archive" class="w-4 h-4 inline mr-2"></i>
                        Archivar Leídos
                    </button>
                </div>
            </div>

            <!-- Messages Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="custom-bg-white p-4 rounded-lg shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm custom-text-secondary">No Leídos</p>
                            <p id="unread-messages" class="text-2xl font-bold text-red-600">--</p>
                        </div>
                        <i data-lucide="mail" class="w-8 h-8 text-red-500"></i>
                    </div>
                </div>
                
                <div class="custom-bg-white p-4 rounded-lg shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm custom-text-secondary">En Proceso</p>
                            <p id="processing-messages" class="text-2xl font-bold custom-secondary">--</p>
                        </div>
                        <i data-lucide="clock" class="w-8 h-8 text-yellow-500"></i>
                    </div>
                </div>
                
                <div class="custom-bg-white p-4 rounded-lg shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm custom-text-secondary">Resueltos</p>
                            <p id="resolved-messages" class="text-2xl font-bold custom-accent">--</p>
                        </div>
                        <i data-lucide="check-circle" class="w-8 h-8 text-green-500"></i>
                    </div>
                </div>
                
                <div class="custom-bg-white p-4 rounded-lg shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm custom-text-secondary">Total Hoy</p>
                            <p id="today-messages" class="text-2xl font-bold custom-text-primary">--</p>
                        </div>
                        <i data-lucide="message-square" class="w-8 h-8 custom-primary"></i>
                    </div>
                </div>
            </div>

            <!-- Messages List -->
            <div class="custom-bg-white rounded-lg shadow-sm">
                <div class="p-4 border-b custom-border">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <h3 class="text-lg font-medium custom-text-primary">Mensajes Recibidos</h3>
                        <div class="mt-3 sm:mt-0 flex space-x-2">
                            <select class="px-3 py-2 border custom-border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Todos</option>
                                <option>No leídos</option>
                                <option>En proceso</option>
                                <option>Resueltos</option>
                            </select>
                            <select class="px-3 py-2 border custom-border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Sugerencias</option>
                                <option>Reportes</option>
                                <option>Consultas</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div id="messages-list">
                    <!-- Messages will be loaded here by Laravel -->
                    <div class="p-4 text-center custom-text-secondary">
                        <i data-lucide="inbox" class="w-12 h-12 mx-auto mb-2 opacity-50"></i>
                        <p>Los mensajes se cargarán aquí</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
