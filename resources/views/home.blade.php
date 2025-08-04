@extends('layouts.app')
@section('content')
    @vite(['resources/css/home.css', 'resources/js/home.js'])
    <!-- Main Content -->
    <main>
        <!-- Hero Section with Feature Cards -->
        <section class="gradient-bg py-16" id="hero-section">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12 animate-fade-in">
                    <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-4">
                        Conecta tu <span class="text-blue-600">Empresa</span><br>
                        con el <span class="text-blue-600">Mundo</span>
                    </h1>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        La plataforma líder donde empresas publican sus productos y clientes encuentran exactamente lo que buscan.
                    </p>
                </div>
                <!-- Feature Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mt-16">
                    <!-- Card 1: Registro Empresarial -->
                    <div class="bg-white rounded-xl p-6 card-hover animate-fade-in shadow-lg">
                        <div class="bg-blue-100 w-16 h-16 rounded-xl flex items-center justify-center mb-4 floating-animation">
                            <i class="fas fa-building text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Registra tu Empresa</h3>
                        <p class="text-gray-600 text-sm mb-4">Únete a nuestra plataforma y amplía tu alcance comercial sin límites.</p>
                        <button class="text-blue-600 font-medium text-sm hover:text-blue-800 transition-colors">
                            Comenzar ahora →
                        </button>
                    </div>
                    <!-- Card 2: Gestión de Productos -->
                    <div class="bg-white rounded-xl p-6 card-hover animate-fade-in shadow-lg">
                        <div class="bg-green-100 w-16 h-16 rounded-xl flex items-center justify-center mb-4 floating-animation">
                            <i class="fas fa-boxes text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Gestiona Productos</h3>
                        <p class="text-gray-600 text-sm mb-4">Sube, edita y organiza tu catálogo de forma rápida y sencilla.</p>
                        <button class="text-green-600 font-medium text-sm hover:text-green-800 transition-colors">
                            Explorar funciones →
                        </button>
                    </div>
                    <!-- Card 3: Pagos Seguros -->
                    <div class="bg-white rounded-xl p-6 card-hover animate-fade-in shadow-lg">
                        <div class="bg-yellow-100 w-16 h-16 rounded-xl flex items-center justify-center mb-4 floating-animation">
                            <i class="fas fa-credit-card text-yellow-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Pagos Seguros</h3>
                        <p class="text-gray-600 text-sm mb-4">Procesa pagos de forma segura con múltiples métodos disponibles.</p>
                        <button class="text-yellow-600 font-medium text-sm hover:text-yellow-800 transition-colors">
                            Ver métodos →
                        </button>
                    </div>
                    <!-- Card 4: Analytics -->
                    <div class="bg-white rounded-xl p-6 card-hover animate-fade-in shadow-lg">
                        <div class="bg-purple-100 w-16 h-16 rounded-xl flex items-center justify-center mb-4 floating-animation">
                            <i class="fas fa-chart-line text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Analytics Avanzado</h3>
                        <p class="text-gray-600 text-sm mb-4">Obtén insights detallados sobre tus ventas y rendimiento.</p>
                        <button class="text-purple-600 font-medium text-sm hover:text-purple-800 transition-colors">
                            Ver estadísticas →
                        </button>
                    </div>
                    <!-- Card 5: Soporte 24/7 -->
                    <div class="bg-white rounded-xl p-6 card-hover animate-fade-in shadow-lg">
                        <div class="bg-red-100 w-16 h-16 rounded-xl flex items-center justify-center mb-4 floating-animation">
                            <i class="fas fa-headset text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Soporte 24/7</h3>
                        <p class="text-gray-600 text-sm mb-4">Nuestro equipo está disponible para ayudarte en todo momento.</p>
                        <button class="text-red-600 font-medium text-sm hover:text-red-800 transition-colors">
                            Contactar soporte →
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- Best Sellers Section -->
        <section class="py-16 bg-white section-separator" id="bestsellers-section">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center mb-8 animate-fade-in">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">Productos Más Vendidos</h2>
                        <p class="text-gray-600 mt-2">Los favoritos de esta semana</p>
                    </div>
                    <button class="primary-btn text-white px-6 py-2 rounded-lg font-medium">
                        Ver todos
                    </button>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Product Card -->
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden card-hover animate-fade-in">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=300&h=200&fit=crop" alt="Producto" class="w-full h-48 object-cover">
                            <span class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded-md text-xs font-medium">-20%</span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-2">Auriculares Premium</h3>
                            <p class="text-gray-600 text-sm mb-2">TechCorp S.A.</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <span class="text-lg font-bold text-blue-600">$79.99</span>
                                    <span class="text-sm text-gray-500 line-through">$99.99</span>
                                </div>
                                <div class="flex items-center text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <span class="text-gray-600 text-sm ml-1">4.8</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- More product cards (similar structure) -->
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden card-hover animate-fade-in">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=300&h=200&fit=crop" alt="Producto" class="w-full h-48 object-cover">
                            <span class="absolute top-2 left-2 bg-green-500 text-white px-2 py-1 rounded-md text-xs font-medium pulse-animation">NUEVO</span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-2">Reloj Inteligente</h3>
                            <p class="text-gray-600 text-sm mb-2">SmartWatch Co.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold text-blue-600">$199.99</span>
                                <div class="flex items-center text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <span class="text-gray-600 text-sm ml-1">4.9</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden card-hover animate-fade-in">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1572635196237-14b3f281503f?w=300&h=200&fit=crop" alt="Producto" class="w-full h-48 object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-2">Gafas de Sol</h3>
                            <p class="text-gray-600 text-sm mb-2">Fashion Style</p>
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold text-blue-600">$45.99</span>
                                <div class="flex items-center text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <span class="text-gray-600 text-sm ml-1">4.7</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden card-hover animate-fade-in">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=300&h=200&fit=crop" alt="Producto" class="w-full h-48 object-cover">
                            <span class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded-md text-xs font-medium">-35%</span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-2">Zapatillas Deportivas</h3>
                            <p class="text-gray-600 text-sm mb-2">SportMax</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <span class="text-lg font-bold text-blue-600">$89.99</span>
                                    <span class="text-sm text-gray-500 line-through">$139.99</span>
                                </div>
                                <div class="flex items-center text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <span class="text-gray-600 text-sm ml-1">4.6</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Big Discounts Section -->
        <section class="py-16 gradient-bg section-separator" id="discounts-section">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12 animate-fade-in">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">🔥 Ofertas Especiales</h2>
                    <p class="text-gray-600">Descuentos increíbles por tiempo limitado</p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Large Discount Banner -->
                    <div class="lg:col-span-2 bg-gradient-to-r from-red-500 to-pink-600 rounded-2xl p-8 text-white card-hover animate-fade-in">
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-6xl font-bold">50%</span>
                                <p class="text-xl mt-2">Descuento en Electrónicos</p>
                                <p class="opacity-90 mt-2">Solo por este fin de semana</p>
                                <button class="bg-white text-red-600 px-6 py-3 rounded-lg font-medium mt-4 hover:bg-gray-100 transition-colors">
                                    Comprar ahora
                                </button>
                            </div>
                            <i class="fas fa-bolt text-8xl opacity-20"></i>
                        </div>
                    </div>
                    <!-- Side Offers -->
                    <div class="space-y-4">
                        <div class="bg-blue-600 text-white p-6 rounded-xl card-hover animate-fade-in">
                            <h3 class="text-xl font-bold">Envío Gratis</h3>
                            <p class="text-blue-100 mt-1">En compras superiores a $50</p>
                            <button class="text-white underline mt-2">Ver detalles</button>
                        </div>
                        <div class="bg-green-600 text-white p-6 rounded-xl card-hover animate-fade-in">
                            <h3 class="text-xl font-bold">Cashback 10%</h3>
                            <p class="text-green-100 mt-1">En tu primera compra</p>
                            <button class="text-white underline mt-2">Activar oferta</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Info Cards Section -->
        <section class="py-16 bg-white section-separator" id="info-section">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Payment Security -->
                    <div class="text-center animate-fade-in">
                        <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shield-alt text-blue-600 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Pagos Seguros</h3>
                        <p class="text-gray-600">Con Mercado Pago, paga en cuotas y aprovecha la comodidad de financiación que te da tu banco, o hazlo con efectivo en puntos de pago. ¡Y siempre es seguro!</p>
                        <button class="text-blue-600 font-medium mt-3 hover:text-blue-800 transition-colors">
                            Cómo pagar con MarketPlace Pro
                        </button>
                    </div>
                    <!-- Free Shipping -->
                    <div class="text-center animate-fade-in">
                        <div class="bg-green-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-truck text-green-600 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Envío gratis desde $60.000</h3>
                        <p class="text-gray-600">Con solo estar registrado en MarketPlace Pro, tienes envíos gratis en miles de productos seleccionados.</p>
                        <button class="text-green-600 font-medium mt-3 hover:text-green-800 transition-colors">
                            Conocer beneficios de envío
                        </button>
                    </div>
                    <!-- Security First -->
                    <div class="text-center animate-fade-in">
                        <div class="bg-purple-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user-shield text-purple-600 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Seguridad, de principio a fin</h3>
                        <p class="text-gray-600">¿No te gusta? ¡Devuélvelo! En MarketPlace Pro, no hay nada que no puedas hacer, porque estás siempre protegido.</p>
                        <button class="text-purple-600 font-medium mt-3 hover:text-purple-800 transition-colors">
                            Cómo te protegemos
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
@endsection
    