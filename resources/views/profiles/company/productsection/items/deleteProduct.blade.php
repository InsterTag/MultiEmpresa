                <!-- Modal para Eliminar Producto -->
        <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="bg-white rounded-2xl shadow-xl max-w-md w-full transform transition-all animate-fade-in">
                    <div class="p-6">
                        <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-red-100 rounded-full">
                            <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                        </div>
                        
                        <h3 class="text-lg font-bold text-gray-900 text-center mb-2">Eliminar Producto</h3>
                        <p class="text-gray-600 text-center mb-6">
                            ¿Estás seguro de que deseas eliminar el producto 
                            <span id="productToDelete" class="font-semibold text-gray-900"></span>?
                            Esta acción no se puede deshacer.
                        </p>
                        
                        <div class="flex gap-3">
                            <button onclick="closeDeleteModal()" 
                                class="flex-1 px-4 py-2 bg-gray-100 text-gray-800 rounded-lg hover:bg-gray-200 transition-colors">
                                Cancelar
                            </button>
                            <form id="deleteForm" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>