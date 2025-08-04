// Scroll animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, observerOptions);

// Observe all elements with animate-fade-in class
document.querySelectorAll('.animate-fade-in').forEach(el => {
    observer.observe(el);
});

// Add floating animation delay to cards
document.querySelectorAll('.floating-animation').forEach((el, index) => {
    el.style.animationDelay = `${index * 0.2}s`;
});

// Add stagger effect to fade-in animations
document.querySelectorAll('.animate-fade-in').forEach((el, index) => {
    el.style.transitionDelay = `${index * 0.1}s`;
});

// Add smooth hover effects
document.querySelectorAll('a, button').forEach(element => {
    element.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-1px)';
    });

    element.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
    });
});

// Search functionality
const searchInput = document.querySelector('input[type="text"]');
searchInput.addEventListener('focus', function() {
    this.parentElement.classList.add('ring-2', 'ring-blue-500');
});

searchInput.addEventListener('blur', function() {
    this.parentElement.classList.remove('ring-2', 'ring-blue-500');
});

// Cart animation
const cartButton = document.querySelector('.fa-shopping-cart').parentElement;
cartButton.addEventListener('click', function() {
    const badge = this.querySelector('span');
    badge.classList.add('animate-bounce');
    setTimeout(() => {
        badge.classList.remove('animate-bounce');
    }, 1000);
});

// Add to cart simulation
document.querySelectorAll('.card-hover').forEach(card => {
    card.addEventListener('click', function(e) {
        if (e.target.closest('button')) {
            // Simulate add to cart
            const cartBadge = document.querySelector('.fa-shopping-cart + span');
            let currentCount = parseInt(cartBadge.textContent);
            cartBadge.textContent = currentCount + 1;
            cartBadge.classList.add('animate-pulse');

            // Show success message
            const toast = document.createElement('div');
            toast.className = 'fixed top-20 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform';
            toast.innerHTML = '<i class="fas fa-check mr-2"></i>Producto agregado al carrito';
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.classList.remove('translate-x-full');
            }, 100);

            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => {
                    document.body.removeChild(toast);
                }, 300);
            }, 3000);

            setTimeout(() => {
                cartBadge.classList.remove('animate-pulse');
            }, 1000);
        }
    });
});


// Loading animation for buttons
document.querySelectorAll('.primary-btn').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const originalText = this.innerHTML;
        this.innerHTML = '<i class="fas fa-spinner animate-spin mr-2"></i>Cargando...';
        this.disabled = true;

        setTimeout(() => {
            this.innerHTML = originalText;
            this.disabled = false;
        }, 2000);
    });
});

