            <!-- Address  (Single Address) -->
            <div id="address-content" class="tab-content hidden">
                <div class="grid gap-6">
                    <div class="custom-bg-white rounded-2xl card-shadow p-6 scale-hover">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-semibold custom-text-primary">Dirección de Entrega</h3>
                            <button id="edit-address-btn" class="custom-primary-bg text-white px-6 py-3 rounded-xl hover:custom-primary-dark-bg transition-colors font-medium">
                                <i class="fas fa-edit mr-2"></i>Editar Dirección
                            </button>
                        </div>
                        
                        <!-- Address Display -->
                        <div id="address-display" class="p-6 border custom-border rounded-2xl">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <div class="flex items-center space-x-3 mb-4">
                                        <div class="w-12 h-12 custom-primary-bg rounded-xl flex items-center justify-center">
                                            <i class="fas fa-home text-white"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-semibold custom-text-primary">Dirección Principal</h4>
                                            <span class="px-3 py-1 bg-green-100 text-green-800 text-sm rounded-lg font-medium">Activa</span>
                                        </div>
                                    </div>
                                    <div class="ml-15 space-y-2">
                                        <p class="custom-text-primary font-medium">María González</p>
                                        <p class="custom-text-secondary">Calle 123 #45-67, Apartamento 8B</p>
                                        <p class="custom-text-secondary">Bogotá, Colombia</p>
                                        <p class="custom-text-secondary">Código Postal: 110221</p>
                                        <p class="custom-text-secondary">+57 300 123 4567</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Address Form (Hidden by default) -->
                        <div id="address-form" class="hidden p-6 border custom-border rounded-2xl">
                            <form>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium custom-text-primary mb-2">Nombre Completo</label>
                                        <input type="text" value="María González" class="w-full px-4 py-3 border custom-border rounded-xl focus:border-blue-500 focus:outline-none transition-colors">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium custom-text-primary mb-2">Teléfono</label>
                                        <input type="text" value="+57 300 123 4567" class="w-full px-4 py-3 border custom-border rounded-xl focus:border-blue-500 focus:outline-none transition-colors">
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <label class="block text-sm font-medium custom-text-primary mb-2">Dirección Completa</label>
                                    <input type="text" value="Calle 123 #45-67, Apartamento 8B" class="w-full px-4 py-3 border custom-border rounded-xl focus:border-blue-500 focus:outline-none transition-colors">
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                    <div>
                                        <label class="block text-sm font-medium custom-text-primary mb-2">Ciudad</label>
                                        <input type="text" value="Bogotá" class="w-full px-4 py-3 border custom-border rounded-xl focus:border-blue-500 focus:outline-none transition-colors">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium custom-text-primary mb-2">Código Postal</label>
                                        <input type="text" value="110221" class="w-full px-4 py-3 border custom-border rounded-xl focus:border-blue-500 focus:outline-none transition-colors">
                                    </div>
                                </div>
                                <div class="flex justify-end space-x-4 mt-6">
                                    <button type="button" id="cancel-edit-btn" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors font-medium">
                                        Cancelar
                                    </button>
                                    <button type="button" id="save-address-btn" class="custom-primary-bg text-white px-6 py-3 rounded-xl hover:custom-primary-dark-bg transition-colors font-medium">
                                        <i class="fas fa-save mr-2"></i>Guardar Dirección
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>