    <!-- Modal del Carrito -->
    <div id="cartModal" class="modal">
        <div class="modal-content">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold custom-text-primary">Carrito</h2>
                <span class="close cursor-pointer">&times;</span>
            </div>
            <div id="cartItems">
                <!-- Los productos del carrito se mostrarán aquí -->
            </div>
            <div class="mt-4 pt-4 border-t">
                <div class="flex justify-between items-center mb-4">
                    <span class="font-bold">Total:</span>
                    <span id="cartTotal" class="font-bold">$0.00</span>
                </div>
                <button class="w-full bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition-colors">
                    Finalizar Compra
                </button>
            </div>
        </div>
    </div>