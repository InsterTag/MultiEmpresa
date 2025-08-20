<div id="cartModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] flex flex-col">
            <!-- Header del Modal -->
            <div class="flex items-center justify-between p-6 border-b">
                <div class="flex items-center gap-3">
                    <i class="fas fa-shopping-cart text-2xl text-blue-600"></i>
                    <h2 class="text-2xl font-bold text-gray-800">Mi Carrito</h2>
                    <span id="cartItemsCount" class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-semibold">0 items</span>
                </div>
                <button id="closeCartModal" class="text-gray-400 hover:text-gray-600 text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Contenido del Carrito -->
            <div class="flex-1 overflow-y-auto p-6">
                <div id="cartItems" class="space-y-4">
                    <!-- Los items del carrito se cargarán aquí dinámicamente -->
                </div>

                <!-- Mensaje cuando el carrito está vacío -->
                <div id="emptyCart" class="text-center py-12">
                    <i class="fas fa-shopping-cart text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-500 mb-2">Tu carrito está vacío</h3>
                    <p class="text-gray-400 mb-6">¡Agrega algunos productos para comenzar!</p>
                    <button id="continueShopping" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition-colors">
                        Continuar Comprando
                    </button>
                </div>
            </div>

            <!-- Footer del Modal -->
            <div id="cartFooter" class="border-t p-6 bg-gray-50 rounded-b-2xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-right">
                        <p class="text-gray-600">Subtotal:</p>
                        <p id="cartSubtotal" class="text-2xl font-bold text-gray-800">$0.00</p>
                    </div>
                </div>
                <div class="flex gap-3">
                    <button id="clearCart" class="flex-1 bg-red-500 text-white py-3 px-6 rounded-lg hover:bg-red-600 transition-colors font-semibold">
                        <i class="fas fa-trash mr-2"></i>
                        Vaciar Carrito
                    </button>
                    <a href="{{route('carritodecompras')}}">
                        <button id="checkout" class="flex-2 bg-green-500 text-white py-3 px-6 rounded-lg hover:bg-green-600 transition-colors font-semibold">
                        <i class="fas fa-credit-card mr-2"></i>
                        Proceder al Pago
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>