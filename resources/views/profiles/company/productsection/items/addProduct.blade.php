<!-- Add Product Section -->
 <div id="add-product" class="section-content hidden">
    <div class="glass-effect rounded-2xl p-6 animate-fade-in">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Agregar Nuevo Producto</h2>
        
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <!-- Basic Info -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-800 mb-2">Nombre del Producto *</label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                        placeholder="Ingrese el nombre del producto">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-800 mb-2">Código de Barras</label>
                    <input type="text" name="barcode"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                        placeholder="Código único del producto">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-800 mb-2">Precio *</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">$</span>
                    <input type="number" name="unit_price" required step="0.01" min="0" max="99999999.99"
                    class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                    placeholder="0.00">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-800 mb-2">Estado *</label>
                    <select name="state" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="available">Disponible</option>
                        <option value="unavailable">No disponible</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-800 mb-2">Descripción</label>
                <textarea name="description" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                    placeholder="Descripción detallada del producto"></textarea>
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-sm font-semibold text-gray-800 mb-2">Imagen del Producto</label>
                <input type="file" name="media" accept="image/*"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>

            <!-- Form Actions -->
            <div class="flex flex-col sm:flex-row gap-4 pt-6">
                <button type="submit"
                    class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-lg transition-colors">
                    <i class="fas fa-save mr-2"></i>
                    Guardar Producto
                </button>
                <button type="reset"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-lg transition-colors">
                    <i class="fas fa-times mr-2"></i>
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>