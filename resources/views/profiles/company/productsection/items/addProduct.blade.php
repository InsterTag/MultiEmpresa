<!-- Add Product Section -->
<div id="add-product" class="section-content hidden">
    <div class="glass-effect rounded-2xl p-6 animate-fade-in">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-plus-circle mr-3 text-blue-500"></i>Agregar Nuevo Producto
        </h2>
        
        <form id="productForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nombre -->
                <div>
                    <label class="block text-sm font-semibold mb-2 text-gray-700">
                        <i class="fas fa-tag mr-1 text-blue-400"></i>Nombre *
                    </label>
                    <input type="text" name="name" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                           placeholder="Ingrese el nombre del producto">
                    <p class="text-xs text-gray-500 mt-1">Ej: Camiseta de algodón premium</p>
                </div>

                <!-- Código de barras -->
                <div>
                    <label class="block text-sm font-semibold mb-2 text-gray-700">
                        <i class="fas fa-barcode mr-1 text-blue-400"></i>Código de Barras
                    </label>
                    <input type="text" name="barcode" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                           placeholder="Código único del producto">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Categorías -->
                <div>
                    <label class="block text-sm font-semibold mb-2 text-gray-700">
                        <i class="fas fa-folder mr-1 text-blue-400"></i>Categorías *
                    </label>
                    <select id="createCategories" name="categories[]" multiple required 
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
                    <div id="characteristics-wrapper" class="space-y-3 max-h-60 overflow-y-auto p-2 border border-gray-200 rounded-lg">
                        <div class="grid grid-cols-2 gap-3 characteristic-item bg-gray-50 p-3 rounded-lg relative">
                            <button type="button" onclick="removeCharacteristic(this)" class="absolute top-2 right-2 text-red-500 hover:text-red-700">
                                <i class="fas fa-times-circle"></i>
                            </button>
                            <input type="text" name="characteristics[0][name]" placeholder="Nombre" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-400">
                            <input type="text" name="characteristics[0][brand]" placeholder="Marca" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-400">
                            <input type="text" name="characteristics[0][model]" placeholder="Modelo" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-400">
                            <input type="text" name="characteristics[0][size]" placeholder="Tamaño" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-400">
                            <input type="text" name="characteristics[0][color]" placeholder="Color" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-400">
                            <input type="text" name="characteristics[0][material]" placeholder="Material" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-400">
                        </div>
                    </div>
                    <button type="button" onclick="addCharacteristic()" class="mt-3 px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors flex items-center">
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
                        <input type="number" step="0.01" min="0" name="unit_price" required 
                               class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                               placeholder="0.00">
                    </div>
                </div>

                <!-- Estado -->
                <div>
                    <label class="block text-sm font-semibold mb-2 text-gray-700">
                        <i class="fas fa-check-circle mr-1 text-blue-400"></i>Estado *
                    </label>
                    <select name="state" required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                        <option value="">Selecciona un estado</option>
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
                <textarea name="description" rows="3" 
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                          placeholder="Descripción detallada del producto..."></textarea>
            </div>

            <!-- Imagen -->
            <div>
                <label class="block text-sm font-semibold mb-2 text-gray-700">
                    <i class="fas fa-image mr-1 text-blue-400"></i>Imagen del Producto
                </label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center transition-colors hover:border-blue-400" 
                     id="dropZone">
                    <input type="file" name="media" accept="image/*" id="mediaInput" 
                           class="hidden">
                    <div class="flex flex-col items-center justify-center space-y-2">
                        <i class="fas fa-cloud-upload-alt text-3xl text-gray-400"></i>
                        <p class="text-sm text-gray-600">Haz clic o arrastra una imagen aquí</p>
                        <p class="text-xs text-gray-500">Formatos: JPG, PNG (Máx. 2MB)</p>
                    </div>
                </div>
                <div id="imagePreview" class="mt-3 hidden">
                    <p class="text-sm text-gray-600 mb-1">Vista previa:</p>
                    <img id="previewImg" class="h-32 object-contain border rounded-lg">
                </div>
            </div>

            <!-- Botones -->
            <div class="flex gap-4 pt-6 border-t border-gray-200">
                <button type="submit" class="flex-1 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors flex items-center justify-center">
                    <i class="fas fa-save mr-2"></i> Guardar Producto
                </button>
                <button type="reset" class="flex-1 px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg transition-colors flex items-center justify-center">
                    <i class="fas fa-times mr-2"></i> Limpiar Formulario
                </button>
            </div>
        </form>
    </div>
</div>

<!-- TomSelect CSS + JS -->
<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Inicializar TomSelect para categorías
    new TomSelect("#createCategories", {
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

    // Funcionalidad para subir imagen
    const dropZone = document.getElementById('dropZone');
    const mediaInput = document.getElementById('mediaInput');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');

    dropZone.addEventListener('click', () => {
        mediaInput.click();
    });

    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('border-blue-500', 'bg-blue-50');
    });

    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('border-blue-500', 'bg-blue-50');
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('border-blue-500', 'bg-blue-50');
        
        if (e.dataTransfer.files.length) {
            mediaInput.files = e.dataTransfer.files;
            previewImage(e.dataTransfer.files[0]);
        }
    });

    mediaInput.addEventListener('change', (e) => {
        if (e.target.files.length) {
            previewImage(e.target.files[0]);
        }
    });

    function previewImage(file) {
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImg.src = e.target.result;
                imagePreview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    }

    // Validación del formulario
    document.getElementById('productForm').addEventListener('submit', function(e) {
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

let charIndex = 1;
function addCharacteristic() {
    const wrapper = document.getElementById('characteristics-wrapper');
    const div = document.createElement('div');
    div.classList.add('grid', 'grid-cols-2', 'gap-3', 'characteristic-item', 'bg-gray-50', 'p-3', 'rounded-lg', 'relative');
    div.innerHTML = `
        <button type="button" onclick="removeCharacteristic(this)" class="absolute top-2 right-2 text-red-500 hover:text-red-700">
            <i class="fas fa-times-circle"></i>
        </button>
        <input type="text" name="characteristics[${charIndex}][name]" placeholder="Nombre" 
               class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-400">
        <input type="text" name="characteristics[${charIndex}][brand]" placeholder="Marca" 
               class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-400">
        <input type="text" name="characteristics[${charIndex}][model]" placeholder="Modelo" 
               class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-400">
        <input type="text" name="characteristics[${charIndex}][size]" placeholder="Tamaño" 
               class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-400">
        <input type="text" name="characteristics[${charIndex}][color]" placeholder="Color" 
               class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-400">
        <input type="text" name="characteristics[${charIndex}][material]" placeholder="Material" 
               class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-400">
    `;
    wrapper.appendChild(div);
    charIndex++;
    
    // Desplazarse al nuevo elemento
    div.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

function removeCharacteristic(button) {
    const characteristicItem = button.closest('.characteristic-item');
    if (document.querySelectorAll('.characteristic-item').length > 1) {
        characteristicItem.remove();
    } else {
        alert('Debe haber al menos una característica.');
    }
}
</script>

<style>
.glass-effect {
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.animate-fade-in {
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
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

#characteristics-wrapper::-webkit-scrollbar {
    width: 6px;
}

#characteristics-wrapper::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

#characteristics-wrapper::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 3px;
}

#characteristics-wrapper::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}
</style>