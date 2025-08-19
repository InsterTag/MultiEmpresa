@extends('layouts.company')
@section('content')
        <!-- Main Content -->
        <div class="flex-1 lg:ml-0 p-10">
            <!-- Header -->
            <div class="glass-effect rounded-2xl p-6 mb-6 animate-fade-in">
                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800 mb-2">Dashboard Principal</h1>
                        <p class="text-gray-600">Bienvenido de vuelta, aquí tienes un resumen de tu negocio</p>
                    </div>
                    <div class="mt-4 lg:mt-0 flex flex-col lg:flex-row gap-4">
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Última actualización</p>
                            <p class="font-semibold text-gray-800" id="lastUpdate"></p>
                        </div>
                        <button class="bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-lg transition-colors">
                            <i class="fas fa-sync-alt mr-2"></i>
                            Actualizar
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="stat-card glass-effect rounded-2xl p-6 animate-fade-in">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-primary/10 rounded-lg">
                            <i class="fas fa-dollar-sign text-primary text-xl"></i>
                        </div>
                        <span class="text-green-500 text-sm font-semibold">+12.5%</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">$147,560</h3>
                    <p class="text-gray-600">Ingresos Totales</p>
                </div>

                <div class="stat-card glass-effect rounded-2xl p-6 animate-fade-in" style="animation-delay: 0.1s;">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-accent/10 rounded-lg">
                            <i class="fas fa-shopping-bag text-accent text-xl"></i>
                        </div>
                        <span class="text-green-500 text-sm font-semibold">+8.2%</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">2,847</h3>
                    <p class="text-gray-600">Pedidos Totales</p>
                </div>

                <div class="stat-card glass-effect rounded-2xl p-6 animate-fade-in" style="animation-delay: 0.2s;">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-secondary/10 rounded-lg">
                            <i class="fas fa-users text-secondary text-xl"></i>
                        </div>
                        <span class="text-green-500 text-sm font-semibold">+5.7%</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">18,492</h3>
                    <p class="text-gray-600">Clientes Activos</p>
                </div>

                <div class="stat-card glass-effect rounded-2xl p-6 animate-fade-in" style="animation-delay: 0.3s;">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-purple/10 rounded-lg">
                            <i class="fas fa-chart-line text-purple text-xl"></i>
                        </div>
                        <span class="text-green-500 text-sm font-semibold">+15.3%</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">94.2%</h3>
                    <p class="text-gray-600">Tasa de Conversión</p>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Sales Chart -->
                <div class="glass-effect rounded-2xl p-6 animate-fade-in" style="animation-delay: 0.4s;">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Ventas Mensuales</h3>
                    <div class="relative h-64">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>

                <!-- Category Chart -->
                <div class="glass-effect rounded-2xl p-6 animate-fade-in" style="animation-delay: 0.5s;">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Ventas por Categoría</h3>
                    <div class="relative h-64">
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="glass-effect rounded-2xl p-6 animate-fade-in" style="animation-delay: 0.6s;">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-800">Actividad Reciente</h3>
                    <a href="#" class="text-primary hover:text-primary-dark transition-colors">Ver todo</a>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center p-4 bg-white/30 rounded-lg backdrop-blur-sm hover:bg-white/40 transition-colors">
                        <div class="p-2 bg-green-100 rounded-lg mr-4">
                            <i class="fas fa-shopping-cart text-green-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800">Nueva orden #12847</p>
                            <p class="text-sm text-gray-600">Cliente: María García - $298.50</p>
                        </div>
                        <span class="text-sm text-gray-500">Hace 2 min</span>
                    </div>

                    <div class="flex items-center p-4 bg-white/30 rounded-lg backdrop-blur-sm hover:bg-white/40 transition-colors">
                        <div class="p-2 bg-blue-100 rounded-lg mr-4">
                            <i class="fas fa-user-plus text-blue-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800">Nuevo cliente registrado</p>
                            <p class="text-sm text-gray-600">Carlos Mendoza se unió a la plataforma</p>
                        </div>
                        <span class="text-sm text-gray-500">Hace 5 min</span>
                    </div>

                    <div class="flex items-center p-4 bg-white/30 rounded-lg backdrop-blur-sm hover:bg-white/40 transition-colors">
                        <div class="p-2 bg-yellow-100 rounded-lg mr-4">
                            <i class="fas fa-box text-yellow-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800">Producto agotado</p>
                            <p class="text-sm text-gray-600">iPhone 14 Pro - Stock: 0 unidades</p>
                        </div>
                        <span class="text-sm text-gray-500">Hace 10 min</span>
                    </div>
                </div>
            </div>
        </div>
        @endsection
    