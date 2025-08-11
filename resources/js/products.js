// Script para productos
(function() {
    // Datos de ejemplo de productos
    const products = [

            {

                id: 1,

                name: "Smart TV Samsung 55\"",

                description: "Televisor inteligente con resolución 4K y tecnología HDR",

                barcode: "8801643659851",

                price: 899.99,

                image: "https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=400&h=300&fit=crop",

                rating: 4.5,

                reviews: 127,

                category: "electrodomesticos",

                subcategories: { marca: "Samsung", tamaño: "Grande" }

            },

            {

                id: 2,

                name: "iPhone 14 Pro",

                description: "Smartphone con cámara profesional y chip A16 Bionic",

                barcode: "194253777281",

                price: 1099.99,

                image: "https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=400&h=300&fit=crop",

                rating: 4.8,

                reviews: 89,

                category: "tecnologia",

                subcategories: { marca: "Apple", almacenamiento: "128GB" }

            },

            {

                id: 3,

                name: "Camiseta Básica",

                description: "Camiseta de algodón 100% en varios colores",

                barcode: "1234567890123",

                price: 24.99,

                image: "https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=400&h=300&fit=crop",

                rating: 4.2,

                reviews: 45,

                category: "ropa",

                subcategories: { talla: "M", color: "Azul" }

            },

            {

                id: 4,

                name: "Refrigerador LG",

                description: "Refrigerador de dos puertas con dispensador de agua",

                barcode: "8801031234567",

                price: 1299.99,

                image: "https://images.unsplash.com/photo-1586030069441-d3c888746f4e?w=400&h=300&fit=crop",

                rating: 4.6,

                reviews: 67,

                category: "electrodomesticos",

                subcategories: { marca: "LG", tamaño: "Grande" }

            },

            {

                id: 5,

                name: "Audífonos Sony WH-1000XM4",

                description: "Audífonos inalámbricos con cancelación de ruido",

                barcode: "4548736112459",

                price: 349.99,

                image: "https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&h=300&fit=crop",

                rating: 4.7,

                reviews: 234,

                category: "tecnologia",

                subcategories: { marca: "Sony" }

            },

            {

                id: 6,

                name: "Jeans Clásicos",

                description: "Jeans de mezclilla con corte recto",

                barcode: "7890123456789",

                price: 79.99,

                image: "https://images.unsplash.com/photo-1542272604-787c3835535d?w=400&h=300&fit=crop",

                rating: 4.0,

                reviews: 28,

                category: "ropa",

                subcategories: { talla: "M", color: "Azul" }

            },

            {

                id: 7,

                name: "Microondas Samsung",

                description: "Horno microondas de 0.7 pies cúbicos",

                barcode: "8801643789456",

                price: 179.99,

                image: "https://images.unsplash.com/photo-1574269909862-7e1d70bb8078?w=400&h=300&fit=crop",

                rating: 4.3,

                reviews: 56,

                category: "electrodomesticos",

                subcategories: { marca: "Samsung", tamaño: "Mediano" }

            },

            {

                id: 8,

                name: "Zapatos Deportivos",

                description: "Calzado deportivo cómodo para correr",

                barcode: "6543210987654",

                price: 129.99,

                image: "https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&h=300&fit=crop",

                rating: 4.4,

                reviews: 112,

                category: "ropa",

                subcategories: { talla: "M", color: "Rojo" }

            },

            {

                id: 9,

                name: "MacBook Pro 13\"",

                description: "Laptop profesional con chip M2 y pantalla Retina",

                barcode: "194253164529",

                price: 1499.99,

                image: "https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=400&h=300&fit=crop",

                rating: 4.9,

                reviews: 156,

                category: "tecnologia",

                subcategories: { marca: "Apple", almacenamiento: "256GB" }

            },

            {

                id: 10,

                name: "Vestido Elegante",

                description: "Vestido negro elegante para ocasiones especiales",

                barcode: "9876543210987",

                price: 89.99,

                image: "https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?w=400&h=300&fit=crop",

                rating: 4.6,

                reviews: 73,

                category: "ropa",

                subcategories: { talla: "S", color: "Negro" }

            },

            {

                id: 11,

                name: "Lavadora LG 18kg",

                description: "Lavadora automática de gran capacidad con tecnología TurboWash",

                barcode: "8801031987654",

                price: 899.99,

                image: "https://images.unsplash.com/photo-1610557892975-27fabc1b7da8?w=400&h=300&fit=crop",

                rating: 4.4,

                reviews: 92,

                category: "electrodomesticos",

                subcategories: { marca: "LG", tamaño: "Grande" }

            },

            {

                id: 12,

                name: "PlayStation 5",

                description: "Consola de videojuegos de última generación con SSD ultrarrápido",

                barcode: "4948872415019",

                price: 699.99,

                image: "https://images.unsplash.com/photo-1606813907291-d86efa9b94db?w=400&h=300&fit=crop",

                rating: 4.8,

                reviews: 445,

                category: "tecnologia",

                subcategories: { marca: "Sony", almacenamiento: "825GB" }

            },

            {

                id: 13,

                name: "Chaqueta de Cuero",

                description: "Chaqueta de cuero genuino estilo motociclista",

                barcode: "5432109876543",

                price: 199.99,

                image: "https://images.unsplash.com/photo-1551028719-00167b16eac5?w=400&h=300&fit=crop",

                rating: 4.7,

                reviews: 38,

                category: "ropa",

                subcategories: { talla: "L", color: "Negro" }

            },

            {

                id: 14,

                name: "Aire Acondicionado Samsung",

                description: "Aire acondicionado split 18000 BTU con control remoto",

                barcode: "8801643456789",

                price: 649.99,

                image: "https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?w=400&h=300&fit=crop",

                rating: 4.3,

                reviews: 84,

                category: "electrodomesticos",

                subcategories: { marca: "Samsung", tamaño: "Grande" }

            },

            {

                id: 15,

                name: "Nintendo Switch OLED",

                description: "Consola híbrida con pantalla OLED de 7 pulgadas",

                barcode: "0045496596682",

                price: 349.99,

                image: "https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=300&fit=crop",

                rating: 4.6,

                reviews: 278,

                category: "tecnologia",

                subcategories: { marca: "Nintendo", almacenamiento: "64GB" }

            },

            {

                id: 16,

                name: "Blusa Floral",

                description: "Blusa de manga corta con estampado floral primaveral",

                barcode: "3456789012345",

                price: 34.99,

                image: "https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=400&h=300&fit=crop",

                rating: 4.1,

                reviews: 29,

                category: "ropa",

                subcategories: { talla: "M", color: "Rosa" }

            },

            {

                id: 17,

                name: "Licuadora Oster",

                description: "Licuadora de 3 velocidades con jarra de vidrio",

                barcode: "2109876543210",

                price: 79.99,

                image: "https://images.unsplash.com/photo-1585515656901-f7de2474f8c9?w=400&h=300&fit=crop",

                rating: 4.2,

                reviews: 67,

                category: "electrodomesticos",

                subcategories: { marca: "Oster", tamaño: "Mediano" }

            },

            {

                id: 18,

                name: "iPad Air",

                description: "Tablet de 10.9 pulgadas con chip M1 y pantalla Liquid Retina",

                barcode: "194252701546",

                price: 749.99,

                image: "https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=400&h=300&fit=crop",

                rating: 4.7,

                reviews: 189,

                category: "tecnologia",

                subcategories: { marca: "Apple", almacenamiento: "256GB" }

            },

            {

                id: 19,

                name: "Pantalón Formal",

                description: "Pantalón de vestir clásico para oficina",

                barcode: "6789012345678",

                price: 59.99,

                image: "https://images.unsplash.com/photo-1473966968600-fa801b869a1a?w=400&h=300&fit=crop",

                rating: 4.0,

                reviews: 41,

                category: "ropa",

                subcategories: { talla: "L", color: "Gris" }

            },

            {

                id: 20,

                name: "Aspiradora Dyson V15",

                description: "Aspiradora inalámbrica con tecnología de detección láser",

                barcode: "5025155045354",

                price: 699.99,

                image: "https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=300&fit=crop",

                rating: 4.8,

                reviews: 152,

                category: "electrodomesticos",

                subcategories: { marca: "Dyson", tamaño: "Mediano" }

            },

            {

                id: 21,

                name: "Samsung Galaxy S23",

                description: "Smartphone Android con cámara de 200MP y pantalla Dynamic AMOLED",

                barcode: "8801643879012",

                price: 899.99,

                image: "https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=400&h=300&fit=crop",

                rating: 4.5,

                reviews: 203,

                category: "tecnologia",

                subcategories: { marca: "Samsung", almacenamiento: "256GB" }

            },

            {

                id: 22,

                name: "Suéter de Lana",

                description: "Suéter tejido de lana merino para invierno",

                barcode: "7890123456780",

                price: 119.99,

                image: "https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=400&h=300&fit=crop",

                rating: 4.4,

                reviews: 56,

                category: "ropa",

                subcategories: { talla: "M", color: "Beige" }

            },

            {

                id: 23,

                name: "Cafetera Nespresso",

                description: "Máquina de café espresso con sistema de cápsulas",

                barcode: "7630039278205",

                price: 199.99,

                image: "https://images.unsplash.com/photo-1559056199-641a0ac8b55e?w=400&h=300&fit=crop",

                rating: 4.6,

                reviews: 145,

                category: "electrodomesticos",

                subcategories: { marca: "Nespresso", tamaño: "Mediano" }

            },

            {

                id: 24,

                name: "AirPods Pro",

                description: "Auriculares inalámbricos con cancelación activa de ruido",

                barcode: "194252158678",

                price: 249.99,

                image: "https://images.unsplash.com/photo-1588423771073-b8903fbb85b5?w=400&h=300&fit=crop",

                rating: 4.7,

                reviews: 312,

                category: "tecnologia",

                subcategories: { marca: "Apple" }

            },

            {

                id: 25,

                name: "Falda Plisada",

                description: "Falda midi plisada perfecta para look casual-elegante",

                barcode: "8901234567890",

                price: 49.99,

                image: "https://images.unsplash.com/photo-1583496661160-fb5886a13d24?w=400&h=300&fit=crop",

                rating: 4.2,

                reviews: 33,

                category: "ropa",

                subcategories: { talla: "S", color: "Azul" }

            },

            {

                id: 26,

                name: "Horno Eléctrico LG",

                description: "Horno eléctrico empotrable con convección y grill",

                barcode: "8801031456789",

                price: 549.99,

                image: "https://images.unsplash.com/photo-1574269909862-7e1d70bb8078?w=400&h=300&fit=crop",

                rating: 4.4,

                reviews: 78,

                category: "electrodomesticos",

                subcategories: { marca: "LG", tamaño: "Grande" }

            },

            {

                id: 27,

                name: "Google Pixel 7",

                description: "Smartphone con cámara computacional avanzada y Android puro",

                barcode: "0810029930878",

                price: 599.99,

                image: "https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=400&h=300&fit=crop",

                rating: 4.3,

                reviews: 167,

                category: "tecnologia",

                subcategories: { marca: "Google", almacenamiento: "128GB" }

            },

            {

                id: 28,

                name: "Botas de Montaña",

                description: "Botas resistentes para senderismo y actividades al aire libre",

                barcode: "9012345678901",

                price: 159.99,

                image: "https://images.unsplash.com/photo-1544966503-7cc5ac882d5f?w=400&h=300&fit=crop",

                rating: 4.5,

                reviews: 89,

                category: "ropa",

                subcategories: { talla: "L", color: "Marrón" }

            },

            {

                id: 29,

                name: "Lámpara de Pie Moderna",

                description: "Lámpara de pie con diseño moderno y luz ajustable",

                barcode: "1234567890124",

                price: 89.99,

                image: "https://images.unsplash.com/photo-1513506003901-1e6a229f6f11?w=400&h=300&fit=crop",

                rating: 4.2,

                reviews: 45,

                category: "hogar",

                subcategories: { tipo: "Decoración" }

            },

            {

                id: 30,

                name: "Sofá Modular",

                description: "Sofá modular de 3 plazas con tejido resistente",

                barcode: "2345678901235",

                price: 799.99,

                image: "https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=400&h=300&fit=crop",

                rating: 4.5,

                reviews: 78,

                category: "hogar",

                subcategories: { tipo: "Muebles" }

            },

            {

                id: 31,

                name: "Bicicleta de Montaña",

                description: "Bicicleta de montaña con cuadro de aluminio y 21 velocidades",

                barcode: "3456789012346",

                price: 499.99,

                image: "https://images.unsplash.com/photo-1532298229207-5e1b2c3c7875?w=400&h=300&fit=crop",

                rating: 4.7,

                reviews: 112,

                category: "deportes",

                subcategories: { tipo: "Aire Libre" }

            },

            {

                id: 32,

                name: "Mancuernas Ajustables",

                description: "Set de Mancuernas ajustables de 20 kg",

                barcode: "4567890123457",

                price: 129.99,

                image: "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=400&h=300&fit=crop",

                rating: 4.4,

                reviews: 65,

                category: "deportes",

                subcategories: { tipo: "Fitness" }

            }

        ];
        // ... otros productos
    
    let filteredProducts = [...products];
    let displayedProducts = [];
    let currentPage = 0;
    const productsPerPage = 8;
    let cart = [];

    // Elementos DOM
    const productsContainer = document.getElementById('productsContainer');
    const loadingIndicator = document.getElementById('loadingIndicator');
    const noMoreProducts = document.getElementById('noMoreProducts');
    const searchInput = document.getElementById('searchInput');
    const minPriceInput = document.getElementById('minPrice');
    const maxPriceInput = document.getElementById('maxPrice');
    const sortSelect = document.getElementById('sortSelect');
    const clearFiltersBtn = document.getElementById('clearFilters');
    const floatingCart = document.getElementById('floatingCart');
    const cartModal = document.getElementById('cartModal');
    const cartItems = document.getElementById('cartItems');
    const cartTotal = document.getElementById('cartTotal');
    const closeModal = document.querySelector('.close');
    const notification = document.getElementById('notification');
    const cartCount = document.getElementById('cartCount');

    // Funciones para crear elementos
    function createProductCard(product) {
        const stars = '★'.repeat(Math.floor(product.rating)) + '☆'.repeat(5 - Math.floor(product.rating));
        return `
            <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden fade-in-up">
                <div class="relative">
                    <img src="${product.image}" alt="${product.name}" class="w-full h-48 object-cover">
                    <div class="absolute top-2 right-2">
                        <span class="category-badge text-white px-2 py-1 rounded-full text-xs font-semibold">
                            ${getCategoryName(product.category)}
                        </span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold custom-text-primary mb-2 line-clamp-1">${product.name}</h3>
                    <p class="custom-text-secondary text-sm mb-3 line-clamp-2">${product.description}</p>
                    ${product.barcode ? `<p class="text-xs custom-text-secondary mb-2">Código: ${product.barcode}</p>` : ''}
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-2xl font-bold price-tag">$${product.price}</span>
                        <div class="flex items-center">
                            <span class="star-rating text-sm mr-1">${stars}</span>
                            <span class="text-xs custom-text-secondary">(${product.reviews})</span>
                        </div>
                    </div>
                    <button class="w-full custom-primary-bg text-white py-2 px-4 rounded-lg hover:custom-primary-dark-bg transition-colors flex justify-center items-center add-to-cart" data-id="${product.id}">
                        <i class="fas fa-shopping-cart mr-2"></i> Añadir al carrito
                    </button>
                </div>
            </div>
        `;
    }

    function getCategoryName(category) {
        const categoryNames = {
            'electrodomesticos': 'Electrodomésticos',
            'ropa': 'Ropa',
            'tecnologia': 'Tecnología',
            'hogar': 'Hogar',
            'deportes': 'Deportes'
        };
        return categoryNames[category] || category;
    }

    // Función para cargar productos
    function loadProducts() {
        const startIndex = currentPage * productsPerPage;
        const endIndex = startIndex + productsPerPage;
        const productsToShow = filteredProducts.slice(startIndex, endIndex);

        if (productsToShow.length === 0) {
            if (currentPage === 0) {
                productsContainer.innerHTML = '<div class="col-span-full text-center py-12"><p class="custom-text-secondary">No se encontraron productos</p></div>';
            }
            loadingIndicator.classList.add('hidden');
            noMoreProducts.classList.remove('hidden');
            return;
        }

        if (currentPage === 0) {
            productsContainer.innerHTML = '';
            displayedProducts = [];
        }

        productsToShow.forEach(product => {
            displayedProducts.push(product);
            productsContainer.innerHTML += createProductCard(product);
        });

        currentPage++;
        loadingIndicator.classList.add('hidden');

        if (endIndex >= filteredProducts.length) {
            noMoreProducts.classList.remove('hidden');
        } else {
            noMoreProducts.classList.add('hidden');
        }

        // Añadir eventos a los botones de añadir al carrito
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', () => {
                const productId = parseInt(button.getAttribute('data-id'));
                const product = products.find(p => p.id === productId);
                addToCart(product);
            });
        });
    }

    // Función para añadir productos al carrito
    function addToCart(product) {
        cart.push(product);
        showNotification(`${product.name} ha sido añadido al carrito.`);
        updateCartCount();
        updateCartModal();
    }

    // Función para mostrar notificación
    function showNotification(message) {
        notification.textContent = message;
        notification.style.display = 'block';
        setTimeout(() => {
            notification.style.display = 'none';
        }, 3000);
    }

    // Función para actualizar el contador del carrito
    function updateCartCount() {
        const count = cart.length;
        cartCount.textContent = count;
        cartCount.style.display = count > 0 ? 'flex' : 'none';
    }

    // Función para actualizar el modal del carrito
    function updateCartModal() {
        cartItems.innerHTML = '';
        let total = 0;

        if (cart.length === 0) {
            cartItems.innerHTML = '<p class="custom-text-secondary">No hay productos en el carrito.</p>';
        } else {
            cart.forEach(product => {
                const productElement = document.createElement('div');
                productElement.className = 'mb-4 p-4 border rounded-lg flex justify-between items-center';
                productElement.innerHTML = `
                    <div>
                        <h3 class="font-semibold custom-text-primary">${product.name}</h3>
                        <p class="custom-text-secondary">${product.description}</p>
                        <p class="text-lg font-bold price-tag mt-2">$${product.price}</p>
                    </div>
                    <div>
                        <button class="remove-from-cart text-red-500 hover:text-red-700" data-id="${product.id}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                `;
                cartItems.appendChild(productElement);
                total += product.price;
            });
        }

        cartTotal.textContent = `$${total.toFixed(2)}`;

        // Añadir eventos a los botones de eliminar del carrito
        document.querySelectorAll('.remove-from-cart').forEach(button => {
            button.addEventListener('click', (event) => {
                event.stopPropagation();
                const productId = parseInt(button.getAttribute('data-id'));
                removeFromCart(productId);
            });
        });
    }

    // Función para eliminar productos del carrito
    function removeFromCart(productId) {
        cart = cart.filter(product => product.id !== productId);
        updateCartCount();
        updateCartModal();
    }

    // Función para mostrar el modal del carrito
    function showCartModal() {
        cartModal.style.display = 'flex';
        updateCartModal();
    }

    // Función para aplicar filtros
    function applyFilters() {
        const searchTerm = searchInput.value.toLowerCase();
        const minPrice = parseFloat(minPriceInput.value) || 0;
        const maxPrice = parseFloat(maxPriceInput.value) || Infinity;
        const selectedRating = document.querySelector('input[name="rating"]:checked')?.value;

        const selectedSubcategories = {};
        document.querySelectorAll('.subcategory-filter:checked').forEach(checkbox => {
            const subcategory = checkbox.dataset.subcategory;
            const value = checkbox.dataset.value;
            if (!selectedSubcategories[subcategory]) {
                selectedSubcategories[subcategory] = [];
            }
            selectedSubcategories[subcategory].push(value);
        });

        filteredProducts = products.filter(product => {
            // Filtro de búsqueda
            if (searchTerm && !product.name.toLowerCase().includes(searchTerm) && !product.description.toLowerCase().includes(searchTerm)) {
                return false;
            }

            // Filtro de precio
            if (product.price < minPrice || product.price > maxPrice) {
                return false;
            }

            // Filtro de rating
            if (selectedRating && product.rating < parseFloat(selectedRating)) {
                return false;
            }

            // Filtro de subcategorías
            for (const [subcategory, values] of Object.entries(selectedSubcategories)) {
                if (product.subcategories[subcategory] && !values.includes(product.subcategories[subcategory])) {
                    return false;
                }
            }
            return true;
        });

        // Aplicar ordenamiento
        applySorting();

        // Resetear paginación
        currentPage = 0;
        noMoreProducts.classList.add('hidden');
        loadProducts();
    }

    // Función para aplicar ordenamiento
    function applySorting() {
        const sortValue = sortSelect.value;

        filteredProducts.sort((a, b) => {
            switch (sortValue) {
                case 'name':
                    return a.name.localeCompare(b.name);
                case 'price-low':
                    return a.price - b.price;
                case 'price-high':
                    return b.price - a.price;
                case 'rating':
                    return b.rating - a.rating;
                default:
                    return 0;
            }
        });
    }

    // Event listeners
    searchInput.addEventListener('input', applyFilters);
    minPriceInput.addEventListener('input', applyFilters);
    maxPriceInput.addEventListener('input', applyFilters);
    sortSelect.addEventListener('change', applyFilters);
    document.querySelectorAll('.subcategory-filter, input[name="rating"]').forEach(input => {
        input.addEventListener('change', applyFilters);
    });

    // Toggle de categorías
    document.querySelectorAll('.category-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const subcategories = btn.nextElementSibling;
            const arrow = btn.querySelector('.category-arrow');
            subcategories.classList.toggle('hidden');
            arrow.classList.toggle('rotate-90');
        });
    });

    // Limpiar filtros
    clearFiltersBtn.addEventListener('click', () => {
        searchInput.value = '';
        minPriceInput.value = '';
        maxPriceInput.value = '';
        sortSelect.value = 'name';

        document.querySelectorAll('.subcategory-filter, input[name="rating"]').forEach(input => {
            input.checked = false;
        });

        applyFilters();
    });

    // Mostrar modal del carrito
    floatingCart.addEventListener('click', showCartModal);

    // Cerrar modal
    closeModal.addEventListener('click', () => {
        cartModal.style.display = 'none';
    });

    // Cerrar modal al hacer clic fuera del contenido
    cartModal.addEventListener('click', (event) => {
        if (event.target === cartModal) {
            cartModal.style.display = 'none';
        }
    });

    // Scroll infinito
    window.addEventListener('scroll', () => {
        if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 1000) {
            if (!loadingIndicator.classList.contains('hidden')) return;
            if (!noMoreProducts.classList.contains('hidden')) return;

            loadingIndicator.classList.remove('hidden');
            setTimeout(() => {
                loadProducts();
            }, 1000); // Simular delay de carga
        }
    });

    // Inicializar
    document.addEventListener('DOMContentLoaded', () => {
        loadProducts();
    });
})();


