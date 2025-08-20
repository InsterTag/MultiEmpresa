// Carrito de compras
class ShoppingCart {
    constructor() {
        this.items = JSON.parse(localStorage.getItem('cart')) || [];
        this.init();
        this.updateCartDisplay();
    }

    init() {
        // Event listeners para botones de agregar al carrito
        document.addEventListener('click', (e) => {
            if (e.target.closest('.add-to-cart')) {
                e.preventDefault();
                const button = e.target.closest('.add-to-cart');
                const productCard = button.closest('.product-card');
                this.addToCart(productCard);
            }
        });

        // Event listener para el botón flotante
        document.getElementById('floatingCartButton').addEventListener('click', () => {
            this.openModal();
        });

        // Event listeners para el modal
        document.getElementById('closeCartModal').addEventListener('click', () => {
            this.closeModal();
        });

        document.getElementById('cartModal').addEventListener('click', (e) => {
            if (e.target.id === 'cartModal') {
                this.closeModal();
            }
        });

        document.getElementById('continueShopping').addEventListener('click', () => {
            this.closeModal();
        });

        document.getElementById('clearCart').addEventListener('click', () => {
            this.clearCart();
        });

        document.getElementById('checkout').addEventListener('click', () => {
            this.redirectToCart();
        });

        // Event listener para cerrar notificación
        document.getElementById('closeNotification').addEventListener('click', () => {
            this.hideNotification();
        });

        // Cerrar modal con ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                this.closeModal();
                this.hideNotification();
            }
        });
    }

    addToCart(productCard) {
        const product = {
            id: productCard.dataset.id,
            name: productCard.dataset.name,
            description: productCard.dataset.description,
            price: parseFloat(productCard.dataset.price),
            image: productCard.dataset.image,
            quantity: 1
        };

        const existingItem = this.items.find(item => item.id === product.id);
        
        if (existingItem) {
            existingItem.quantity += 1;
            this.showNotification('¡Cantidad actualizada!', `Se agregó otra unidad de ${product.name}`, 'info');
        } else {
            this.items.push(product);
            this.showNotification('¡Producto agregado!', `${product.name} se agregó al carrito`, 'success');
        }

        this.saveCart();
        this.updateCartDisplay();
        this.animateAddToCart(productCard);
    }

    removeFromCart(productId) {
        const itemIndex = this.items.findIndex(item => item.id === productId);
        if (itemIndex > -1) {
            const removedItem = this.items[itemIndex];
            this.items.splice(itemIndex, 1);
            this.saveCart();
            this.updateCartDisplay();
            this.renderCartItems();
            this.showNotification('Producto eliminado', `${removedItem.name} fue eliminado del carrito`, 'warning');
        }
    }

    updateQuantity(productId, newQuantity) {
        const item = this.items.find(item => item.id === productId);
        if (item) {
            if (newQuantity <= 0) {
                this.removeFromCart(productId);
            } else {
                item.quantity = newQuantity;
                this.saveCart();
                this.updateCartDisplay();
                this.renderCartItems();
            }
        }
    }

    clearCart() {
        if (this.items.length === 0) return;
        
        if (confirm('¿Estás seguro de que quieres vaciar el carrito?')) {
            this.items = [];
            this.saveCart();
            this.updateCartDisplay();
            this.renderCartItems();
            this.showNotification('Carrito vaciado', 'Todos los productos fueron eliminados', 'info');
        }
    }

    saveCart() {
        localStorage.setItem('cart', JSON.stringify(this.items));
    }

    updateCartDisplay() {
        const itemCount = this.items.reduce((total, item) => total + item.quantity, 0);
        const subtotal = this.items.reduce((total, item) => total + (item.price * item.quantity), 0);

        // Actualizar badge del botón flotante
        const badge = document.getElementById('cartBadge');
        if (itemCount > 0) {
            badge.textContent = itemCount;
            badge.classList.remove('hidden');
        } else {
            badge.classList.add('hidden');
        }

        // Actualizar contador en el modal
        document.getElementById('cartItemsCount').textContent = `${itemCount} ${itemCount === 1 ? 'item' : 'items'}`;
        
        // Actualizar subtotal
        document.getElementById('cartSubtotal').textContent = `$${subtotal.toFixed(2)}`;

        // Mostrar/ocultar elementos según si hay items
        const emptyCart = document.getElementById('emptyCart');
        const cartFooter = document.getElementById('cartFooter');
        
        if (itemCount === 0) {
            emptyCart.style.display = 'block';
            cartFooter.style.display = 'none';
        } else {
            emptyCart.style.display = 'none';
            cartFooter.style.display = 'block';
        }
    }

    openModal() {
        document.getElementById('cartModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        this.renderCartItems();
    }

    closeModal() {
        document.getElementById('cartModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    renderCartItems() {
        const container = document.getElementById('cartItems');
        container.innerHTML = '';

        this.items.forEach(item => {
            const itemElement = document.createElement('div');
            itemElement.className = 'flex items-center gap-4 p-4 bg-gray-50 rounded-xl';
            itemElement.innerHTML = `
                <div class="flex-shrink-0">
                    ${item.image ? 
                        `<img src="${item.image}" alt="${item.name}" class="w-16 h-16 object-cover rounded-lg">` :
                        `<div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
                            <i class="fas fa-image text-gray-400"></i>
                        </div>`
                    }
                </div>
                <div class="flex-1">
                    <h3 class="font-semibold text-gray-800">${item.name}</h3>
                    <p class="text-sm text-gray-600">${item.description}</p>
                    <p class="text-lg font-bold text-blue-600">$${item.price.toFixed(2)}</p>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex items-center border rounded-lg">
                        <button class="quantity-btn px-3 py-1 hover:bg-gray-100 transition-colors" data-action="decrease" data-id="${item.id}">
                            <i class="fas fa-minus text-sm"></i>
                        </button>
                        <span class="px-4 py-1 font-semibold">${item.quantity}</span>
                        <button class="quantity-btn px-3 py-1 hover:bg-gray-100 transition-colors" data-action="increase" data-id="${item.id}">
                            <i class="fas fa-plus text-sm"></i>
                        </button>
                    </div>
                    <button class="remove-item text-red-500 hover:text-red-700 p-2" data-id="${item.id}">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            container.appendChild(itemElement);
        });

        // Event listeners para los botones de cantidad y eliminar
        container.addEventListener('click', (e) => {
            if (e.target.closest('.quantity-btn')) {
                const btn = e.target.closest('.quantity-btn');
                const action = btn.dataset.action;
                const productId = btn.dataset.id;
                const item = this.items.find(item => item.id === productId);
                
                if (action === 'increase') {
                    this.updateQuantity(productId, item.quantity + 1);
                } else if (action === 'decrease') {
                    this.updateQuantity(productId, item.quantity - 1);
                }
            }

            if (e.target.closest('.remove-item')) {
                const productId = e.target.closest('.remove-item').dataset.id;
                this.removeFromCart(productId);
            }
        });
    }

    showNotification(title, message, type = 'success') {
        const notification = document.getElementById('notification');
        const titleElement = document.getElementById('notificationTitle');
        const messageElement = document.getElementById('notificationMessage');
        
        titleElement.textContent = title;
        messageElement.textContent = message;
        
        // Cambiar colores según el tipo
        notification.className = notification.className.replace(/bg-\w+-500/, '');
        switch(type) {
            case 'success':
                notification.classList.add('bg-green-500');
                break;
            case 'warning':
                notification.classList.add('bg-orange-500');
                break;
            case 'error':
                notification.classList.add('bg-red-500');
                break;
            case 'info':
                notification.classList.add('bg-blue-500');
                break;
            default:
                notification.classList.add('bg-green-500');
        }
        
        // Mostrar notificación
        notification.classList.remove('translate-x-full');
        notification.classList.add('translate-x-0');
        
        // Ocultar automáticamente después de 3 segundos
        setTimeout(() => {
            this.hideNotification();
        }, 3000);
    }

    hideNotification() {
        const notification = document.getElementById('notification');
        notification.classList.remove('translate-x-0');
        notification.classList.add('translate-x-full');
    }

    animateAddToCart(productCard) {
        // Animación simple de feedback
        const button = productCard.querySelector('.add-to-cart');
        const originalText = button.innerHTML;
        
        button.innerHTML = '<i class="fas fa-check mr-2"></i> ¡Agregado!';
        button.classList.add('bg-green-500');
        button.classList.remove('bg-blue-500');
        
        setTimeout(() => {
            button.innerHTML = originalText;
            button.classList.remove('bg-green-500');
            button.classList.add('bg-blue-500');
        }, 1500);

        // Animación del botón flotante
        const floatingButton = document.getElementById('floatingCartButton');
        floatingButton.classList.add('animate-pulse');
        setTimeout(() => {
            floatingButton.classList.remove('animate-pulse');
        }, 1000);
    }

    redirectToCart() {
        if (this.items.length === 0) {
            this.showNotification('Carrito vacío', 'Agrega productos antes de proceder', 'warning');
            return;
        }

        // Redirigir a la vista personal del carrito de compras
        window.location.href = '/cart';
    }

    // Método para obtener el total del carrito (útil para otras funcionalidades)
    getTotal() {
        return this.items.reduce((total, item) => total + (item.price * item.quantity), 0);
    }

    // Método para obtener la cantidad total de items
    getTotalItems() {
        return this.items.reduce((total, item) => total + item.quantity, 0);
    }
}

// Funcionalidad de ordenamiento (del código original)
document.addEventListener('DOMContentLoaded', function() {
    // Inicializar carrito
    window.cart = new ShoppingCart();

    // Funcionalidad de ordenamiento
    const sortSelect = document.getElementById('sortSelect');
    const productsContainer = document.getElementById('productsContainer');

    if (sortSelect && productsContainer) {
        sortSelect.addEventListener('change', function() {
            const sortValue = this.value;
            const products = Array.from(productsContainer.children).filter(child => 
                child.classList.contains('product-card')
            );

            products.sort((a, b) => {
                switch(sortValue) {
                    case 'name':
                        return a.dataset.name.localeCompare(b.dataset.name);
                    case 'price-low':
                        return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
                    case 'price-high':
                        return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
                    case 'rating':
                        return parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating);
                    default:
                        return 0;
                }
            });

            // Reorganizar elementos en el DOM
            products.forEach(product => productsContainer.appendChild(product));
        });
    }
});

// Función para limpiar el carrito desde el exterior (útil para testing)
function clearCartFromConsole() {
    if (window.cart) {
        window.cart.clearCart();
    }
}