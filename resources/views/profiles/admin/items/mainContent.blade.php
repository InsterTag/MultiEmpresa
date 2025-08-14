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
                <th class="px-6 py-3 text-left text-xs font-medium custom-text-secondary uppercase tracking-wider">Nombre</th>
                <th class="px-6 py-3 text-left text-xs font-medium custom-text-secondary uppercase tracking-wider">NIT</th>
                <th class="px-6 py-3 text-left text-xs font-medium custom-text-secondary uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium custom-text-secondary uppercase tracking-wider">Teléfono</th>
                <th class="px-6 py-3 text-left text-xs font-medium custom-text-secondary uppercase tracking-wider">Registro</th>
                <th class="px-6 py-3 text-right text-xs font-medium custom-text-secondary uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody class="custom-bg-white divide-y custom-border">
            @forelse($companies as $company)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $company->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $company->nit }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="mailto:{{ $company->email }}" class="text-blue-600 hover:underline">
                            {{ $company->email }}
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($company->phone)
                            <a href="tel:{{ $company->phone }}" class="hover:underline">
                                {{ $company->phone }}
                            </a>
                        @else
                            <span class="text-gray-400">No registrado</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $company->created_at->format('d/m/Y H:i') }}
                        <br>
                        <span class="text-xs text-gray-500">
                            ({{ $company->created_at->diffForHumans() }})
                        </span>
                    </td>
                    <!-- Nueva celda de acciones -->
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <!-- Botón Ver Más -->
                    <a href="" 
                        class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm hover:bg-blue-200 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        Ver más
                    </a>
            
                    <!-- Botón Configuración (Tuerca) -->
                        <div class="inline-block relative">
                            <button class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>

                            <!-- Menú desplegable (opcional) -->
                            <div class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                                <div class="py-1">
                                    <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Editar</a>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100" onclick="return confirm('¿Eliminar esta empresa?')">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                        No hay empresas registradas
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $companies->links() }}
    </div>
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
