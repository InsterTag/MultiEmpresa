// Script para navbar
(function() {
    // Variables para elementos del DOM
    const categoriesContainer = document.querySelector('.categories-container');
    const categoriesDropdown = document.getElementById('categoriesDropdown');
    const categoriesIcon = document.getElementById('categoriesIcon');
    const loginBtn = document.getElementById('loginBtn');
    const loginModal = document.getElementById('loginModal');
    const closeLoginModal = document.getElementById('closeLoginModal');
    const loginIcon = document.getElementById('loginIcon');
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    let categoriesTimeout;

    // Función para mostrar dropdown de categorías
    function showCategoriesDropdown() {
        clearTimeout(categoriesTimeout);
        categoriesDropdown.classList.add('active');
        categoriesIcon.style.transform = 'rotate(180deg)';
    }

    // Función para ocultar dropdown de categorías
    function hideCategoriesDropdown() {
        categoriesTimeout = setTimeout(() => {
            categoriesDropdown.classList.remove('active');
            categoriesIcon.style.transform = 'rotate(0deg)';
        }, 300);
    }

    // Event listeners para dropdown de categorías (hover)
    categoriesContainer.addEventListener('mouseenter', showCategoriesDropdown);
    categoriesContainer.addEventListener('mouseleave', hideCategoriesDropdown);
    categoriesDropdown.addEventListener('mouseenter', () => clearTimeout(categoriesTimeout));
    categoriesDropdown.addEventListener('mouseleave', hideCategoriesDropdown);

    // Función para abrir modal con animación
    function openModal(modal, icon) {
        modal.classList.add('active');
        if (icon) {
            icon.style.transform = 'rotate(180deg)';
        }
        document.body.style.overflow = 'hidden';
    }

    // Función para cerrar modal con animación
    function closeModal(modal, icon) {
        modal.classList.remove('active');
        if (icon) {
            icon.style.transform = 'rotate(0deg)';
        }
        document.body.style.overflow = 'auto';
    }

    // Event listeners para modal de login
    loginBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        openModal(loginModal, loginIcon);
    });

    closeLoginModal.addEventListener('click', () => {
        closeModal(loginModal, loginIcon);
    });

    // Cerrar modales al hacer click fuera
    loginModal.addEventListener('click', (e) => {
        if (e.target === loginModal) {
            closeModal(loginModal, loginIcon);
        }
    });

    // Cerrar modales con tecla Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            if (loginModal.classList.contains('active')) {
                closeModal(loginModal, loginIcon);
            }
        }
    });

    // Menú móvil
    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Animación suave al hacer scroll
    window.addEventListener('scroll', () => {
        const navbar = document.querySelector('nav');
        if (window.scrollY > 10) {
            navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
        } else {
            navbar.style.boxShadow = '0 1px 3px rgba(0, 0, 0, 0.1)';
        }
    });

    // Efecto de typing en la barra de búsqueda
    const searchInputs = document.querySelectorAll('.search-input');
    searchInputs.forEach(input => {
        input.addEventListener('focus', () => {
            input.style.transform = 'scale(1.02)';
        });
        input.addEventListener('blur', () => {
            input.style.transform = 'scale(1)';
        });
    });

    // Animación para los elementos de categoría del dropdown
    const dropdownCategoryItems = document.querySelectorAll('#categoriesDropdown .category-item');
    dropdownCategoryItems.forEach((item, index) => {
        item.style.animationDelay = `${index * 0.05}s`;
        item.addEventListener('click', () => {
            console.log('Categoría seleccionada:', item.querySelector('h3').textContent);
            hideCategoriesDropdown();
        });
    });
})();
