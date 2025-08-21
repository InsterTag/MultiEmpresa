@extends('layouts.app')
@section('content')
    @vite(['resources/css/home.css', 'resources/js/home.js'])

    <style>
/* CSS para el sistema de tabs */
.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
}

.tab-button.active {
    background-color: var(--primary-color, #3b82f6) !important;
    color: white !important;
}

.tab-button:not(.active) {
    background-color: transparent;
    color: var(--text-secondary, #6b7280);
}

.tab-button:not(.active):hover {
    background-color: var(--hover-bg, #f3f4f6);
}

.product-image {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
}

.empty-cart-animation {
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<!-- Main Content -->
<div class="min-h-screen custom-bg-light py-8">
    <div class="container mx-auto px-4 max-w-7xl">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold custom-text-primary mb-2">Carrito de Compras</h1>
            <p class="custom-text-secondary">Revisa y gestiona los productos de tu carrito</p>
        </div>

        <!-- Navigation Tabs -->
        <div class="mb-8">
            <div class="flex space-x-1 p-1 custom-bg-white rounded-lg shadow-sm custom-border border">
                <button class="tab-button flex-1 py-3 px-6 rounded-md font-medium transition-all duration-200 text-center active" data-tab="cart">
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.2-5M7 13l-2.3 2.3A1 1 0 005 16h14M7 13v6a2 2 0 002 2h6a2 2 0 002-2v-6"></path>
                        </svg>
                        Mi Carrito (<span id="cart-count">0</span>)
                    </span>
                </button>
                <button class="tab-button flex-1 py-3 px-6 rounded-md font-medium transition-all duration-200 text-center custom-text-secondary hover:custom-hover-bg" data-tab="shipping">
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        Envío
                    </span>
                </button>
                <button class="tab-button flex-1 py-3 px-6 rounded-md font-medium transition-all duration-200 text-center custom-text-secondary hover:custom-hover-bg" data-tab="payment">
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                        Pago
                    </span>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content Area -->
            <div class="lg:col-span-2">
                <!-- Cart Tab Content -->
                <div id="cart-content" class="tab-content active">
                    <div class="custom-bg-white rounded-lg shadow-sm p-6 custom-border border">
                        <!-- Empty Cart State -->
                        <div id="empty-cart" class="text-center py-12 empty-cart-animation" style="display: none;">
                            <svg class="mx-auto h-16 w-16 custom-text-secondary mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.2-5M7 13l-2.3 2.3A1 1 0 005 16h14M7 13v6a2 2 0 002 2h6a2 2 0 002-2v-6"></path>
                            </svg>
                            <h3 class="text-lg font-medium custom-text-primary mb-2">Tu carrito está vacío</h3>
                            <p class="custom-text-secondary mb-6">Agrega algunos productos para comenzar tu compra</p>
                            <a href="{{ route('products.index') }}" class="custom-primary-bg text-white px-6 py-3 rounded-lg font-medium hover:custom-primary-dark-bg transition-colors inline-block">
                                Ver productos
                            </a>
                        </div>

                        <!-- Cart Items Container -->
                        <div id="cart-items-container">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-xl font-semibold custom-text-primary">Productos en tu carrito</h2>
                                <span class="custom-text-secondary text-sm" id="items-count">0 productos</span>
                            </div>

                            <!-- Cart Items will be populated by JavaScript -->
                            <div id="cart-items" class="space-y-6">
                                <!-- Items will be added here dynamically -->
                            </div>

                            <!-- Cart Actions -->
                            <div class="flex items-center justify-between mt-8 pt-6 border-t custom-border">
                                <a href="{{ route('products.index') }}" class="flex items-center custom-text-secondary hover:custom-primary transition-colors">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                    Continuar comprando
                                </a>
                                <button id="clear-cart" class="custom-primary-bg text-white px-6 py-3 rounded-lg font-medium hover:custom-primary-dark-bg transition-colors">
                                    Vaciar carrito
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shipping Tab Content -->
                <div id="shipping-content" class="tab-content">
                    <div class="custom-bg-white rounded-lg shadow-sm p-6 custom-border border">
                        <h2 class="text-xl font-semibold custom-text-primary mb-6">Información de Envío</h2>
                        
                        <form class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium custom-text-primary mb-2">Nombre completo</label>
                                    <input type="text" class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors" placeholder="Tu nombre completo">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium custom-text-primary mb-2">Teléfono</label>
                                    <input type="tel" class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors" placeholder="Tu número de teléfono">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium custom-text-primary mb-2">Dirección completa</label>
                                <input type="text" class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors" placeholder="Calle, número, colonia">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label class="block text-sm font-medium custom-text-primary mb-2">Ciudad</label>
                                    <input type="text" class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors" placeholder="Tu ciudad">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium custom-text-primary mb-2">Estado</label>
                                    <select class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors custom-text-primary">
                                        <option value="">Selecciona estado</option>
                                        <option value="cdmx">Ciudad de México</option>
                                        <option value="jalisco">Jalisco</option>
                                        <option value="nuevo-leon">Nuevo León</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium custom-text-primary mb-2">Código Postal</label>
                                    <input type="text" class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors" placeholder="12345">
                                </div>
                            </div>

                            <!-- Shipping Options -->
                            <div class="mt-8">
                                <h3 class="text-lg font-medium custom-text-primary mb-4">Opciones de envío</h3>
                                <div class="space-y-4">
                                    <div class="flex items-center p-4 custom-border border rounded-lg hover:custom-hover-bg transition-colors cursor-pointer">
                                        <input type="radio" name="shipping" value="standard" class="mr-4" checked>
                                        <div class="flex-1">
                                            <div class="flex justify-between items-center">
                                                <span class="font-medium custom-text-primary">Envío estándar</span>
                                                <span class="custom-text-primary font-semibold">Gratis</span>
                                            </div>
                                            <p class="custom-text-secondary text-sm mt-1">5-7 días hábiles</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-4 custom-border border rounded-lg hover:custom-hover-bg transition-colors cursor-pointer">
                                        <input type="radio" name="shipping" value="express" class="mr-4">
                                        <div class="flex-1">
                                            <div class="flex justify-between items-center">
                                                <span class="font-medium custom-text-primary">Envío express</span>
                                                <span class="custom-text-primary font-semibold">$99.00</span>
                                            </div>
                                            <p class="custom-text-secondary text-sm mt-1">2-3 días hábiles</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Payment Tab Content -->
                <div id="payment-content" class="tab-content">
                    <div class="custom-bg-white rounded-lg shadow-sm p-6 custom-border border">
                        <h2 class="text-xl font-semibold custom-text-primary mb-6">Método de Pago</h2>
                        
                        <div class="space-y-6">
                            <!-- Payment Methods -->
                            <div class="space-y-4">
                                <div class="flex items-center p-4 custom-border border rounded-lg hover:custom-hover-bg transition-colors cursor-pointer">
                                    <input type="radio" name="payment" value="card" class="mr-4" checked>
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 mr-3 custom-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                        </svg>
                                        <span class="font-medium custom-text-primary">Tarjeta de crédito/débito</span>
                                    </div>
                                </div>
                                <div class="flex items-center p-4 custom-border border rounded-lg hover:custom-hover-bg transition-colors cursor-pointer">
                                    <input type="radio" name="payment" value="paypal" class="mr-4">
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 mr-3 custom-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="font-medium custom-text-primary">PayPal</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Details Form -->
                            <div id="card-form" class="mt-6 space-y-4">
                                <div>
                                    <label class="block text-sm font-medium custom-text-primary mb-2">Número de tarjeta</label>
                                    <input type="text" class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors" placeholder="1234 5678 9012 3456">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium custom-text-primary mb-2">Fecha de expiración</label>
                                        <input type="text" class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors" placeholder="MM/YY">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium custom-text-primary mb-2">CVV</label>
                                        <input type="text" class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors" placeholder="123">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium custom-text-primary mb-2">Nombre en la tarjeta</label>
                                    <input type="text" class="w-full px-4 py-3 custom-border border rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-colors" placeholder="Nombre como aparece en la tarjeta">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary Sidebar -->
            <div class="lg:col-span-1">
                <div class="custom-bg-white rounded-lg shadow-sm p-6 custom-border border sticky top-8">
                    <h3 class="text-lg font-semibold custom-text-primary mb-4">Resumen del pedido</h3>
                    
                    <div id="summary-content">
                        <div class="space-y-3 mb-4">
                            <div class="flex justify-between custom-text-secondary text-sm">
                                <span>Subtotal (<span id="summary-items">0</span> productos)</span>
                                <span id="subtotal-amount">$0.00</span>
                            </div>
                            <div class="flex justify-between custom-text-secondary text-sm">
                                <span>Envío</span>
                                <span id="shipping-cost">Gratis</span>
                            </div>
                            <div class="flex justify-between custom-text-secondary text-sm">
                                <span>Impuestos (8%)</span>
                                <span id="tax-amount">$0.00</span>
                            </div>
                        </div>
                        
                        <div class="border-t custom-border pt-4 mb-6">
                            <div class="flex justify-between text-lg font-semibold custom-text-primary">
                                <span>Total</span>
                                <span id="total-amount">$0.00</span>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <button id="checkout-btn" class="w-full custom-primary-bg text-white py-4 rounded-lg font-medium text-lg hover:custom-primary-dark-bg transition-colors mb-4" disabled>
                            Finalizar compra
                        </button>
                    </div>

                    <div id="empty-summary" class="text-center py-8" style="display: none;">
                        <p class="custom-text-secondary">No hay productos en el carrito</p>
                    </div>

                    <!-- Guarantee -->
                    <div class="text-center">
                        <div class="flex items-center justify-center mb-2">
                            <svg class="w-4 h-4 custom-accent mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm custom-text-secondary">Garantía de devolución 30 días</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript para funcionalidad del carrito -->
<script>
class CartManager {
    constructor() {
        this.items = JSON.parse(localStorage.getItem('cart')) || [];
        this.init();
    }

    init() {
        this.setupEventListeners();
        this.updateDisplay();
        this.renderCartItems();
    }

    setupEventListeners() {
        // Tab functionality
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetTab = button.getAttribute('data-tab');
                
                // Update buttons
                tabButtons.forEach(btn => {
                    btn.classList.remove('active');
                    btn.style.backgroundColor = '';
                    btn.style.color = '';
                });
                
                // Update content
                tabContents.forEach(content => content.classList.remove('active'));
                
                button.classList.add('active');
                button.style.backgroundColor = 'var(--primary-color)';
                button.style.color = 'white';
                
                document.getElementById(targetTab + '-content').classList.add('active');
            });
        });

        // Clear cart button
        document.getElementById('clear-cart').addEventListener('click', () => {
            if (confirm('¿Estás seguro de que quieres vaciar el carrito?')) {
                this.clearCart();
            }
        });

        // Checkout button
        document.getElementById('checkout-btn').addEventListener('click', () => {
            alert('Funcionalidad de checkout en desarrollo');
        });

        // Payment method toggle
        const paymentRadios = document.querySelectorAll('input[name="payment"]');
        const cardForm = document.getElementById('card-form');
        
        paymentRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                cardForm.style.display = this.value === 'card' ? 'block' : 'none';
            });
        });
    }

    updateQuantity(productId, newQuantity) {
        const item = this.items.find(item => item.id === productId);
        if (item) {
            if (newQuantity <= 0) {
                this.removeItem(productId);
            } else {
                item.quantity = newQuantity;
                this.saveCart();
                this.updateDisplay();
                this.renderCartItems();
            }
        }
    }

    removeItem(productId) {
        this.items = this.items.filter(item => item.id !== productId);
        this.saveCart();
        this.updateDisplay();
        this.renderCartItems();
    }

    clearCart() {
        this.items = [];
        this.saveCart();
        this.updateDisplay();
        this.renderCartItems();
    }

    saveCart() {
        localStorage.setItem('cart', JSON.stringify(this.items));
    }

    updateDisplay() {
        const totalItems = this.items.reduce((sum, item) => sum + item.quantity, 0);
        const subtotal = this.items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        const shipping = subtotal > 100 ? 0 : 10; // Free shipping over $100
        const tax = subtotal * 0.08; // 8% tax
        const total = subtotal + shipping + tax;

        // Update cart count
        document.getElementById('cart-count').textContent = totalItems;
        document.getElementById('items-count').textContent = `${totalItems} ${totalItems === 1 ? 'producto' : 'productos'}`;

        // Update summary
        document.getElementById('summary-items').textContent = totalItems;
        document.getElementById('subtotal-amount').textContent = `$${subtotal.toFixed(2)}`;
        document.getElementById('shipping-cost').textContent = shipping > 0 ? `$${shipping.toFixed(2)}` : 'Gratis';
        document.getElementById('tax-amount').textContent = `$${tax.toFixed(2)}`;
        document.getElementById('total-amount').textContent = `$${total.toFixed(2)}`;

        // Show/hide empty states
        const isEmpty = this.items.length === 0;
        document.getElementById('empty-cart').style.display = isEmpty ? 'block' : 'none';
        document.getElementById('cart-items-container').style.display = isEmpty ? 'none' : 'block';
        document.getElementById('summary-content').style.display = isEmpty ? 'none' : 'block';
        document.getElementById('empty-summary').style.display = isEmpty ? 'block' : 'none';
        
        // Enable/disable checkout button
        document.getElementById('checkout-btn').disabled = isEmpty;
    }

    renderCartItems() {
        const container = document.getElementById('cart-items');
        container.innerHTML = '';

        this.items.forEach(item => {
            const itemElement = document.createElement('div');
            itemElement.className = 'flex items-center space-x-4 pb-6 border-b custom-border';
            
            itemElement.innerHTML = `
                <div class="w-20 h-20 custom-bg-light rounded-lg flex items-center justify-center overflow-hidden">
                    ${item.image ? 
                        `<img src="${item.image}" alt="${item.name}" class="product-image">` :
                        `<svg class="w-8 h-8 custom-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>`
                    }
                </div>
                
                <div class="flex-1 min-w-0">
                    <h3 class="font-medium custom-text-primary">${item.name}</h3>
                    ${item.description ? `<p class="custom-text-secondary text-sm mt-1">${item.description.substring(0, 60)}...</p>` : ''}
                    <div class="flex items-center mt-2">
                        <span class="text-lg font-semibold custom-primary">$${item.price.toFixed(2)}</span>
                    </div>
                </div>
                
                <div class="flex items-center space-x-3">
                    <div class="flex items-center custom-border border rounded-lg">
                        <button class="quantity-btn p-2 hover:custom-hover-bg rounded-l-lg transition-colors" data-action="decrease" data-id="${item.id}">
                            <svg class="w-4 h-4 custom-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                            </svg>
                        </button>
                        <span class="quantity-display w-16 py-2 text-center custom-text-primary">${item.quantity}</span>
                        <button class="quantity-btn p-2 hover:custom-hover-bg rounded-r-lg transition-colors" data-action="increase" data-id="${item.id}">
                            <svg class="w-4 h-4 custom-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </button>
                    </div>
                    <button class="remove-btn p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors" data-id="${item.id}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </div>
            `;

            // Add event listeners for this item
            const quantityBtns = itemElement.querySelectorAll('.quantity-btn');
            const removeBtn = itemElement.querySelector('.remove-btn');

            quantityBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const action = btn.dataset.action;
                    const productId = btn.dataset.id;
                    const currentItem = this.items.find(item => item.id === productId);
                    
                    if (action === 'increase') {
                        this.updateQuantity(productId, currentItem.quantity + 1);
                    } else if (action === 'decrease') {
                        this.updateQuantity(productId, currentItem.quantity - 1);
                    }
                });
            });

            removeBtn.addEventListener('click', () => {
                const productId = removeBtn.dataset.id;
                if (confirm('¿Estás seguro de que quieres eliminar este producto?')) {
                    this.removeItem(productId);
                }
            });

            container.appendChild(itemElement);
        });
    }
}

// Initialize cart when page loads
document.addEventListener('DOMContentLoaded', function() {
    window.cartManager = new CartManager();
});
</script>

@endsection