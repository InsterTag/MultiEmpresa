<div id="cartModal" class="fixed inset-0 bg-gradient-to-br from-black/60 to-black/80 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-5xl max-h-[95vh] flex flex-col overflow-hidden transform transition-all duration-300">
        
        <!-- Header del Modal - Mejorado -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="bg-white/20 p-3 rounded-full">
                        <i class="fas fa-shopping-cart text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Mi Carrito de Compras</h2>
                        <p class="text-blue-100 text-sm">Revisa tus productos seleccionados</p>
                    </div>
                    <span id="cartItemsCount" class="bg-white/20 backdrop-blur-sm text-white px-4 py-2 rounded-full text-sm font-semibold border border-white/30">
                        0 items
                    </span>
                </div>
                <button id="closeCartModal" class="text-white/70 hover:text-white hover:bg-white/20 p-2 rounded-full transition-all duration-200">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Contenido del Carrito - Estructura mejorada -->
        <div class="flex-1 overflow-hidden flex flex-col">
            <!-- Lista de productos -->
            <div class="flex-1 overflow-y-auto p-6 bg-gray-50/50">
                <div id="cartItems" class="space-y-4 max-w-4xl mx-auto">
                    <!-- Los items del carrito se cargarán aquí dinámicamente -->
                    <!-- Ejemplo de estructura de item -->
                    <div class="cart-item bg-white rounded-xl p-4 shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-gray-200 rounded-lg flex-shrink-0 overflow-hidden">
                                <!-- Imagen del producto -->
                                <div class="w-full h-full bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-500"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800">Nombre del Producto</h4>
                                <p class="text-sm text-gray-500">Descripción breve</p>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="flex items-center bg-gray-100 rounded-lg">
                                    <button class="p-2 hover:bg-gray-200 rounded-l-lg transition-colors">
                                        <i class="fas fa-minus text-xs"></i>
                                    </button>
                                    <span class="px-3 py-2 min-w-[50px] text-center font-medium">1</span>
                                    <button class="p-2 hover:bg-gray-200 rounded-r-lg transition-colors">
                                        <i class="fas fa-plus text-xs"></i>
                                    </button>
                                </div>
                                <div class="text-right min-w-[80px]">
                                    <p class="font-bold text-gray-800">$99.99</p>
                                </div>
                                <button class="text-red-500 hover:text-red-700 hover:bg-red-50 p-2 rounded-lg transition-all">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mensaje cuando el carrito está vacío - Mejorado -->
                <div id="emptyCart" class="text-center py-20 max-w-md mx-auto hidden">
                    <div class="bg-gray-100 w-32 h-32 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-shopping-cart text-5xl text-gray-400"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-700 mb-3">Tu carrito está vacío</h3>
                    <p class="text-gray-500 mb-8 leading-relaxed">¡Descubre nuestros increíbles productos y agrega algunos a tu carrito!</p>
                    <button id="continueShopping" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-8 py-3 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl font-semibold">
                        <i class="fas fa-store mr-2"></i>
                        Explorar Productos
                    </button>
                </div>
            </div>

            <!-- Resumen y acciones - Diseño mejorado -->
            <div id="cartFooter" class="bg-white border-t border-gray-200 p-6">
                <div class="max-w-4xl mx-auto">
                    <!-- Resumen de costos -->
                    <div class="bg-gray-50 rounded-2xl p-6 mb-6">
                        <div class="space-y-3">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal:</span>
                                <span id="cartSubtotal">$0.00</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Envío:</span>
                                <span>Gratis</span>
                            </div>
                            <div class="border-t pt-3">
                                <div class="flex justify-between text-xl font-bold text-gray-800">
                                    <span>Total:</span>
                                    <span id="cartTotal">$0.00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botones de acción -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button id="clearCart" class="flex-1 bg-gradient-to-r from-red-500 to-red-600 text-white py-4 px-6 rounded-xl hover:from-red-600 hover:to-red-700 transition-all duration-300 font-semibold shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                            <i class="fas fa-trash"></i>
                            Vaciar Carrito
                        </button>
                        

                        
                        <a href="{{route('carritodecompras')}}" class="flex-1">
                            <button id="checkout" class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-4 px-6 rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-300 font-semibold shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                                <i class="fas fa-credit-card"></i>
                                Proceder al Pago
                            </button>
                        </a>
                    </div>

                    <!-- Información adicional -->
                    <div class="mt-4 text-center">
                        <p class="text-sm text-gray-500">
                            <i class="fas fa-shield-alt mr-1"></i>
                            Compra 100% segura • Envío gratis en compras superiores a $50
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>