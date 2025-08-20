 <!-- Inventory Section -->
            <div id="inventory" class="section-content hidden">
                <div class="glass-effect rounded-2xl p-6 animate-fade-in">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 sm:mb-0">Control de Inventario</h2>
                        <button class="bg-primary text-white px-4 py-2 rounded-lg">
                            <i class="fas fa-plus mr-2"></i>Ajuste de Stock
                        </button>
                    </div>
                    
                    <!-- Inventory Alerts -->
                    <div class="space-y-4">
                        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                            <div class="flex items-start">
                                <i class="fas fa-exclamation-triangle text-red-500 mr-3 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold text-red-800">Stock Crítico</h4>
                                    <p class="text-sm text-red-600">6 productos están agotados y requieren reposición inmediata</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <div class="flex items-start">
                                <i class="fas fa-exclamation-circle text-yellow-500 mr-3 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold text-yellow-800">Stock Bajo</h4>
                                    <p class="text-sm text-yellow-600">8 productos tienen stock por debajo del mínimo recomendado</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>