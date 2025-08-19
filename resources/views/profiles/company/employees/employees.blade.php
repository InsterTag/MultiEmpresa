@extends('layouts.company')

@section('content')
<div class="flex-1 lg:ml-0 p-10">
    <!-- Contenedor principal blanco -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
        <!-- Header con navegación -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Gestión de Empleados</h1>
                <p class="text-gray-600">Administra tu equipo de trabajo</p>
            </div>
            <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">
                <button onclick="showSection('list')" id="btn-list" class="nav-btn active px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-700 font-medium transition-all duration-300 hover:bg-gray-50">
                    <i data-lucide="users" class="w-4 h-4 mr-2 inline"></i>
                    Lista de Empleados
                </button>
                <button onclick="showSection('create')" id="btn-create" class="nav-btn px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-600 font-medium transition-all duration-300 hover:text-gray-700 hover:bg-gray-50">
                    <i data-lucide="user-plus" class="w-4 h-4 mr-2 inline"></i>
                    Nuevo Empleado
                </button>
                <button onclick="showSection('stats')" id="btn-stats" class="nav-btn px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-600 font-medium transition-all duration-300 hover:text-gray-700 hover:bg-gray-50">
                    <i data-lucide="bar-chart-3" class="w-4 h-4 mr-2 inline"></i>
                    Estadísticas
                </button>
            </div>
        </div>
    </div>

    <!-- Contenedor de secciones con fondo blanco -->
    <div class="p-6">
        <!-- Sección: Lista de Empleados -->
    <div id="section-list" class="section active">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="glass-effect backdrop-blur-sm rounded-xl p-6 animate-fade-in animate-delay-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Total Empleados</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">1</p>
                    </div>
                    <div class="bg-blue-500/20 p-3 rounded-lg">
                        <i data-lucide="users" class="w-6 h-6 text-blue-600"></i>
                    </div>
                </div>
                <div class="flex items-center mt-4 text-sm">
                    <span class="text-green-600">+1</span>
                    <span class="text-gray-500 ml-1">este mes</span>
                </div>
            </div>

            <div class="glass-effect backdrop-blur-sm rounded-xl p-6 animate-fade-in animate-delay-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Activos</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">1</p>
                    </div>
                    <div class="bg-green-500/20 p-3 rounded-lg">
                        <i data-lucide="user-check" class="w-6 h-6 text-green-600"></i>
                    </div>
                </div>
                <div class="flex items-center mt-4 text-sm">
                    <span class="text-green-600">100%</span>
                    <span class="text-gray-500 ml-1">del total</span>
                </div>
            </div>

            <div class="glass-effect backdrop-blur-sm rounded-xl p-6 animate-fade-in animate-delay-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Departamentos</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">1</p>
                    </div>
                    <div class="bg-purple-500/20 p-3 rounded-lg">
                        <i data-lucide="building" class="w-6 h-6 text-purple-600"></i>
                    </div>
                </div>
                <div class="flex items-center mt-4 text-sm">
                    <span class="text-gray-500">Promedio</span>
                    <span class="text-gray-800 ml-1">1 emp/dept</span>
                </div>
            </div>

            <div class="glass-effect backdrop-blur-sm rounded-xl p-6 animate-fade-in animate-delay-400">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Nómina Mensual</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">$3,500</p>
                    </div>
                    <div class="bg-yellow-500/20 p-3 rounded-lg">
                        <i data-lucide="dollar-sign" class="w-6 h-6 text-yellow-600"></i>
                    </div>
                </div>
                <div class="flex items-center mt-4 text-sm">
                    <span class="text-red-600">+0%</span>
                    <span class="text-gray-500 ml-1">vs anterior</span>
                </div>
            </div>
        </div>

        <!-- Filtros y búsqueda -->
        <div class="glass-effect backdrop-blur-sm rounded-xl p-6 mb-6 animate-fade-in animate-delay-500">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2">Buscar empleado</label>
                    <div class="relative">
                        <i data-lucide="search" class="absolute left-3 top-3 w-4 h-4 text-gray-400"></i>
                        <input type="text" placeholder="Nombre, email o ID..." class="w-full bg-white border border-gray-300 rounded-lg px-10 py-2.5 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent">
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2">Departamento</label>
                    <select class="w-full bg-white border border-gray-300 rounded-lg px-3 py-2.5 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500/50">
                        <option value="">Todos</option>
                        <option value="ventas">Ventas</option>
                        <option value="marketing">Marketing</option>
                        <option value="desarrollo">Desarrollo</option>
                        <option value="rrhh">RRHH</option>
                        <option value="finanzas">Finanzas</option>
                        <option value="operaciones">Operaciones</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2">Estado</label>
                    <select class="w-full bg-white border border-gray-300 rounded-lg px-3 py-2.5 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500/50">
                        <option value="">Todos</option>
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                        <option value="vacaciones">En vacaciones</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button class="w-full custom-primary-bg hover:custom-primary-dark-bg text-white font-medium py-2.5 px-4 rounded-lg transition-colors duration-300">
                        <i data-lucide="filter" class="w-4 h-4 mr-2 inline"></i>
                        Filtrar
                    </button>
                </div>
            </div>
        </div>

        <!-- Tabla de empleados -->
        <div class="glass-effect backdrop-blur-sm rounded-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-4 px-6 text-gray-700 font-medium">Empleado</th>
                            <th class="text-left py-4 px-6 text-gray-700 font-medium hidden md:table-cell">ID</th>
                            <th class="text-left py-4 px-6 text-gray-700 font-medium hidden lg:table-cell">Departamento</th>
                            <th class="text-left py-4 px-6 text-gray-700 font-medium hidden sm:table-cell">Cargo</th>
                            <th class="text-left py-4 px-6 text-gray-700 font-medium">Estado</th>
                            <th class="text-left py-4 px-6 text-gray-700 font-medium hidden md:table-cell">Salario</th>
                            <th class="text-left py-4 px-6 text-gray-700 font-medium">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 custom-primary-bg rounded-full flex items-center justify-center text-white font-medium">
                                        JP
                                    </div>
                                    <div>
                                        <p class="text-gray-800 font-medium">Juan Pérez</p>
                                        <p class="text-gray-600 text-sm hidden sm:block">juan.perez@empresa.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-gray-700 hidden md:table-cell">EMP-001</td>
                            <td class="py-4 px-6 text-gray-700 hidden lg:table-cell">Ventas</td>
                            <td class="py-4 px-6 text-gray-700 hidden sm:table-cell">Gerente de Ventas</td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/20 text-green-700">
                                    Activo
                                </span>
                            </td>
                            <td class="py-4 px-6 text-gray-700 hidden md:table-cell">$3,500</td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-2">
                                    <button class="p-2 text-blue-600 hover:bg-blue-500/20 rounded-lg transition-colors">
                                        <i data-lucide="edit" class="w-4 h-4"></i>
                                    </button>
                                    <button class="p-2 text-red-600 hover:bg-red-500/20 rounded-lg transition-colors">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="bg-gray-50 px-6 py-4 flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0">
                <p class="text-gray-600 text-sm">Mostrando 1 de 1 empleados</p>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 text-gray-600 hover:text-gray-800 transition-colors">Anterior</button>
                    <button class="px-3 py-1 custom-primary-bg text-white rounded">1</button>
                    <button class="px-3 py-1 text-gray-600 hover:text-gray-800 transition-colors">Siguiente</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección: Crear Empleado -->
    <div id="section-create" class="section hidden">
        <div class="custom-bg-white rounded-xl p-6 border custom-border">
            <h2 class="text-xl font-bold custom-text-primary mb-6">Crear Nuevo Empleado</h2>
            
            <form class="space-y-6">
                <!-- Información Personal -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label class="block custom-text-secondary text-sm font-medium mb-2">Nombre Completo *</label>
                        <input type="text" required class="w-full custom-bg-white border custom-border rounded-lg px-4 py-3 custom-text-primary placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent" placeholder="Juan Pérez González">
                    </div>
                    <div>
                        <label class="block custom-text-secondary text-sm font-medium mb-2">Email *</label>
                        <input type="email" required class="w-full custom-bg-white border custom-border rounded-lg px-4 py-3 custom-text-primary placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent" placeholder="juan.perez@empresa.com">
                    </div>
                    <div>
                        <label class="block custom-text-secondary text-sm font-medium mb-2">Teléfono</label>
                        <input type="tel" class="w-full custom-bg-white border custom-border rounded-lg px-4 py-3 custom-text-primary placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent" placeholder="+57 300 123 4567">
                    </div>
                    <div>
                        <label class="block custom-text-secondary text-sm font-medium mb-2">Fecha de Nacimiento</label>
                        <input type="date" class="w-full custom-bg-white border custom-border rounded-lg px-4 py-3 custom-text-primary focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block custom-text-secondary text-sm font-medium mb-2">Documento de Identidad *</label>
                        <input type="text" required class="w-full custom-bg-white border custom-border rounded-lg px-4 py-3 custom-text-primary placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent" placeholder="12345678">
                    </div>
                    <div>
                        <label class="block custom-text-secondary text-sm font-medium mb-2">Tipo de Documento</label>
                        <select class="w-full custom-bg-white border custom-border rounded-lg px-4 py-3 custom-text-primary focus:outline-none focus:ring-2 focus:ring-blue-500/50">
                            <option value="cedula">Cédula de Ciudadanía</option>
                            <option value="extranjeria">Cédula de Extranjería</option>
                            <option value="pasaporte">Pasaporte</option>
                        </select>
                    </div>
                </div>

                <!-- Información Laboral -->
                <div class="border-t custom-border pt-6">
                    <h3 class="text-lg font-semibold custom-text-primary mb-4">Información Laboral</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <label class="block custom-text-secondary text-sm font-medium mb-2">Departamento *</label>
                            <select required class="w-full custom-bg-white border custom-border rounded-lg px-4 py-3 custom-text-primary focus:outline-none focus:ring-2 focus:ring-blue-500/50">
                                <option value="">Selecciona un departamento</option>
                                <option value="ventas">Ventas</option>
                                <option value="marketing">Marketing</option>
                                <option value="desarrollo">Desarrollo</option>
                                <option value="rrhh">RRHH</option>
                                <option value="finanzas">Finanzas</option>
                                <option value="operaciones">Operaciones</option>
                            </select>
                        </div>
                        <div>
                            <label class="block custom-text-secondary text-sm font-medium mb-2">Cargo *</label>
                            <input type="text" required class="w-full custom-bg-white border custom-border rounded-lg px-4 py-3 custom-text-primary placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent" placeholder="Desarrollador Senior">
                        </div>
                        <div>
                            <label class="block custom-text-secondary text-sm font-medium mb-2">Fecha de Ingreso *</label>
                            <input type="date" required class="w-full custom-bg-white border custom-border rounded-lg px-4 py-3 custom-text-primary focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block custom-text-secondary text-sm font-medium mb-2">Tipo de Contrato</label>
                            <select class="w-full custom-bg-white border custom-border rounded-lg px-4 py-3 custom-text-primary focus:outline-none focus:ring-2 focus:ring-blue-500/50">
                                <option value="indefinido">Indefinido</option>
                                <option value="fijo">Término Fijo</option>
                                <option value="obra">Obra o Labor</option>
                                <option value="practicante">Practicante</option>
                            </select>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:col-span-2">
                            <div>
                                <label class="block custom-text-secondary text-sm font-medium mb-2">Salario Base *</label>
                                <input type="number" required class="w-full custom-bg-white border custom-border rounded-lg px-4 py-3 custom-text-primary placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent" placeholder="2800000">
                            </div>
                            <div>
                                <label class="block custom-text-secondary text-sm font-medium mb-2">Auxilio de Transporte</label>
                                <input type="number" class="w-full custom-bg-white border custom-border rounded-lg px-4 py-3 custom-text-primary placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent" placeholder="140606">
                            </div>
                            <div>
                                <label class="block custom-text-secondary text-sm font-medium mb-2">Otros Beneficios</label>
                                <input type="number" class="w-full custom-bg-white border custom-border rounded-lg px-4 py-3 custom-text-primary placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent" placeholder="0">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Información Adicional -->
                <div class="border-t custom-border pt-6">
                    <h3 class="text-lg font-semibold custom-text-primary mb-4">Información Adicional</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <label class="block custom-text-secondary text-sm font-medium mb-2">Dirección</label>
                            <textarea class="w-full custom-bg-white border custom-border rounded-lg px-4 py-3 custom-text-primary placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent h-24 resize-none" placeholder="Calle 123 #45-67, Barrio Centro"></textarea>
                        </div>
                        <div>
                            <label class="block custom-text-secondary text-sm font-medium mb-2">Contacto de Emergencia</label>
                            <input type="text" class="w-full custom-bg-white border custom-border rounded-lg px-4 py-3 custom-text-primary placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent mb-3" placeholder="Nombre del contacto">
                            <input type="tel" class="w-full custom-bg-white border custom-border rounded-lg px-4 py-3 custom-text-primary placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent" placeholder="Teléfono de emergencia">
                        </div>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t custom-border">
                    <button type="submit" class="flex-1 custom-primary-bg hover:custom-primary-dark-bg text-white font-medium py-3 px-6 rounded-lg transition-all duration-300">
                        <i data-lucide="save" class="w-5 h-5 mr-2 inline"></i>
                        Guardar Empleado
                    </button>
                    <button type="button" onclick="showSection('list')" class="flex-1 custom-bg-white hover:custom-hover-bg custom-text-secondary font-medium py-3 px-6 rounded-lg transition-all duration-300 border custom-border">
                        <i data-lucide="x" class="w-5 h-5 mr-2 inline"></i>
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Sección: Estadísticas -->
    <div id="section-stats" class="section hidden">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Gráfico de Empleados por Departamento -->
            <div class="custom-bg-white rounded-xl p-6 border custom-border">
                <h3 class="text-lg font-semibold custom-text-primary mb-4">Empleados por Departamento</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="custom-text-secondary">Ventas</span>
                        <div class="flex items-center space-x-3">
                            <div class="w-32 bg-gray-200 rounded-full h-2">
                                <div class="custom-primary-bg h-2 rounded-full" style="width: 100%"></div>
                            </div>
                            <span class="custom-text-primary font-medium">1</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="custom-text-secondary">Marketing</span>
                        <div class="flex items-center space-x-3">
                            <div class="w-32 bg-gray-200 rounded-full h-2">
                                <div class="bg-purple-500 h-2 rounded-full" style="width: 0%"></div>
                            </div>
                            <span class="custom-text-primary font-medium">0</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="custom-text-secondary">Desarrollo</span>
                        <div class="flex items-center space-x-3">
                            <div class="w-32 bg-gray-200 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 0%"></div>
                            </div>
                            <span class="custom-text-primary font-medium">0</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="custom-text-secondary">RRHH</span>
                        <div class="flex items-center space-x-3">
                            <div class="w-32 bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-500 h-2 rounded-full" style="width: 0%"></div>
                            </div>
                            <span class="custom-text-primary font-medium">0</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="custom-text-secondary">Finanzas</span>
                        <div class="flex items-center space-x-3">
                            <div class="w-32 bg-gray-200 rounded-full h-2">
                                <div class="bg-red-500 h-2 rounded-full" style="width: 0%"></div>
                            </div>
                            <span class="custom-text-primary font-medium">0</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Métricas de Rendimiento -->
            <div class="custom-bg-white rounded-xl p-6 border custom-border">
                <h3 class="text-lg font-semibold custom-text-primary mb-4">Métricas de RRHH</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="custom-bg-light rounded-lg p-4">
                        <div class="flex items-center justify-center w-12 h-12 bg-green-500/20 rounded-lg mb-3 mx-auto">
                            <i data-lucide="trending-up" class="w-6 h-6 text-green-600"></i>
                        </div>
                        <p class="text-2xl font-bold custom-text-primary text-center">100%</p>
                        <p class="custom-text-secondary text-sm text-center">Retención</p>
                    </div>
                    <div class="custom-bg-light rounded-lg p-4">
                        <div class="flex items-center justify-center w-12 h-12 bg-blue-500/20 rounded-lg mb-3 mx-auto">
                            <i data-lucide="clock" class="w-6 h-6 text-blue-600"></i>
                        </div>
                        <p class="text-2xl font-bold custom-text-primary text-center">0</p>
                        <p class="custom-text-secondary text-sm text-center">Años promedio</p>
                    </div>
                    <div class="custom-bg-light rounded-lg p-4">
                        <div class="flex items-center justify-center w-12 h-12 bg-purple-500/20 rounded-lg mb-3 mx-auto">
                            <i data-lucide="star" class="w-6 h-6 text-purple-600"></i>
                        </div>
                        <p class="text-2xl font-bold custom-text-primary text-center">5.0</p>
                        <p class="custom-text-secondary text-sm text-center">Satisfacción</p>
                    </div>
                    <div class="custom-bg-light rounded-lg p-4">
                        <div class="flex items-center justify-center w-12 h-12 bg-yellow-500/20 rounded-lg mb-3 mx-auto">
                            <i data-lucide="graduation-cap" class="w-6 h-6 text-yellow-600"></i>
                        </div>
                        <p class="text-2xl font-bold custom-text-primary text-center">0</p>
                        <p class="custom-text-secondary text-sm text-center">Capacitaciones</p>
                    </div>
                </div>
            </div>

            <!-- Próximos Cumpleaños -->
            <div class="custom-bg-white rounded-xl p-6 border custom-border">
                <h3 class="text-lg font-semibold custom-text-primary mb-4">Próximos Cumpleaños</h3>
                <div class="flex items-center justify-center h-32">
                    <div class="text-center custom-text-secondary">
                        <i data-lucide="calendar" class="w-12 h-12 mx-auto mb-2 opacity-50"></i>
                        <p class="text-sm">No hay cumpleaños próximos</p>
                    </div>
                </div>
            </div>

            <!-- Empleados Recientes -->
            <div class="custom-bg-white rounded-xl p-6 border custom-border">
                <h3 class="text-lg font-semibold custom-text-primary mb-4">Últimas Contrataciones</h3>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3 p-3 custom-bg-light rounded-lg">
                        <div class="w-10 h-10 custom-primary-bg rounded-full flex items-center justify-center text-white font-medium">
                            JP
                        </div>
                        <div class="flex-1">
                            <p class="custom-text-primary font-medium">Juan Pérez</p>
                            <p class="custom-text-secondary text-sm">Gerente de Ventas • Hoy</p>
                        </div>
                        <span class="text-xs bg-green-500/20 text-green-700 px-2 py-1 rounded-full">Nuevo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.animate-fade-in {
    animation: fadeIn 0.5s ease-out forwards;
    opacity: 0;
}

@keyframes fadeIn {
    from { 
        opacity: 0; 
        transform: translateY(20px); 
    }
    to { 
        opacity: 1; 
        transform: translateY(0); 
    }
}

.animate-delay-100 { animation-delay: 0.1s; }
.animate-delay-200 { animation-delay: 0.2s; }
.animate-delay-300 { animation-delay: 0.3s; }
.animate-delay-400 { animation-delay: 0.4s; }
.animate-delay-500 { animation-delay: 0.5s; }

.nav-btn {
    position: relative;
    overflow: hidden;
}

.nav-btn.active {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
}

.nav-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.nav-btn:hover::before {
    left: 100%;
}

.section {
    display: none;
    animation: fadeIn 0.3s ease-out;
}

.section.active {
    display: block;
}

/* Glass effect mejorado */
.glass-effect {
    background: rgba(255, 255, 255, 0.95);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
}

/* Scrollbar personalizado */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: var(--background-light);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: var(--border-color);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: var(--text-secondary);
}
</style>

<script>
// Inicializar Lucide icons
document.addEventListener('DOMContentLoaded', function() {
    lucide.createIcons();
});

// Navegación entre secciones
function showSection(sectionName) {
    // Ocultar todas las secciones
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => {
        section.classList.remove('active');
        section.classList.add('hidden');
    });
    
    // Mostrar la sección seleccionada
    const targetSection = document.getElementById(`section-${sectionName}`);
    if (targetSection) {
        targetSection.classList.remove('hidden');
        targetSection.classList.add('active');
    }
    
    // Actualizar botones de navegación
    const navButtons = document.querySelectorAll('.nav-btn');
    navButtons.forEach(btn => btn.classList.remove('active'));
    
    const activeButton = document.getElementById(`btn-${sectionName}`);
    if (activeButton) {
        activeButton.classList.add('active');
    }
    
    // Actualizar iconos de Lucide después de cambiar sección
    setTimeout(() => {
        lucide.createIcons();
    }, 100);
}
</script>
@endsection