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
                @forelse($products as $product)
                    <div class="product-card bg-white rounded-2xl shadow-lg p-4 flex flex-col fade-in-up"
    data-id="{{ $product->id }}"
    data-name="{{ $product->name }}"
    data-description="{{ $product->description }}"
    data-price="{{ $product->unit_price }}"
    data-rating="{{ $product->rating ?? 0 }}"
    data-reviews="{{ $product->reviews_count ?? 0 }}"
    data-category="{{ $product->categories->first()->slug ?? 'general' }}"
    data-subcategories='@json($product->categories->flatMap(fn($cat) =>
        $cat->characteristics->mapWithKeys(fn($char) => [
            $char->name => $char->pivot->characteristic_id
        ])
    ))'
    data-image="{{ $product->media ? asset('storage/' . $product->media) : '' }}">
                        @if($product->media)
                            <img src="{{ asset('storage/' . $product->media) }}" alt="{{ $product->name }}" class="rounded-xl mb-4 object-cover h-40 w-full">
                        @else
                            <div class="bg-gray-200 rounded-xl mb-4 h-40 flex items-center justify-center">
                                <span class="text-gray-500">Sin imagen</span>
                            </div>
                        @endif

                        <h2 class="text-lg font-bold">{{ $product->name }}</h2>
                        <p class="text-gray-500 text-sm mt-1">{{ Str::limit($product->description, 50) }}</p>
                        <p class="text-blue-600 font-semibold mt-2">${{ number_format($product->unit_price, 2) }}</p>

                        <button class="mt-auto bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-all add-to-cart">
                            <i class="fas fa-shopping-cart mr-2"></i> Comprar
                        </button>
                    </div>
                @empty
                    <p class="col-span-4 text-center text-gray-500">No hay productos disponibles.</p>
                @endforelse
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
<div id="notification" class="fixed top-5 right-5 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 z-50">
    <div class="flex items-center gap-3">
        <i class="fas fa-check-circle text-xl"></i>
        <div>
            <p id="notificationTitle" class="font-semibold">¡Producto agregado!</p>
            <p id="notificationMessage" class="text-sm opacity-90">El producto se agregó al carrito correctamente</p>
        </div>
        <button id="closeNotification" class="ml-4 text-white hover:text-gray-200">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

<!-- Modal del Carrito -->
@include('products.items.ModalShopingCar')

<!-- Botón flotante del carrito -->
@include('products.items.ButtomCar')

@endsection

@vite(['resources/js/products.js'])

@vite(['resources/js/modalShoppingcart.js'])
