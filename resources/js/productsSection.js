// Verificar que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {

    function initializeTabs() {
        const tabButtons = document.querySelectorAll('.tab-btn');
        const sectionContents = document.querySelectorAll('.section-content');
        
        if (tabButtons.length > 0 && sectionContents.length > 0) {
            console.log('✅ Sistema de tabs inicializado');
            
            // Función global para cambiar de sección
            window.showSection = function(sectionId) {
                try {
                    // Ocultar todas las secciones
                    sectionContents.forEach(section => {
                        section.classList.add('hidden');
                    });
                    
                    // Mostrar sección seleccionada
                    const targetSection = document.getElementById(sectionId);
                    if (targetSection) {
                        targetSection.classList.remove('hidden');
                    }
                    
                    // Actualizar botones de tab
                    tabButtons.forEach(btn => {
                        btn.classList.remove('active', 'bg-primary', 'text-white');
                        btn.classList.add('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
                    });
                    
                    // Activar tab seleccionado
                    const activeBtn = document.querySelector(`[data-tab="${sectionId}"]`);
                    if (activeBtn) {
                        activeBtn.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
                        activeBtn.classList.add('active', 'bg-primary', 'text-white');
                    }
                    
                } catch (error) {
                    console.error('Error al cambiar de sección:', error);
                }
            };
        }
    }

    function initializeLastUpdate() {
        const lastUpdateEl = document.getElementById('lastUpdate');
        
        if (lastUpdateEl) {
            try {
                const now = new Date();
                const timeString = now.toLocaleString('es-ES', {
                    day: '2-digit',
                    month: '2-digit', 
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });
                
                lastUpdateEl.textContent = timeString;
                console.log('✅ Timestamp de última actualización configurado');
                
            } catch (error) {
                console.error('Error al configurar timestamp:', error);
            }
        }
    }

    function initializeProductModals() {

        window.openViewModal = function(productId, name, barcode, category, price, stock, state, description, media) {
            try {
                const modal = document.getElementById('viewModal');
                if (!modal) {
                    console.warn('⚠️ Modal de vista no encontrado');
                    return;
                }
                
                // Llenar información básica
                const elements = {
                    viewName: document.getElementById('viewName'),
                    viewDescription: document.getElementById('viewDescription'),
                    viewBarcode: document.getElementById('viewBarcode'),
                    viewCategory: document.getElementById('viewCategory'),
                    viewPrice: document.getElementById('viewPrice'),
                    viewStock: document.getElementById('viewStock'),
                    viewImage: document.getElementById('viewImage'),
                    viewStatusContainer: document.getElementById('viewStatusContainer'),
                    viewEditBtn: document.getElementById('viewEditBtn')
                };
                
                // Verificar que todos los elementos existen
                const missingElements = Object.keys(elements).filter(key => !elements[key]);
                if (missingElements.length > 0) {
                    console.warn('⚠️ Elementos faltantes en modal de vista:', missingElements);
                    return;
                }
                
                // Llenar los campos
                elements.viewName.textContent = name || 'Sin nombre';
                elements.viewDescription.textContent = description || 'Sin descripción';
                elements.viewBarcode.textContent = barcode || 'N/A';
                elements.viewCategory.textContent = category || 'General';
                elements.viewPrice.textContent = `$${parseFloat(price || 0).toFixed(2)}`;
                elements.viewStock.textContent = stock || '0';
                
                // Mostrar imagen
                if (media) {
                    elements.viewImage.innerHTML = `
                        <img src="/storage/${media}" alt="${name}" class="w-full h-full object-cover rounded-lg">
                    `;
                } else {
                    elements.viewImage.innerHTML = `
                        <div class="w-full h-full flex items-center justify-center bg-gray-200 rounded-lg">
                            <i class="fas fa-image text-gray-400 text-4xl"></i>
                        </div>
                    `;
                }
                
                // Mostrar estado
                if (state === 'available') {
                    elements.viewStatusContainer.innerHTML = `
                        <span class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                            <i class="fas fa-check-circle mr-2"></i>
                            En Stock
                        </span>
                    `;
                } else {
                    elements.viewStatusContainer.innerHTML = `
                        <span class="inline-flex items-center px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm font-medium">
                            <i class="fas fa-times-circle mr-2"></i>
                            No Disponible
                        </span>
                    `;
                }
                
                // Configurar botón de editar
                elements.viewEditBtn.onclick = function() {
                    closeViewModal();
                    openEditModal(productId, name, barcode, category, price, stock, state, description, media);
                };
                
                // Mostrar modal
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                
                console.log('✅ Modal de vista abierto para producto:', name);
                
            } catch (error) {
                console.error('❌ Error al abrir modal de vista:', error);
            }
        };
        
        window.closeViewModal = function() {
            try {
                const modal = document.getElementById('viewModal');
                if (modal) {
                    modal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                    console.log('✅ Modal de vista cerrado');
                }
            } catch (error) {
                console.error('❌ Error al cerrar modal de vista:', error);
            }
        };
        
        window.openDeleteModal = function(productId, productName) {
            try {
                const modal = document.getElementById('deleteModal');
                const productSpan = document.getElementById('productToDelete');
                const deleteForm = document.getElementById('deleteForm');
                
                if (!modal || !productSpan || !deleteForm) {
                    console.warn('⚠️ Elementos del modal de eliminación no encontrados');
                    return;
                }
                
                productSpan.textContent = productName || 'Producto sin nombre';
                deleteForm.action = `/products/${productId}`;
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                
                console.log('✅ Modal de eliminación abierto para:', productName);
                
            } catch (error) {
                console.error('❌ Error al abrir modal de eliminación:', error);
            }
        };
        
        window.closeDeleteModal = function() {
            try {
                const modal = document.getElementById('deleteModal');
                if (modal) {
                    modal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                    console.log('✅ Modal de eliminación cerrado');
                }
            } catch (error) {
                console.error('❌ Error al cerrar modal de eliminación:', error);
            }
        };

        window.openEditModal = function(productId, name, barcode, categories, price, stock, state, description, media) {
    try {
        const modal           = document.getElementById('editModal');
        const form            = document.getElementById('editForm');
        const editName        = document.getElementById('editName');
        const editBarcode     = document.getElementById('editBarcode');
        const editCategories  = document.getElementById('editCategories');
        const editPrice       = document.getElementById('editPrice');
        const editState       = document.getElementById('editState');
        const editDescription = document.getElementById('editDescription');
        const currentImage    = document.getElementById('currentImage');

        if (!modal || !form) return;

        // 👉 Actualizamos la action del form con el ID del producto
        form.action = `/products/${productId}`;

        // 👉 Inputs básicos
        if (editName)        editName.value        = name || '';
        if (editBarcode)     editBarcode.value     = barcode || '';
        if (editPrice)       editPrice.value       = price ?? 0;
        if (editState)       editState.value       = state || 'available';
        if (editDescription) editDescription.value = description || '';

        // 👉 Categorías (TomSelect)
        if (editCategories && editCategories.tomselect) {
            editCategories.tomselect.clear();
            if (categories) {
                // si pasas un solo ID
                if (Array.isArray(categories)) {
                    categories.forEach(c => editCategories.tomselect.addItem(c));
                } else {
                    editCategories.tomselect.addItem(categories);
                }
            }
        }

        // 👉 Imagen actual
        if (currentImage) {
            currentImage.innerHTML = media
                ? `<div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                       <img src="${media.startsWith('http') ? media : '/storage/' + media}" 
                            alt="Imagen actual" 
                            class="w-16 h-16 object-cover rounded-lg">
                       <span class="text-sm text-gray-600">Imagen actual</span>
                   </div>`
                : '<p class="text-sm text-gray-500">Sin imagen actual</p>';
        }

        // 👉 Abrir modal
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';

    } catch (error) {
        console.error('❌ Error al abrir modal de edición:', error);
    }
};




        
        window.closeEditModal = function() {
            try {
                const modal = document.getElementById('editModal');
                if (modal) {
                    modal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                    console.log('✅ Modal de edición cerrado');
                }
            } catch (error) {
                console.error('❌ Error al cerrar modal de edición:', error);
            }
        };
        
        console.log('✅ Funciones de modales de productos inicializadas');
    }

    function initializeModalEventListeners() {
        
        // Cerrar modales al hacer clic fuera
        const modals = ['viewModal', 'deleteModal', 'editModal'];
        
        modals.forEach(modalId => {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        switch(modalId) {
                            case 'viewModal':
                                closeViewModal();
                                break;
                            case 'deleteModal':
                                closeDeleteModal();
                                break;
                            case 'editModal':
                                closeEditModal();
                                break;
                        }
                    }
                });
            }
        });
        
        // Cerrar modales con tecla Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeViewModal();
                closeDeleteModal();
                closeEditModal();
            }
        });
        
        console.log('✅ Event listeners para modales inicializados');
    }

    console.log('🚀 Iniciando script modular de productos...');
    
    // Inicializar todas las funcionalidades
    initializeTabs();
    initializeLastUpdate();
    initializeProductModals();
    initializeModalEventListeners();
    
    console.log('✅ Script modular de productos cargado completamente');
    
    // Hacer funciones disponibles globalmente para debugging
    window.ProductModals = {
        openViewModal: window.openViewModal,
        closeViewModal: window.closeViewModal,
        openDeleteModal: window.openDeleteModal,
        closeDeleteModal: window.closeDeleteModal,
        openEditModal: window.openEditModal,
        closeEditModal: window.closeEditModal,
        showSection: window.showSection
    };
});

// Función para debugging
function debugProductModals() {
    console.log('🔍 Estado de modales:', {
        viewModal: !!document.getElementById('viewModal'),
        deleteModal: !!document.getElementById('deleteModal'),
        editModal: !!document.getElementById('editModal'),
        tabButtons: document.querySelectorAll('.tab-btn').length,
        sectionContents: document.querySelectorAll('.section-content').length
    });
}

// Hacer disponible globalmente
window.debugProductModals = debugProductModals;