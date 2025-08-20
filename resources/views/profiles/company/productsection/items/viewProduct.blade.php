<!-- Modal para Ver Producto -->
        <div id="viewModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="bg-white rounded-2xl shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto transform transition-all animate-fade-in">
                    <div class="p-6">
                        <!-- Header del Modal -->
                        <div class="flex justify-between items-center mb-6 border-b border-gray-200 pb-4">
                            <h3 class="text-2xl font-bold text-gray-900">Detalles del Producto</h3>
                            <button onclick="closeViewModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                                <i class="fas fa-times text-xl"></i>
                            </button>
                        </div>
                        
                        <!-- Contenido del Modal -->
                        <div class="space-y-6">
                            <!-- Imagen y información básica -->
                            <div class="flex flex-col md:flex-row gap-6">
                                <div class="md:w-1/3">
                                    <div id="viewImage" class="w-full h-48 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <!-- La imagen se cargará aquí -->
                                    </div>
                                </div>
                                <div class="md:w-2/3 space-y-4">
                                    <div>
                                        <h4 id="viewName" class="text-xl font-bold text-gray-800 mb-2"></h4>
                                        <p id="viewDescription" class="text-gray-600"></p>
                                    </div>
                                    
                                    <!-- Estado del producto -->
                                    <div id="viewStatusContainer">
                                        <!-- El estado se cargará aquí -->
                                    </div>
                                </div>
                            </div>

                            <!-- Información detallada -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-4">
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Código de Barras</label>
                                        <p id="viewBarcode" class="text-lg font-medium text-gray-800 mt-1"></p>
                                    </div>
                                    
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Categoría</label>
                                        <p id="viewCategory" class="text-lg font-medium text-gray-800 mt-1"></p>
                                    </div>
                                </div>
                                
                                <div class="space-y-4">
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Precio</label>
                                        <p id="viewPrice" class="text-2xl font-bold text-green-600 mt-1"></p>
                                    </div>
                                    
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Stock</label>
                                        <p id="viewStock" class="text-lg font-medium text-gray-800 mt-1"></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Botones de acción -->
                            <div class="flex gap-3 pt-6 border-t border-gray-200">
                                <button onclick="closeViewModal()" 
                                    class="flex-1 px-4 py-2 bg-gray-100 text-gray-800 rounded-lg hover:bg-gray-200 transition-colors">
                                    Cerrar
                                </button>
                                <button id="viewEditBtn" onclick="" 
                                    class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                    <i class="fas fa-edit mr-2"></i>
                                    Editar Producto
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>