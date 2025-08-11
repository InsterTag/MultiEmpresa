
        // Tab switching functionality
        const tabButtons = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetTab = button.dataset.tab;
                
                // Remove active class from all buttons
                tabButtons.forEach(btn => {
                    btn.classList.remove('tab-active');
                    btn.classList.add('tab-inactive');
                });
                
                // Add active class to clicked button
                button.classList.remove('tab-inactive');
                button.classList.add('tab-active');
                
                // Hide all tab contents
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                    content.classList.remove('fade-in');
                });
                
                // Show target tab content with animation
                const targetContent = document.getElementById(`${targetTab}-content`);
                if (targetContent) {
                    setTimeout(() => {
                        targetContent.classList.remove('hidden');
                        targetContent.classList.add('fade-in');
                    }, 150);
                }
            });
        });

        // Address editing functionality
        const editAddressBtn = document.getElementById('edit-address-btn');
        const addressDisplay = document.getElementById('address-display');
        const addressForm = document.getElementById('address-form');
        const cancelEditBtn = document.getElementById('cancel-edit-btn');
        const saveAddressBtn = document.getElementById('save-address-btn');

        editAddressBtn.addEventListener('click', () => {
            addressDisplay.classList.add('hidden');
            addressForm.classList.remove('hidden');
            editAddressBtn.innerHTML = '<i class="fas fa-times mr-2"></i>Cancelar Edición';
            editAddressBtn.classList.add('bg-gray-500');
            editAddressBtn.classList.remove('custom-primary-bg');
        });

        function cancelEdit() {
            addressDisplay.classList.remove('hidden');
            addressForm.classList.add('hidden');
            editAddressBtn.innerHTML = '<i class="fas fa-edit mr-2"></i>Editar Dirección';
            editAddressBtn.classList.remove('bg-gray-500');
            editAddressBtn.classList.add('custom-primary-bg');
        }

        cancelEditBtn.addEventListener('click', cancelEdit);
        
        editAddressBtn.addEventListener('click', (e) => {
            if (editAddressBtn.innerHTML.includes('Cancelar Edición')) {
                cancelEdit();
            }
        });

        saveAddressBtn.addEventListener('click', () => {
            // Here you would normally send the data to the server
            // For now, we'll just show the display again
            cancelEdit();
            
            // Show success message (you could implement a toast notification here)
            const successMsg = document.createElement('div');
            successMsg.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-xl shadow-lg z-50';
            successMsg.innerHTML = '<i class="fas fa-check mr-2"></i>Dirección actualizada correctamente';
            document.body.appendChild(successMsg);
            
            setTimeout(() => {
                successMsg.remove();
            }, 3000);
        });

        // Enhanced scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('slide-up');
                }
            });
        }, observerOptions);

        // Observe all cards for animation
        document.querySelectorAll('.scale-hover').forEach(card => {
            observer.observe(card);
        });

        // Enhanced button interactions with ripple effect
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function(e) {
                // Create ripple effect
                const rect = button.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                const ripple = document.createElement('span');
                ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    background: rgba(255, 255, 255, 0.4);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    pointer-events: none;
                    z-index: 1;
                `;
                
                if (!button.style.position) {
                    button.style.position = 'relative';
                }
                button.style.overflow = 'hidden';
                
                button.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add CSS for enhanced animations
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }

            /* Enhanced hover effects */
            .tab-btn {
                position: relative;
                overflow: hidden;
            }

            .tab-btn::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
                transition: left 0.5s;
            }

            .tab-btn:hover::before {
                left: 100%;
            }

            /* Smooth transitions for form inputs */
            input:focus {
                transform: scale(1.02);
                box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            }

            /* Enhanced card shadows on hover */
            .scale-hover {
                position: relative;
            }

            .scale-hover::after {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                border-radius: inherit;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
                opacity: 0;
                transition: opacity 0.3s ease;
                pointer-events: none;
            }

            .scale-hover:hover::after {
                opacity: 1;
            }

            /* Notification animation */
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }

            .fixed {
                animation: slideInRight 0.3s ease-out;
            }
        `;
        document.head.appendChild(style);

        // Add loading states for buttons
        function addLoadingState(button, originalText) {
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Procesando...';
            button.disabled = true;
            
            setTimeout(() => {
                button.innerHTML = originalText;
                button.disabled = false;
            }, 1500);
        }

        // Add loading to save button
        saveAddressBtn.addEventListener('click', function() {
            const originalText = this.innerHTML;
            addLoadingState(this, originalText);
        });
