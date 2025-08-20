@extends('layouts.company')

@section('content')
<div class="flex-1 lg:ml-0 p-10">
    <!-- Header -->
    <div class="custom-bg-white rounded-2xl p-8 mb-8 shadow-sm custom-border border animate-container" style="animation-delay: 0.1s;">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold custom-text-primary">Gestión de Sucursales</h1>
                <p class="custom-text-secondary mt-2">Administra las sucursales de tu empresa</p>
            </div>
            <div class="flex gap-3">
                <button id="btn-lista" class="section-btn active px-6 py-3 custom-primary-bg text-white rounded-lg hover:custom-primary-dark-bg transition-colors font-medium">
                    Lista de Sucursales
                </button>
                <button id="btn-nueva" class="section-btn px-6 py-3 bg-gray-100 custom-text-primary rounded-lg hover:bg-gray-200 transition-colors font-medium">
                    Nueva Sucursal
                </button>
                <button id="btn-estadisticas" class="section-btn px-6 py-3 bg-gray-100 custom-text-primary rounded-lg hover:bg-gray-200 transition-colors font-medium">
                    Estadísticas
                </button>
            </div>
        </div>
    </div>

    <!-- Sección Lista de Sucursales -->
    <div id="seccion-lista" class="section-content">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Sucursales -->
            <div class="custom-bg-white rounded-2xl p-6 shadow-sm custom-border border animate-container" style="animation-delay: 0.2s;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="custom-text-secondary text-sm font-medium">Total Sucursales</p>
                        <p class="text-3xl font-bold custom-text-primary mt-2">1</p>
                        <p class="custom-accent text-sm mt-2">+1 este mes</p>
                    </div>
                    <div class="w-12 h-12 custom-primary-bg rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Activas -->
            <div class="custom-bg-white rounded-2xl p-6 shadow-sm custom-border border animate-container" style="animation-delay: 0.3s;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="custom-text-secondary text-sm font-medium">Activas</p>
                        <p class="text-3xl font-bold custom-text-primary mt-2">1</p>
                        <p class="custom-accent text-sm mt-2">100% del total</p>
                    </div>
                    <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Ciudades -->
            <div class="custom-bg-white rounded-2xl p-6 shadow-sm custom-border border animate-container" style="animation-delay: 0.4s;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="custom-text-secondary text-sm font-medium">Ciudades</p>
                        <p class="text-3xl font-bold custom-text-primary mt-2">1</p>
                        <p class="custom-text-secondary text-sm mt-2">Cobertura nacional</p>
                    </div>
                    <div class="w-12 h-12 custom-secondary bg-yellow-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 custom-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Empleados Total -->
            <div class="custom-bg-white rounded-2xl p-6 shadow-sm custom-border border animate-container" style="animation-delay: 0.5s;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="custom-text-secondary text-sm font-medium">Empleados Total</p>
                        <p class="text-3xl font-bold custom-text-primary mt-2">12</p>
                        <p class="custom-accent text-sm mt-2">Promedio 12 emp/sucursal</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="custom-bg-white rounded-2xl p-6 shadow-sm custom-border border mb-8 animate-container" style="animation-delay: 0.6s;">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="md:col-span-1">
                    <label class="block text-sm font-medium custom-text-secondary mb-2">Buscar sucursal</label>
                    <input type="text" placeholder="Nombre, código o dirección..." 
                           class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium custom-text-secondary mb-2">Ciudad</label>
                    <select class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        <option>Todas</option>
                        <option>Bogotá</option>
                        <option>Medellín</option>
                        <option>Cali</option>
                        <option>Barranquilla</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium custom-text-secondary mb-2">Estado</label>
                    <select class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        <option>Todas</option>
                        <option>Activa</option>
                        <option>Inactiva</option>
                        <option>En mantenimiento</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button class="w-full custom-primary-bg text-white px-6 py-3 rounded-lg hover:custom-primary-dark-bg transition-colors font-medium">
                        Filtrar
                    </button>
                </div>
            </div>
        </div>

        <!-- Tabla de Sucursales -->
<div class="custom-bg-white rounded-2xl shadow-sm custom-border border overflow-hidden animate-container" style="animation-delay: 0.7s;">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="custom-bg-light">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold custom-text-primary">Sucursal</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold custom-text-primary">Dirección</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold custom-text-primary">Email</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold custom-text-primary">Teléfono</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold custom-text-primary">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y custom-border">
                @forelse($branches as $branch)
                <tr class="hover:custom-hover-bg transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                <span class="text-sm font-bold custom-primary">{{ strtoupper(substr($branch->name, 0, 2)) }}</span>
                            </div>
                            <div>
                                <div class="font-medium custom-text-primary">{{ $branch->name }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm custom-text-primary">{{ $branch->address }}</td>
                    <td class="px-6 py-4 text-sm custom-text-primary">{{ $branch->email }}</td>
                    <td class="px-6 py-4 text-sm custom-text-primary">{{ $branch->phone }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <!-- Editar (puedes vincularlo al formulario de edición) -->
                            <a href="" class="text-gray-600 hover:text-gray-800 transition-colors" title="Editar">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>

                            <!-- Eliminar -->
                            <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" class="delete-branch-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 transition-colors" title="Eliminar">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                        No hay sucursales registradas.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="px-6 py-4 custom-bg-light flex items-center justify-between">
        <div class="text-sm custom-text-secondary">
            Mostrando {{ $branches->firstItem() ?? 0 }} a {{ $branches->lastItem() ?? 0 }} de {{ $branches->total() ?? 0 }} sucursales
        </div>
        <div class="flex items-center space-x-2">
            {{ $branches->links() }}
        </div>
    </div>
</div>


        </div>
    </div>

    <!-- Sección Nueva Sucursal -->
<div id="seccion-nueva" class="section-content hidden">
    <div class="custom-bg-white rounded-2xl p-8 shadow-sm custom-border border animate-container">
        <div class="text-center py-8">
            <div class="w-20 h-20 mx-auto bg-green-100 rounded-full flex items-center justify-center mb-4">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </div>
            <h2 class="text-2xl md:text-3xl font-bold custom-text-primary mb-2">Nueva Sucursal</h2>
            <p class="custom-text-secondary text-sm md:text-lg mb-6">Crea una nueva sucursal para tu empresa</p>

            <!-- Formulario para crear sucursal -->
            <form action="{{ route('branches.store') }}" method="POST" class="max-w-2xl mx-auto space-y-6">
                @csrf

                <!-- company_id oculto -->
                <input type="hidden" name="company_id" value="{{ Auth::user()->company->id ?? '' }}">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium custom-text-secondary mb-1">Nombre de la Sucursal *</label>
                        <input type="text" name="name" placeholder="Ej: Sucursal Norte" required
                               class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium custom-text-secondary mb-1">Dirección *</label>
                        <input type="text" name="address" placeholder="Dirección completa" required
                               class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium custom-text-secondary mb-1">Email *</label>
                        <input type="email" name="email" placeholder="correo@sucursal.com" required
                               class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium custom-text-secondary mb-1">Teléfono *</label>
                        <input type="text" name="phone" placeholder="Ej: 3233509658" required
                               class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                    </div>
                </div>

                <div class="mt-4 text-center">
                    <button type="submit"
                            class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 transition-colors font-medium">
                        Crear Sucursal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



    <!-- Sección Estadísticas -->
    <div id="seccion-estadisticas" class="section-content hidden">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Gráfico de Rendimiento -->
            <div class="custom-bg-white rounded-2xl p-6 shadow-sm custom-border border animate-container">
                <h3 class="text-xl font-bold custom-text-primary mb-4">Rendimiento por Sucursal</h3>
                <div class="h-64 flex items-center justify-center custom-bg-light rounded-lg">
                    <div class="text-center">
                        <svg class="w-16 h-16 mx-auto custom-text-secondary mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <p class="custom-text-secondary">Gráfico de barras aquí</p>
                    </div>
                </div>
            </div>

            <!-- Distribución Geográfica -->
            <div class="custom-bg-white rounded-2xl p-6 shadow-sm custom-border border animate-container">
                <h3 class="text-xl font-bold custom-text-primary mb-4">Distribución Geográfica</h3>
                <div class="h-64 flex items-center justify-center custom-bg-light rounded-lg">
                    <div class="text-center">
                        <svg class="w-16 h-16 mx-auto custom-text-secondary mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <p class="custom-text-secondary">Mapa de ubicaciones aquí</p>
                    </div>
                </div>
            </div>

            <!-- Métricas Generales -->
            <div class="lg:col-span-2 custom-bg-white rounded-2xl p-6 shadow-sm custom-border border animate-container">
                <h3 class="text-xl font-bold custom-text-primary mb-6">Métricas Generales</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="text-center p-4 custom-bg-light rounded-xl">
                        <div class="text-3xl font-bold custom-primary mb-2">98%</div>
                        <div class="text-sm custom-text-secondary">Tiempo Operativo</div>
                    </div>
                    <div class="text-center p-4 custom-bg-light rounded-xl">
                        <div class="text-3xl font-bold text-green-600 mb-2">+15%</div>
                        <div class="text-sm custom-text-secondary">Crecimiento Mensual</div>
                    </div>
                    <div class="text-center p-4 custom-bg-light rounded-xl">
                        <div class="text-3xl font-bold text-amber-600 mb-2">4.8/5</div>
                        <div class="text-sm custom-text-secondary">Satisfacción Cliente</div>
                    </div>
                    <div class="text-center p-4 custom-bg-light rounded-xl">
                        <div class="text-3xl font-bold text-purple-600 mb-2">$2.5M</div>
                        <div class="text-sm custom-text-secondary">Ingresos Totales</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .animate-container {
        opacity: 0;
        transform: translateY(20px);
        animation: slideInUp 0.6s ease-out forwards;
    }

    @keyframes slideInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .section-content {
        transition: all 0.3s ease-in-out;
    }

    .section-content.fade-in {
        animation: fadeIn 0.4s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sistema de navegación entre secciones
    const sectionButtons = document.querySelectorAll('.section-btn');
    const sections = document.querySelectorAll('.section-content');

    sectionButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetSection = this.id.replace('btn-', 'seccion-');
            
            // Remover clase active de todos los botones
            sectionButtons.forEach(btn => {
                btn.classList.remove('active', 'custom-primary-bg', 'text-white');
                btn.classList.add('bg-gray-100', 'custom-text-primary');
            });
            
            // Ocultar todas las secciones con efecto fade out
            sections.forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(10px)';
                setTimeout(() => {
                    section.classList.add('hidden');
                }, 150);
            });
            
            // Activar el botón clickeado
            this.classList.remove('bg-gray-100', 'custom-text-primary');
            this.classList.add('active', 'custom-primary-bg', 'text-white');
            
            // Mostrar la sección correspondiente con efecto fade in
            setTimeout(() => {
                const targetSectionElement = document.getElementById(targetSection);
                if (targetSectionElement) {
                    targetSectionElement.classList.remove('hidden');
                    targetSectionElement.classList.add('fade-in');
                    
                    // Aplicar animación de entrada
                    setTimeout(() => {
                        targetSectionElement.style.opacity = '1';
                        targetSectionElement.style.transform = 'translateY(0)';
                    }, 50);
                }
            }, 150);
        });
    });

    // Reiniciar animaciones cuando se cambia de sección
    function restartAnimations(sectionElement) {
        const animatedElements = sectionElement.querySelectorAll('.animate-container');
        animatedElements.forEach((element, index) => {
            element.style.animation = 'none';
            element.style.opacity = '0';
            element.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                element.style.animation = `slideInUp 0.6s ease-out forwards`;
                element.style.animationDelay = `${(index + 1) * 0.1}s`;
            }, 100);
        });
    }

    // Aplicar animaciones cuando se muestra una sección
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                const target = mutation.target;
                if (!target.classList.contains('hidden') && target.classList.contains('section-content')) {
                    restartAnimations(target);
                }
            }
        });
    });

    // Observar cambios en todas las secciones
    sections.forEach(section => {
        observer.observe(section, { attributes: true });
    });
});

document.querySelectorAll('.delete-branch-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault(); // Evita el envío inmediato
        const confirmed = confirm('¿Estás seguro de que deseas eliminar esta sucursal?');
        if (confirmed) {
            form.submit(); // Si confirma, enviamos el formulario
        }
    });
});
</script>
@endsection