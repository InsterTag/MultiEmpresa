@extends('layouts.app')
@section('content')
    @vite(['resources/css/home.css', 'resources/js/home.js'])

    <style>
/* CSS para el sistema de tabs */
.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
}

.tab-button.active {
    background-color: var(--primary-color, #3b82f6) !important;
    color: white !important;
}

.tab-button:not(.active) {
    background-color: transparent;
    color: var(--text-secondary, #6b7280);
}

.tab-button:not(.active):hover {
    background-color: var(--hover-bg, #f3f4f6);
}
</style>
<!-- Main Content -->
<div class="min-h-screen custom-bg-light py-8">
    <div class="container mx-auto px-4 max-w-7xl">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold custom-text-primary mb-2">Carrito de Compras</h1>
            <p class="custom-text-secondary">Revisa y gestiona los productos de tu carrito</p>
        </div>

        <!-- Navigation Tabs -->
        <div class="mb-8">
            <div class="flex space-x-1 p-1 custom-bg-white rounded-lg shadow-sm custom-border border">
                <button class="tab-button flex-1 py-3 px-6 rounded-md font-medium transition-all duration-200 text-center active" data-tab="cart">
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.2-5M7 13l-2.3 2.3A1 1 0 005 16h14M7 13v6a2 2 0 002 2h6a2 2 0 002-2v-6"></path>
                        </svg>
                        Mi Carrito
                    </span>
                </button>
                <button class="tab-button flex-1 py-3 px-6 rounded-md font-medium transition-all duration-200 text-center custom-text-secondary hover:custom-hover-bg" data-tab="shipping">
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        Envío
                    </span>
                </button>
                <button class="tab-button flex-1 py-3 px-6 rounded-md font-medium transition-all duration-200 text-center custom-text-secondary hover:custom-hover-bg" data-tab="payment">
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                        Pago
                    </span>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content Area -->
            <div class="lg:col-span-2">
                <!-- Cart Tab Content -->
                <div id="cart-content" class="tab-content active">
                    <div class="custom-bg-white rounded-lg shadow-sm p-6 custom-border border">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-semibold custom-text-primary">Productos en tu carrito</h2>
                            <span class="custom-text-secondary text-sm">3 productos</span>
                        </div>

                        <!-- Cart Items -->
                        <div class="space-y-6">
                            <!-- Product 1 -->
                            <div class="flex items-center space-x-4 pb-6 border-b custom-border">
                                <div class="w-20 h-20 custom-bg-light rounded-lg flex items-center justify-center">
                                    <svg class="w-8 h-8 custom-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-medium custom-text-primary">Smartphone Samsung Galaxy S24</h3>
                                    <p class="custom-text-secondary text-sm mt-1">Color: Negro, 256GB</p>
                                    <div class="flex items-center mt-2">
                                        <span class="text-lg font-semibold custom-primary">$899.99</span>
                                        <span class="ml-2 text-sm custom-text-secondary line-through">$999.99</span>
                                        <span class="ml-2 text-xs custom-accent font-medium">-10%</span>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="flex items-center custom-border border rounded-lg">
                                        <button class="p-2 hover:custom-hover-bg rounded-l-lg transition-colors">
                                            <svg class="w-4 h-4 custom-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                            </svg>
                                        </button>
                                        <input type="number" value="1" min="1" class="quantity-input w-16 py-2 text-center custom-text-primary border-0 focus:ring-0 focus:outline-none">
                                        <button class="p-2 hover:custom-hover-bg rounded-r-lg transition-colors">
                                            <svg class="w-4 h-4 custom-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <button class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Product 2 -->
                            <div class="flex items-center space-x-4 pb-6 border-b custom-border">
                                <div class="w-20 h-20 custom-bg-light rounded-lg flex items-center justify-center">
                                    <svg class="w-8 h-8 custom-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-medium custom-text-primary">MacBook Air M3</h3>
                                    <p class="custom-text-secondary text-sm mt-1">13", 8GB RAM, 512GB SSD</p>
                                    <div class="flex items-center mt-2">
                                        <span class="text-lg font-semibold custom-primary">$1,299.99</span>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="flex items-center custom-border border rounded-lg">
                                        <button class="p-2 hover:custom-hover-bg rounded-l-lg transition-colors">
                                            <svg class="w-4 h-4 custom-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                            </svg>
                                        </button>
                                        <input type="number" value="2" min="1" class="quantity-input w-16 py-2 text-center custom-text-primary border-0 focus:ring-0 focus:outline-none">
                                        <button class="p-2 hover:custom-hover-bg rounded-r-lg transition-colors">
                                            <svg class="w-4 h-4 custom-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <button class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Product 3 -->
                            <div class="flex items-center space-x-4">
                                <div class="w-20 h-20 custom-bg-light rounded-lg flex items-center justify-center">
                                    <svg class="w-8 h-8 custom-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-medium custom-text-primary">Auriculares Sony WH-1000XM5</h3>
                                    <p class="custom-text-secondary text-sm mt-1">Cancelación de ruido, Bluetooth</p>
                                    <div class="flex items-center mt-2">
                                        <span class="text-lg font-semibold custom-primary">$349.99</span>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="flex items-center custom-border border rounded-lg">
                                        <button class="p-2 hover:custom-hover-bg rounded-l-lg transition-colors">
                                            <svg class="w-4 h-4 custom-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                            </svg>
                                        </button>
                                        <input type="number" value="1" min="1" class="quantity-input w-16 py-2 text-center custom-text-primary border-0 focus:ring-0 focus:outline-none">
                                        <button class="p-2 hover:custom-hover-bg rounded-r-lg transition-colors">
                                            <svg class="w-4 h-4 custom-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <button class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Cart Actions -->
                        <div class="flex items-center justify-between mt-8 pt-6 border-t custom-border">
                            <button class="flex items-center custom-text-secondary hover:custom-primary transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                Continuar comprando
                            </button>
                            <button class="custom-primary-bg text-white px-6 py-3 rounded-lg font-medium hover:custom-primary-dark-bg transition-colors">
                                Proceder al checkout
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Shipping Tab Content -->
                <div id="shipping-content" class="tab-content">
                    <div class="custom-bg-white rounded-lg shadow-sm p-6 custom-border border">
                        <h2 class="text-xl font-semibold custom-text-primary mb-6">Información de Envío</h2>
                        
                        <form class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium custom-text-primary mb-2">Nombre completo</label>
                                    <input type="text" class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors" placeholder="Tu nombre completo">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium custom-text-primary mb-2">Teléfono</label>
                                    <input type="tel" class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors" placeholder="Tu número de teléfono">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium custom-text-primary mb-2">Dirección completa</label>
                                <input type="text" class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors" placeholder="Calle, número, colonia">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label class="block text-sm font-medium custom-text-primary mb-2">Ciudad</label>
                                    <input type="text" class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors" placeholder="Tu ciudad">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium custom-text-primary mb-2">Estado</label>
                                    <select class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors custom-text-primary">
                                        <option value="">Selecciona estado</option>
                                        <option value="cdmx">Ciudad de México</option>
                                        <option value="jalisco">Jalisco</option>
                                        <option value="nuevo-leon">Nuevo León</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium custom-text-primary mb-2">Código Postal</label>
                                    <input type="text" class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors" placeholder="12345">
                                </div>
                            </div>

                            <!-- Shipping Options -->
                            <div class="mt-8">
                                <h3 class="text-lg font-medium custom-text-primary mb-4">Opciones de envío</h3>
                                <div class="space-y-4">
                                    <div class="flex items-center p-4 custom-border border rounded-lg hover:custom-hover-bg transition-colors cursor-pointer">
                                        <input type="radio" name="shipping" value="standard" class="mr-4" checked>
                                        <div class="flex-1">
                                            <div class="flex justify-between items-center">
                                                <span class="font-medium custom-text-primary">Envío estándar</span>
                                                <span class="custom-text-primary font-semibold">Gratis</span>
                                            </div>
                                            <p class="custom-text-secondary text-sm mt-1">5-7 días hábiles</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-4 custom-border border rounded-lg hover:custom-hover-bg transition-colors cursor-pointer">
                                        <input type="radio" name="shipping" value="express" class="mr-4">
                                        <div class="flex-1">
                                            <div class="flex justify-between items-center">
                                                <span class="font-medium custom-text-primary">Envío express</span>
                                                <span class="custom-text-primary font-semibold">$99.00</span>
                                            </div>
                                            <p class="custom-text-secondary text-sm mt-1">2-3 días hábiles</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Payment Tab Content -->
                <div id="payment-content" class="tab-content">
                    <div class="custom-bg-white rounded-lg shadow-sm p-6 custom-border border">
                        <h2 class="text-xl font-semibold custom-text-primary mb-6">Método de Pago</h2>
                        
                        <div class="space-y-6">
                            <!-- Payment Methods -->
                            <div class="space-y-4">
                                <div class="flex items-center p-4 custom-border border rounded-lg hover:custom-hover-bg transition-colors cursor-pointer">
                                    <input type="radio" name="payment" value="card" class="mr-4" checked>
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 mr-3 custom-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                        </svg>
                                        <span class="font-medium custom-text-primary">Tarjeta de crédito/débito</span>
                                    </div>
                                </div>
                                <div class="flex items-center p-4 custom-border border rounded-lg hover:custom-hover-bg transition-colors cursor-pointer">
                                    <input type="radio" name="payment" value="paypal" class="mr-4">
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 mr-3 custom-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="font-medium custom-text-primary">PayPal</span>
                                    </div>
                                </div>
                                <div class="flex items-center p-4 custom-border border rounded-lg hover:custom-hover-bg transition-colors cursor-pointer">
                                    <input type="radio" name="payment" value="oxxo" class="mr-4">
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 mr-3 custom-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                        <span class="font-medium custom-text-primary">Pago en OXXO</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Details Form -->
                            <div id="card-form" class="mt-6 space-y-4">
                                <div>
                                    <label class="block text-sm font-medium custom-text-primary mb-2">Número de tarjeta</label>
                                    <input type="text" class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors" placeholder="1234 5678 9012 3456">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium custom-text-primary mb-2">Fecha de expiración</label>
                                        <input type="text" class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors" placeholder="MM/YY">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium custom-text-primary mb-2">CVV</label>
                                        <input type="text" class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors" placeholder="123">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium custom-text-primary mb-2">Nombre en la tarjeta</label>
                                    <input type="text" class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors" placeholder="Nombre como aparece en la tarjeta">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary Sidebar -->
            <div class="lg:col-span-1">
                <div class="custom-bg-white rounded-lg shadow-sm p-6 custom-border border sticky top-8">
                    <h3 class="text-lg font-semibold custom-text-primary mb-4">Resumen del pedido</h3>
                    
                    <div class="space-y-3 mb-4">
                        <div class="flex justify-between custom-text-secondary text-sm">
                            <span>Subtotal (4 productos)</span>
                            <span>$2,949.97</span>
                        </div>
                        <div class="flex justify-between custom-text-secondary text-sm">
                            <span>Descuentos</span>
                            <span class="custom-accent">-$100.00</span>
                        </div>
                        <div class="flex justify-between custom-text-secondary text-sm">
                            <span>Envío</span>
                            <span>Gratis</span>
                        </div>
                        <div class="flex justify-between custom-text-secondary text-sm">
                            <span>Impuestos</span>
                            <span>$235.99</span>
                        </div>
                    </div>
                    
                    <div class="border-t custom-border pt-4 mb-6">
                        <div class="flex justify-between text-lg font-semibold custom-text-primary">
                            <span>Total</span>
                            <span>$3,085.96</span>
                        </div>
                    </div>

                    <!-- Promo Code -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium custom-text-primary mb-2">Código de descuento</label>
                        <div class="flex">
                            <input type="text" class="flex-1 px-4 py-2 custom-border border rounded-l-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors" placeholder="Ingresa código">
                            <button class="custom-primary-bg text-white px-4 py-2 rounded-r-lg hover:custom-primary-dark-bg transition-colors">
                                Aplicar
                            </button>
                        </div>
                    </div>

                    <!-- Security Info -->
                    <div class="custom-bg-light rounded-lg p-4 mb-6">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 custom-accent mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            <span class="text-sm font-medium custom-text-primary">Compra segura</span>
                        </div>
                        <p class="text-xs custom-text-secondary">Tu información está protegida con encriptación SSL de 256 bits</p>
                    </div>

                    <!-- Action Button -->
                    <button class="w-full custom-primary-bg text-white py-4 rounded-lg font-medium text-lg hover:custom-primary-dark-bg transition-colors mb-4">
                        Finalizar compra
                    </button>

                    <!-- Guarantee -->
                    <div class="text-center">
                        <div class="flex items-center justify-center mb-2">
                            <svg class="w-4 h-4 custom-accent mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm custom-text-secondary">Garantía de devolución 30 días</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Tab Navigation -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tab functionality
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    // Initialize - hide all content except first
    tabContents.forEach((content, index) => {
        if (index === 0) {
            content.classList.add('active');
        } else {
            content.classList.remove('active');
        }
    });
    
    // Initialize - set first button as active
    tabButtons.forEach((button, index) => {
        if (index === 0) {
            button.classList.add('active');
            button.style.backgroundColor = 'var(--primary-color)';
            button.style.color = 'white';
        } else {
            button.classList.remove('active');
            button.style.backgroundColor = '';
            button.style.color = '';
        }
    });
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');
            
            // Remove active class from all buttons
            tabButtons.forEach(btn => {
                btn.classList.remove('active');
                btn.style.backgroundColor = '';
                btn.style.color = '';
                btn.classList.add('custom-text-secondary');
            });
            
            // Hide all content
            tabContents.forEach(content => {
                content.classList.remove('active');
            });
            
            // Add active class to clicked button
            this.classList.add('active');
            this.style.backgroundColor = 'var(--primary-color)';
            this.style.color = 'white';
            this.classList.remove('custom-text-secondary');
            
            // Show corresponding content
            const targetContent = document.getElementById(targetTab + '-content');
            if (targetContent) {
                targetContent.classList.add('active');
            }
        });
    });
    
    // Quantity controls
    const quantityInputs = document.querySelectorAll('.quantity-input');
    quantityInputs.forEach(input => {
        const minusBtn = input.previousElementSibling;
        const plusBtn = input.nextElementSibling;
        
        if (minusBtn) {
            minusBtn.addEventListener('click', function() {
                let currentValue = parseInt(input.value);
                if (currentValue > 1) {
                    input.value = currentValue - 1;
                }
            });
        }
        
        if (plusBtn) {
            plusBtn.addEventListener('click', function() {
                let currentValue = parseInt(input.value);
                input.value = currentValue + 1;
            });
        }
    });
    
    // Payment method toggle
    const paymentRadios = document.querySelectorAll('input[name="payment"]');
    const cardForm = document.getElementById('card-form');
    
    paymentRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'card') {
                cardForm.style.display = 'block';
            } else {
                cardForm.style.display = 'none';
            }
        });
    });
});
</script>
@endsection
    