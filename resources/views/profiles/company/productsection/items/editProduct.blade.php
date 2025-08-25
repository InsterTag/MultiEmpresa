<!-- Modal para Editar Producto -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl max-w-4xl w-full max-h-[90vh] overflow-y-auto animate-scale-in">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-200">
                <h3 class="text-2xl font-bold text-gray-900 flex items-center">
                    <i class="fas fa-edit mr-3 text-blue-500"></i>Editar Producto
                </h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <form id="editForm" method="POST" enctype="multipart/form-data" action="{{ route('products.update', ['product' => '__ID__']) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nombre -->
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-gray-700">
                            <i class="fas fa-tag mr-1 text-blue-400"></i>Nombre *
                        </label>
                        <input type="text" id="editName" name="name" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                    </div>

                    <!-- Código de barras -->
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-gray-700">
                            <i class="fas fa-barcode mr-1 text-blue-400"></i>Código de Barras
                        </label>
                        <input type="text" id="editBarcode" name="barcode" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Categorías -->
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-gray-700">
                            <i class="fas fa-folder mr-1 text-blue-400"></i>Categorías *
                        </label>
                        <select id="editCategories" name="categories[]" multiple required 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <small class="text-gray-500 mt-1 block">
                            <i class="fas fa-info-circle mr-1"></i>Selecciona al menos una categoría
                        </small>
                    </div>

                    <!-- Características -->
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-gray-700">
                            <i class="fas fa-list-alt mr-1 text-blue-400"></i>Características
                        </label>
                        <div id="edit-characteristics-wrapper" class="space-y-3 max-h-60 overflow-y-auto p-2 border border-gray-200 rounded-lg bg-gray-50">
                            <!-- Las características se cargarán dinámicamente aquí -->
                        </div>
                        <button type="button" onclick="addEditCharacteristic()" class="mt-3 px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors flex items-center">
                            <i class="fas fa-plus mr-2"></i> Agregar característica
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Precio -->
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-gray-700">
                            <i class="fas fa-dollar-sign mr-1 text-blue-400"></i>Precio *
                        </label>
                        <div class="relative">
                            <span class="absolute left-3 top-3 text-gray-500">$</span>
                            <input type="number" step="0.01" min="0" id="editPrice" name="unit_price" required 
                                   class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                        </div>
                    </div>

                    <!-- Estado -->
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-gray-700">
                            <i class="fas fa-check-circle mr-1 text-blue-400"></i>Estado *
                        </label>
                        <select id="editState" name="state" required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                            <option value="available" class="text-green-600">Disponible</option>
                            <option value="unavailable" class="text-red-600">No disponible</option>
                        </select>
                    </div>
                </div>

                <!-- Descripción -->
                <div>
                    <label class="block text-sm font-semibold mb-2 text-gray-700">
                        <i class="fas fa-align-left mr-1 text-blue-400"></i>Descripción
                    </label>
                    <textarea id="editDescription" name="description" rows="3" 
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"></textarea>
                </div>

                <!-- Imagen -->
                <div>
                    <label class="block text-sm font-semibold mb-2 text-gray-700">
                        <i class="fas fa-image mr-1 text-blue-400"></i>Imagen del Producto
                    </label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center transition-colors hover:border-blue-400" 
                         id="editDropZone">
                        <input type="file" name="media" accept="image/*" id="editMediaInput" 
                               class="hidden">
                        <div class="flex flex-col items-center justify-center space-y-2">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400"></i>
                            <p class="text-sm text-gray-600">Haz clic o arrastra una imagen aquí</p>
                            <p class="text-xs text-gray-500">Formatos: JPG, PNG (Máx. 2MB)</p>
                        </div>
                    </div>
                    <div id="editImagePreview" class="mt-3">
                        <p class="text-sm text-gray-600 mb-1">Imagen actual:</p>
                        <img id="editPreviewImg" class="h-32 object-contain border rounded-lg">
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex gap-4 pt-6 border-t border-gray-200">
                    <button type="button" onclick="closeEditModal()" class="flex-1 px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg transition-colors flex items-center justify-center">
                        <i class="fas fa-times mr-2"></i> Cancelar
                    </button>
                    <button type="submit" class="flex-1 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors flex items-center justify-center">
                        <i class="fas fa-save mr-2"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- TomSelect CSS + JS -->
<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

<script>
// Variables globales
let editCharIndex = 0;
let editTomSelect = null;
let currentProductId = null;

document.addEventListener("DOMContentLoaded", function() {
    // Inicializar TomSelect para categorías
    editTomSelect = new TomSelect("#editCategories", {
        plugins: ['remove_button'],
        create: false,
        maxItems: null,
        placeholder: "Selecciona categorías...",
        render: {
            item: function(data, escape) {
                return '<div class="bg-blue-100 text-blue-800 px-2 py-1 rounded mr-1 mb-1">' + escape(data.text) + '</div>';
            }
        }
    });

    // Funcionalidad para subir imagen en edición
    const editDropZone = document.getElementById('editDropZone');
    const editMediaInput = document.getElementById('editMediaInput');
    const editPreviewImg = document.getElementById('editPreviewImg');

    editDropZone.addEventListener('click', () => {
        editMediaInput.click();
    });

    editDropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        editDropZone.classList.add('border-blue-500', 'bg-blue-50');
    });

    editDropZone.addEventListener('dragleave', () => {
        editDropZone.classList.remove('border-blue-500', 'bg-blue-50');
    });

    editDropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        editDropZone.classList.remove('border-blue-500', 'bg-blue-50');
        
        if (e.dataTransfer.files.length) {
            editMediaInput.files = e.dataTransfer.files;
            previewEditImage(e.dataTransfer.files[0]);
        }
    });

    editMediaInput.addEventListener('change', (e) => {
        if (e.target.files.length) {
            previewEditImage(e.target.files[0]);
        }
    });

    function previewEditImage(file) {
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = (e) => {
                editPreviewImg.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    // Validación del formulario de edición
    document.getElementById('editForm').addEventListener('submit', function(e) {
        let isValid = true;
        const requiredFields = this.querySelectorAll('[required]');
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('border-red-500');
                isValid = false;
            } else {
                field.classList.remove('border-red-500');
            }
        });

        if (!isValid) {
            e.preventDefault();
            alert('Por favor, complete todos los campos obligatorios.');
        }
    });
});

// Función para abrir el modal de edición con los datos del producto
function openEditModal(productId) {
    currentProductId = productId;
    
    // Resetear el formulario
    document.getElementById('editForm').reset();
    document.getElementById('edit-characteristics-wrapper').innerHTML = '';
    editCharIndex = 0;
    
    // Hacer una solicitud AJAX para obtener los datos del producto
    fetch(`/products/${productId}/edit`)
        .then(response => {
            if (!response.ok) throw new Error('Error al cargar el producto');
            return response.json();
        })
        .then(product => {
            // Actualizar el formulario con los datos del producto
            document.getElementById('editName').value = product.name;
            document.getElementById('editBarcode').value = product.barcode || '';
            document.getElementById('editPrice').value = product.unit_price;
            document.getElementById('editDescription').value = product.description || '';
            document.getElementById('editState').value = product.state;
            
            // Actualizar la acción del formulario con el ID correcto
            document.getElementById('editForm').action = document.getElementById('editForm').action.replace('__ID__', productId);
            
            // Cargar categorías seleccionadas
            if (editTomSelect) {
                editTomSelect.clear();
                if (product.categories && product.categories.length > 0) {
                    product.categories.forEach(category => {
                        editTomSelect.addItem(category.id);
                    });
                }
            }
            
            // Cargar características
            if (product.characteristics && product.characteristics.length > 0) {
                product.characteristics.forEach(char => {
                    addEditCharacteristic(char);
                });
            } else {
                addEditCharacteristic(); // Agregar una característica vacía por defecto
            }
            
            // Mostrar imagen actual si existe
            const editPreviewImg = document.getElementById('editPreviewImg');
            if (product.media) {
                editPreviewImg.src = `/storage/${product.media}`;
                editPreviewImg.classList.remove('hidden');
            } else {
                editPreviewImg.src = '';
                editPreviewImg.classList.add('hidden');
            }
            
            // Mostrar el modal
            document.getElementById('editModal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al cargar los datos del producto');
        });
}

// Función para cerrar el modal
function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
}

// Función para agregar campos de característica en edición
function addEditCharacteristic(characteristic = null) {
    const wrapper = document.getElementById('edit-characteristics-wrapper');
    const div = document.createElement('div');
    div.classList.add('grid', 'grid-cols-2', 'gap-3', 'characteristic-item', 'bg-white', 'p-3', 'rounded-lg', 'relative', 'border', 'border-gray-200');
    
    // Determinar valores o valores por defecto
    const nameValue = characteristic ? characteristic.name : '';
    const brandValue = characteristic ? characteristic.brand : '';
    const modelValue = characteristic ? characteristic.model : '';
    const sizeValue = characteristic ? characteristic.size : '';
    const colorValue = characteristic ? characteristic.color : '';
    const materialValue = characteristic ? characteristic.material : '';
    
    div.innerHTML = `
        <button type="button" onclick="removeEditCharacteristic(this)" class="absolute top-2 right-2 text-red-500 hover:text-red-700 transition-colors">
            <i class="fas fa-times-circle"></i>
        </button>
        <input type="text" name="characteristics[${editCharIndex}][name]" placeholder="Nombre" 
               value="${nameValue}" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-400 transition-all">
        <input type="text" name="characteristics[${editCharIndex}][brand]" placeholder="Marca" 
               value="${brandValue}" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-400 transition-all">
        <input type="text" name="characteristics[${editCharIndex}][model]" placeholder="Modelo" 
               value="${modelValue}" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-400 transition-all">
        <input type="text" name="characteristics[${editCharIndex}][size]" placeholder="Tamaño" 
               value="${sizeValue}" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-400 transition-all">
        <input type="text" name="characteristics[${editCharIndex}][color]" placeholder="Color" 
               value="${colorValue}" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-400 transition-all">
        <input type="text" name="characteristics[${editCharIndex}][material]" placeholder="Material" 
               value="${materialValue}" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-400 transition-all">
    `;
    wrapper.appendChild(div);
    editCharIndex++;
    
    // Desplazarse al nuevo elemento
    div.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

function removeEditCharacteristic(button) {
    const characteristicItem = button.closest('.characteristic-item');
    if (document.querySelectorAll('.characteristic-item').length > 1) {
        characteristicItem.remove();
    } else {
        alert('Debe haber al menos una característica.');
    }
}

// Cerrar modal con ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && !document.getElementById('editModal').classList.contains('hidden')) {
        closeEditModal();
    }
});
</script>

<style>
.animate-scale-in {
    animation: scaleIn 0.3s ease-out;
}

@keyframes scaleIn {
    from { 
        opacity: 0;
        transform: scale(0.95) translateY(-10px);
    }
    to { 
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

#edit-characteristics-wrapper::-webkit-scrollbar {
    width: 6px;
}

#edit-characteristics-wrapper::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

#edit-characteristics-wrapper::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 3px;
}

#edit-characteristics-wrapper::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

.ts-control {
    padding: 0.6rem 1rem;
    border: 1px solid #d1d5db;
    border-radius: 0.5rem;
}

.ts-dropdown {
    border: 1px solid #d1d5db;
    border-radius: 0.5rem;
}
</style>