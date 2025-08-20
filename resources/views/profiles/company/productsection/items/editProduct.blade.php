<!-- Modal para Editar Producto -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white rounded-2xl shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-gray-900">Editar Producto</h3>
                    <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <form id="editForm" method="POST" enctype="multipart/form-data" action="{{ route('products.update', ['product' => '__ID__']) }}">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Nombre -->
                        <div>
                            <label class="block text-sm font-semibold mb-2">Nombre *</label>
                            <input type="text" id="editName" name="name" required class="w-full px-4 py-2 border rounded-lg">
                        </div>

                        <!-- Código de barras -->
                        <div>
                            <label class="block text-sm font-semibold mb-2">Código de Barras</label>
                            <input type="text" id="editBarcode" name="barcode" class="w-full px-4 py-2 border rounded-lg">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Categorías -->
                        <div>
                            <label class="block text-sm font-semibold mb-2">Categorías *</label>
                            <select id="editCategories" name="categories[]" multiple class="w-full px-4 py-2 border rounded-lg">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <small class="text-gray-500">Puedes seleccionar una o varias categorías</small>
                        </div>

                        <!-- Características -->
                        <div>
                            <label class="block text-sm font-semibold mb-2">Características</label>
                            <select id="editCharacteristics" name="characteristics[]" multiple class="w-full px-4 py-2 border rounded-lg">
                                @foreach($characteristics as $characteristic)
                                <option value="{{ $characteristic->id }}">{{ $characteristic->name }}</option>
                                @endforeach
                            </select>
                            <small class="text-gray-500">Puedes agregar más de una característica</small>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Precio -->
                        <div>
                            <label class="block text-sm font-semibold mb-2">Precio *</label>
                            <input type="number" step="0.01" id="editPrice" name="unit_price" required class="w-full px-4 py-2 border rounded-lg">
                        </div>

                        <!-- Estado -->
                        <div>
                            <label class="block text-sm font-semibold mb-2">Estado *</label>
                            <select id="editState" name="state" required class="w-full px-4 py-2 border rounded-lg">
                                <option value="available">Disponible</option>
                                <option value="unavailable">No disponible</option>
                            </select>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="mt-4">
                        <label class="block text-sm font-semibold mb-2">Descripción</label>
                        <textarea id="editDescription" name="description" rows="3" class="w-full px-4 py-2 border rounded-lg"></textarea>
                    </div>

                    <!-- Imagen -->
                    <div class="mt-4">
                        <label class="block text-sm font-semibold mb-2">Imagen</label>
                        <input type="file" name="media" accept="image/*" class="w-full px-4 py-2 border rounded-lg">
                        <div id="currentImage" class="mt-2"></div>
                    </div>

                    <!-- Botones -->
                    <div class="flex gap-3 pt-4">
                        <button type="button" onclick="closeEditModal()" class="flex-1 px-4 py-2 bg-gray-100 text-gray-800 rounded-lg">Cancelar</button>
                        <button type="submit" class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- TomSelect CSS + JS -->
<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // categorías multiselect
    new TomSelect("#editCategories", {
        plugins: ['remove_button'],
        create: false,
        maxItems: null,
        placeholder: "Selecciona categorías..."
    });

    // características multiselect
    new TomSelect("#editCharacteristics", {
        plugins: ['remove_button'],
        create: false,
        maxItems: null,
        placeholder: "Selecciona características..."
    });
});
</script>
