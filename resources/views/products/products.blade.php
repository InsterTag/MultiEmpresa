@extends('layouts.app')
@vite(['resources/css/products.css'])
@section('content')
    
        <div class="container mx-auto px-4 py-8">
        <div class="flex gap-8">
            <!-- Sidebar de Categorías -->
            @include('products.items.sidebar')

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
    @include('products.items.ModalShopingCar')

    <!-- Botón flotante del carrito -->
    @include('products.items.ButtomCar')
    
@endsection
@vite(['resources/js/products.js'])
    